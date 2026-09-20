<?php

namespace App\Http\Controllers\Welcome;

use Image;
use Auth;
use Hash;
use Str;
use Validator;
use Session;
use Carbon\Carbon;
use App\Models\Country;
use App\Models\Post;
use App\Models\Review;
use App\Models\Media;
use App\Models\PostExtra;
use App\Models\User;
use App\Models\Attribute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class WelcomeController extends Controller
{
  
    public function __construct(){
        $this->middleware('cart');
    }
    
	public function geo_filter($id){

      $datas=Country::where('parent_id',$id)->get();

      $geoData =View('geofilter',compact('datas'))->render();

       return Response()->json([
              'success' => true,
              'geoData' => $geoData,
            ]);
    }
    
    public function imageView(Request $r){
        if($r->imageUrl && is_numeric($r->weight) && is_numeric($r->height)){
          $image = Image::make($r->imageUrl)->fit($r->weight,$r->height)->response();
        }else{
          $image = Image::make('public/medies/noimage.jpg')->fit(200,200)->response(); 
        }
        return $image;
    }
    
    public function imageView2(Request $r,$template=null,$image=null){
        $weight=null;
        $height=null;
        
        if(is_numeric($r->w)){
          $weight=$r->w;  
        }
        if(is_numeric($r->h)){
          $height=$r->h;  
        }
        
        $filePath='public/medies/noimage.jpg';
        
        if($image){
            $file =Media::where('file_rename',$image)->select(['file_url'])->first();
            if($file){
                $filePath = $file->file_url;
            }
        }
        
        
        $mImage =Image::make($filePath);
        
        if($template=='s-profile'){
            
            if($image && $image!='profile.png' && $file){
                $filePath = $file->file_url;
            }else{
                $filePath ='public/medies/profile.png';
            }
        }elseif($template=='sm-resize'){
            if($weight && $height){
                $mImage=$mImage->resize($weight,$height);
            }
        }elseif($template=='resize'){
            if($weight && $height){
                $mImage=$mImage->resize($weight,$height);
            }
        }elseif($template=='brand-fit'){
            if($weight && $height){
                $mImage=$mImage->fit($weight,$height);
            }
        }
        $mImage=$mImage->response();
        
        return $mImage;
    }
    
    
    public function siteMapXml(Request $r){
        
      $pages = Post::latest()->where('type',0)->where('status','active')->select(['slug','updated_at','status'])->limit(200)->get();
      $posts = Post::latest()->where('type',1)->where('status','active')->select(['slug','updated_at','status'])->limit(500)->get();
      $products = Post::latest()->where('type',2)->where('status','active')->select(['slug','updated_at','status'])->limit(300)->get();
      
      return response()->view('siteMap',compact('pages','posts','products'))->header('Content-Type', 'text/xml');
    }
    
    public function language($lang=null){
      if($lang){
          Session::put('lang',$lang);
      }else{
          Session::put('lang','en');
      }
      return redirect()->back();
    }

    public function index(Request $r){
        
      $page =pageTemplate('Front Page');
        // return phpinfo();
      $latestProducts =Post::latest()->where('type',2)
      ->where('status','active')->where('new_arrival',true)
      ->whereDate('created_at','<=',Carbon::now())
      ->limit(8)
      ->get(['id','name','slug','final_price','regular_price','variation_status','created_at','discount','discount_type','brand_id']);
      
      $bestProducts =Post::latest()->where('type',2)
      ->where('status','active')->where('up_coming',true)
      ->whereDate('created_at','<=',Carbon::now())
      ->limit(8)
      ->get(['id','name','slug','final_price','regular_price','variation_status','created_at','discount','discount_type','brand_id']);
      
      
      $featuresProducts =Post::latest()->where('type',2)
      ->where('status','active')->where('fetured',true)
      ->whereDate('created_at','<=',Carbon::now())
      ->limit(8)
      ->get(['id','name','slug','final_price','regular_price','variation_status','created_at','discount','discount_type','brand_id']);
      
      $categories =Attribute::latest()->where('status','active')->where('fetured',true)->where('type',0)->get();
      

      $latestPosts =Post::latest()->where('type',1)
      ->where('status','active')
      ->whereDate('created_at','<=',Carbon::now())
      ->limit(4)
      ->get(['id','name','short_description','slug','addedby_id','created_at']);
      
      $brands =Attribute::where('type',2)->where('status','active')->where('fetured',true)

                ->orderBy('name')
                ->limit(12)->get(['id','name','slug']);
      
      $bannerGroupOne =PostExtra::latest()->where('type',4)->where('parent_id',null)->where('status','active')
                       ->where('data_type','Banner Ads Group One')
                       ->get();
      
      $specialOffers =PostExtra::latest()->where('type',4)->where('parent_id',null)->where('status','active')
                       ->where('data_type','Special Offer')
                       ->get();

      $featuredText =PostExtra::where('type',7)->first();

      return view(welcomeTheme().'index',compact(
          'latestProducts',
          'featuresProducts',
          'bestProducts',
          'latestPosts',
          'brands',
          'bannerGroupOne',
          'specialOffers',
          'categories',
          'featuredText',
          'page'
          ));
    }

    public function productCategory(Request $r,$slug){
        $category =Attribute::latest()->where('type',0)->where('slug',$slug)->first();
        if(!$category){
            return abort('404');
        }
        
        $attributes = Attribute::latest()->where('type', 9)
                        ->where('status', 'active')
                        ->whereNotIn('id',[73,68])
                        ->whereNull('parent_id');
       
        $attributes = $attributes->whereHas('subCtgs', function ($q) use($category){
                                $q->whereHas('postsAttribute', function ($qq) use($category){
                                    $qq->where('posts.status', 'active')->whereHas('productCtgs',function($qqq) use($category){
                                        $qqq->where('reff_id',$category->id);
                                    });
                                });
                            })->select(['id','name','parent_id','created_at'])->get();

     
        
        $query = Post::whereHas('ctgProducts',function($q) use($category){
            $q->where('reff_id',$category->id);
          })
          ->where(function($qq)use($r){
            $qq->where('status','active');
            if($r->min_price || $r->max_price){
                //$qq->whereBetween('final_price', [$r->min_price, $r->max_price]);
                 $qq->where(function($query) use ($r) {
                    // Check if the min_price is within the range
                    if ($r->min_price) {
                        $query->where('min_price', '>=', $r->min_price);
                    }
                    
                    // Check if the max_price is within the range
                    if ($r->max_price) {
                        $query->where('max_price', '<=', $r->max_price);
                    }
                });
            }
            if($r->options){
                $qq->whereHas('productAttibutes',function($qqq)use($r){
                    $qqq->whereIn('parent_id',$r->options);
                });
            }
            
          })
          //->select(['id','name','slug','addedby_id','created_at'])
          ->whereDate('created_at','<=',date('Y-m-d'));
        
        $products = $query->latest()->paginate(12);
        
        // Get min and max final_price
        $minPrice = round($query->min('min_price'));
        $maxPrice = round($query->max('max_price'));
        
        if($r->ajax()){
            
            if($attributes->count() > 0){
            $colName='col-md-4';
            }else{
            $colName='col-md-3';
            }
            
            $viewData =View(welcomeTheme().'products.includes.productsAll',compact('products','colName'))->render();

            return Response()->json([
              'success' => true,
              'viewData' => $viewData,
            ]);
        }
        
        // if (is_null($category->parent_id)) {
        //     $categories = Attribute::latest()->where('type',0)->whereNull('parent_id')
        //         ->where('status', 'active')
        //         ->get();
        // } else {
        //     $categories = Attribute::latest()->where('type',0)->where('parent_id', $category->parent->parent_id)
        //     ->where('status', 'active')
        //     ->get();
        // }
        
        $categories = Attribute::latest()->where('type',0)->whereNull('parent_id')
                ->where('status', 'active')
                ->get();
                
                  $subCtg= $category->subctgs()->where('status', 'active')->get();
        
      return view(welcomeTheme().'products.categoryProducts',compact('category','subCtg','categories','products','attributes','minPrice','maxPrice'));
    }
    
    public function productCategoryFilter(Request $r){
        
        $query = Post::where('type',2);

        /* Category Filter */
        if (!empty($r->ctgs) && is_array($r->ctgs)) {
            $query->whereHas('ctgProducts', function ($q) use ($r) {
                $q->whereIn('reff_id', $r->ctgs);
            });
        }
        
        /* Basic Conditions */
        $query->where('status', 'active')
              ->whereDate('created_at', '<=', now());
        
        /* Price Filter */
        if ($r->min_price || $r->max_price) {
            if ($r->min_price && $r->max_price) {
                $query->whereBetween('final_price', [$r->min_price, $r->max_price]);
            } elseif ($r->min_price) {
                $query->where('final_price', '>=', $r->min_price);
            } elseif ($r->max_price) {
                $query->where('final_price', '<=', $r->max_price);
            }
        }
        
        /* Attribute Filter */
        if (!empty($r->options) && is_array($r->options)) {
            $query->whereHas('productAttibutes', function ($qqq) use ($r) {
                $qqq->whereIn('parent_id', $r->options);
            });
        }
        
        /* Sorting */
        switch ($r->short_by) {
        
            case 'best_selling':
                $query->where('up_coming', true)->latest();
                break;
        
            case 'featured':
                $query->where('featured', true)->latest();
                break;
        
            case 'high_to_low':
                $query->orderBy('final_price', 'desc');
                break;
        
            case 'low_to_high':
                $query->orderBy('final_price', 'asc');
                break;
        
            default:
                $query->latest();
                break;
        }
        
        $products = $query->paginate(12);
        
        $colName='col-md-3';
        $viewData =View(welcomeTheme().'products.includes.productsAll',compact('products','colName'))->render();

        return Response()->json([
          'success' => true,
          'viewData' => $viewData,
        ]);
    }
    
    public function productBrand($slug){
        $brand =Attribute::latest()->where('type',2)->where('slug',$slug)->first();
          if(!$brand){
            return abort('404');
          }
          
         
          if($brand->subbrands()->where('status','active')->count() > 0){
              $subBrands =$brand->subbrands()->where('status','active')->select(['id','name','slug','parent_id'])->paginate(100);
              
              return view(welcomeTheme().'products.brandsList',compact('brand','subBrands'));
          }
          
          if($brand->parent_id==null){
          $products = Post::latest()->where('brand_id',$brand->id);
          }else{
          $products = Post::latest()->where('subbrand_id',$brand->id);
          }
          
          
          $products =$products->where(function($qq){
            $qq->where('status','active');
          })
          //->select(['id','name','slug','addedby_id','created_at'])
          ->whereDate('created_at','<=',date('Y-m-d'))
          ->paginate(12);
          
          
          
        return view(welcomeTheme().'products.brandProducts',compact('brand','products'));
    }

    public function productView(Request $r,$slug){
        $product =Post::latest()->where('type',2)->where('status','active')->where('slug',$slug)->first();
        if(!$product){
            return abort('441');
        }
        
        if($r->ajax()){
        
            return view(welcomeTheme().'products.includes.quickViewContent', compact('product'));
        }
        
        $relatedProducts = $product->relatedProducts()->inRandomOrder()->limit(4)->get();
      
        $recommendProducts = Post::latest()->where('type',2)->where('status','active')->whereNotIn('id',[$product->id])->inRandomOrder()->limit(4)->get(['id','name','slug','final_price','regular_price','variation_status','brand_id']);
      
        $bannerGroupTwo =PostExtra::latest()->where('type',4)->where('parent_id',null)->where('status','active')
                       ->where('data_type','Banner Ads Group Two')
                       ->get();
        
        $selectVariation=null;
        if($varia =$product->productVariationAttributeItems()->whereHas('attributeVatiationItems')->where('stock_status',true)->first()){
            //$selectVariation =$varia->attributeVatiationItems;
            $selectVariation =$varia;
        }
        
        // return $selectVariation;
        
        $proDatas = $product->productVariationAttributeItems()->get(['id', 'src_id', 'reguler_price', 'preorder_price', 'discount', 'final_price', 'quantity', 'stock_status']);
        $datas = [];
        foreach ($proDatas as $data) {
            $attributeItemIds = $data->attributeVatiationItems()->get(['attribute_item_id']);
            
            $status=false;
            if($data->stock_status){
                if($data->quantity > 0){
                    $status=true;
                }
            }
            
            $datas[] = [
                'price' => $status?$data->showPrice():$data->showPrePrice(),
                'image' => asset($data->variationImage()),
                'stock_status' => $status,
                'quantity' => $data->quantity,
                'items' => $attributeItemIds
            ];
        }
        
        // return $datas;
        
        $reviews =$product->productReviews()->latest()->where('status','active')->paginate(100);

      return view(welcomeTheme().'products.productView',compact('product','reviews','relatedProducts','recommendProducts','bannerGroupTwo','selectVariation','datas'));
    }
    
    public function productReview(Request $request, $slug)
    {
        
        $product =Post::latest()->where('type',2)->where('status','active')->where('slug',$slug)->first();
        if(!$product){
            return abort('441');
        }
    
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:191',
            'email'  => 'required|email|max:191',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|min:5',
        ], [
            'name.required'   => 'Your name is required.',
            'email.required'  => 'Your email address is required.',
            'email.email'     => 'Please enter a valid email address.',
            'rating.required' => 'Please select a star rating.',
            'review.required' => 'Please write your review.',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }
    
        $review = new Review();
        if (Auth::check()) {
            $review->addedby_id = Auth::id();
        }
        $review->src_id  = $product->id;
        $review->type    = 0;
        $review->name    = $request->name;
        $review->email   = $request->email;
        $review->rating  = $request->rating; // Make sure rating column exists
        $review->content = $request->review;
        $review->status = 'active';
        $review->save();
        
        
        $reviews =$product->productReviews()->latest()->where('status','active')->paginate(100);
        // Render HTML for single new review to append in list
        $newReviewHtml = view(welcomeTheme() . '.products.includes.realatedReview', compact('product','reviews'))->render();
    
        return response()->json([
            'status'  => 'success',
            'message' => 'Thank you! Your review has been submitted successfully.',
            'html'    => $newReviewHtml
        ]);
    }

    public function blogCategory($slug){
      $category =Attribute::latest()->where('type',6)->where('slug',$slug)->first();
      if(!$category){
        return abort('404');
      }

      $posts = $category->activePosts()->latest()
      ->select(['id','name','slug','short_description','addedby_id','created_at'])
      ->paginate(10);

      return view(welcomeTheme().'blogs.categoryPosts',compact('category','posts'));
    }

    public function blogTag($slug){
      $tag =Attribute::latest()->where('type',7)->where('slug',$slug)->first();
      if(!$tag){
        return abort('404');
      }

      $posts = Post::whereHas('tagPosts',function($q) use($tag){
        $q->where('reff_id',$tag->id);
      })
      ->where(function($qq){
        $qq->where('status','active');
      })
      ->select(['id','name','slug','short_description','addedby_id','created_at'])
      ->whereDate('created_at','<=',date('Y-m-d'))
      ->paginate(10);

      return view(welcomeTheme().'blogs.tagPosts',compact('tag','posts'));
    }

    public function blogAuthor($id,$slug){
      $author =User::find($id);
      if(!$author){
        return abort('404');
      }
      $posts =$author->posts()->latest()->where('type',1)->where('status','active')
      ->select(['id','name','slug','short_description','addedby_id','created_at'])
      ->whereDate('created_at','<=',date('Y-m-d'))
      ->paginate(10);
      return view(welcomeTheme().'blogs.authorPosts',compact('author','posts'));

    }

    public function blogView($slug){
      $post =Post::where('type',1)->where('slug',$slug)->first();
      if(!$post){
        return abort('404');
      }
      $relatedPosts =$post->relatedPosts()->limit(4)->select(['id','name','slug','short_description','addedby_id','created_at'])->get();
      $comments =$post->postComments()->where('status','active')->select(['id','name','content','created_at'])->paginate(10);
      return view(welcomeTheme().'blogs.blogView',compact('post','relatedPosts','comments'));

    }

    public function blogSearch(Request $r){
      $check = $r->validate([
          'search' => 'required|max:100',
      ]);
      
      $posts =Post::latest()->where('type',1)->where('status','active')
      ->where(function($q) use ($r) {
        if($r->search){
          $q->where('name','LIKE','%'.$r->search.'%');
        }

      })
      ->select(['id','name','slug','short_description','addedby_id','created_at'])
      ->whereDate('created_at','<=',date('Y-m-d'))
      ->paginate(10)->appends([
        'search'=>$r->search,
      ]);

      return view(welcomeTheme().'blogs.blogSearch',compact('posts','r'));

    }

    public function blogComments(Request $r,$slug){
      $post =Post::where('type',1)->where('slug',$slug)->first();
      if(!$post){
        return abort('404');
      }

      $check = $r->validate([
          'name' => 'required|max:100',
          'email' => 'required|max:100',
          'website' => 'required|max:100',
          'comment' => 'required|max:1000',
      ]);

      $comments =new Review();

      if(Auth::check()){
      $comments->addedby_id=Auth::id();
      }
      $comments->src_id=$post->id;
      $comments->type=1;
      $comments->name=$r->name;
      $comments->email=$r->email;
      $comments->website=$r->website;
      $comments->content=$r->comment;
      $comments->save();

      Session()->flash('success','Your Comments successfully Submitted.');

      return back();


    }


    public function pageView($slug){
      $page =Post::latest()->where('type',0)->where('slug',$slug)->first();
      if(!$page){
        return abort('404');
      }
      
      //Font Home Page
      if($page->template=='Front Page'){
        return redirect()->route('index');
      }

      //Contact Us Page
      if($page->template=='Contact Us'){

        return view(welcomeTheme().'pages.contactUs',compact('page'));
      }
      
      //Contact Us Page
      if($page->template=='New Arrival'){
          
        $latestProducts =Post::latest()->where('type',2)
      ->where('status','active')->where('new_arrival',true)
      ->whereDate('created_at','<=',Carbon::now())
      ->limit(8)
      ->get(['id','name','slug','final_price','regular_price','variation_status','created_at','discount','discount_type','brand_id']);

        return view(welcomeTheme().'pages.newArrival',compact('page','latestProducts'));
      }
      
      //Product Request Page
      if($page->template=='Product Request'){
        if(!Auth::check()){
            Session::put('url.intended', route('pageView',$page->slug));
            return redirect()->route('login');
        }
        $user =Auth::user();
        return view(welcomeTheme().'pages.productRequest',compact('page','user'));
      }
      
      if($page->template=='Offer Products'){
        

          $products = Post::latest()
                    ->where(function($qq){
                        $qq->where('status','active');
                      })
                      ->where('discount', '>',0)
                      ->whereDate('created_at','<=',date('Y-m-d'))
                      ->paginate(12);
          
        return view(welcomeTheme().'products.offersProducts',compact('page','products'));
      }

      //Top Sell
      if($page->template=='Top Sell'){
          
              $bestProducts =Post::latest()->where('type',2)
      ->where('status','active')->where('up_coming',true)
      ->whereDate('created_at','<=',Carbon::now())
      ->limit(20)
      ->get(['id','name','slug','final_price','regular_price','variation_status','created_at','discount','discount_type','brand_id']);
      
          
        return view(welcomeTheme().'pages.topSellProducts',compact('page','bestProducts'));
      }
      
      
      
      //About Us Page
      if($page->template=='About Us'){
        return view(welcomeTheme().'pages.aboutUs',compact('page'));
      }
      
      //payment method
      if($page->template=='Payment Method'){
        return view(welcomeTheme().'pages.paymentMethod',compact('page'));
      }
      
      //About Us Page
      if($page->template=='All Brands'){
        $brands =Attribute::latest()->where('type',2)->where('status','active')
                ->select(['id','name','slug'])
                ->paginate(60);
        return view(welcomeTheme().'products.brandsAll',compact('page','brands'));
      }
      
      //Latest Blog Page
      if($page->template=='Latest Blog'){
        $posts = Post::latest()->where('type',1)->where('status','active')
        ->select(['id','name','slug','short_description','addedby_id','created_at'])
        ->whereDate('created_at','<=',date('Y-m-d'))
        ->paginate(10);
        return view(welcomeTheme().'blogs.latestBlogs',compact('posts','page'));
      }

      //Latest Services Page
      if($page->template=='Latest Products'){
        $products = Post::latest()->where('type',2)->where('status','active')
        //->select(['id','name','slug','short_description','addedby_id','created_at'])
        ->whereDate('created_at','<=',date('Y-m-d'))
        ->paginate(12);
        return view(welcomeTheme().'products.latestProducts',compact('products','page'));
      }

      return view(welcomeTheme().'pages.pageView',compact('page'));

    }

    public function contactMail(Request $r){
          $check = $r->validate([
              'name' => 'required|max:100',
              'email' => 'required|max:100',
              'mobile' => 'required|max:100',
              'subject' => 'nullable|max:100',
              'message' => 'nullable|max:500',
          ]);

        if(general()->mail_status && general()->mail_from_address){
            //Mail Data
            $datas =array('r'=>$r);
            $template ='mails.ContactMail';
            $toEmail =general()->mail_from_address;
            $toName =general()->mail_from_name;
            $subject ='Contact Mail Form '.general()->title;
        
            sendMail($toEmail,$toName,$subject,$datas,$template);
        }
        
        

      Session()->flash('success','Your Form send successfully done. We are response as soon as possible.');
      return back();
    }
    
    
    
    
    public function requestProductSubmit(Request $r)
    {
        $check = $r->validate([
            'product_name' => 'required|max:255',
            'product_link' => 'nullable|url|max:500',
            'quantity'     => 'required|integer|min:1',
            'name'         => 'required|max:100',
            'email'        => 'required|email|max:100',
            'mobile'       => 'required|max:100',
            'message'      => 'nullable|max:5000',
            'attachment'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        /*
        |--------------------------------------------------------------------------
        | Attachment
        |--------------------------------------------------------------------------
        */
    
        $attachments = [];
    
        if ($r->hasFile('attachment')) {
    
            $file = $r->file('attachment');
    
            $attachments[] = [
                'path' => $file->getRealPath(),
                'name' => $file->getClientOriginalName(),
                'mime' => $file->getMimeType(),
            ];
        }
    
    
        /*
        |--------------------------------------------------------------------------
        | Mail Data
        |--------------------------------------------------------------------------
        */
    
        $datas = [
            'r' => $r,
        ];
    
        $template = 'mails.enquireMail';
    
        $subject = 'Product Request Mail Form ' . general()->title;
    
    
        /*
        |--------------------------------------------------------------------------
        | Send Emails
        |--------------------------------------------------------------------------
        */
    
        if (general()->mail_status) {
    
            // Main mail address
            if (general()->mail_from_address) {
    
                sendMail(
                    general()->mail_from_address,
                    general()->mail_from_name,
                    $subject,
                    $datas,
                    $template,
                    $attachments
                );
            }
    
        }
    
        Session()->flash(
            'success',
            'Your form was submitted successfully. We will respond as soon as possible.'
        );
    
        return back();
    }
    
    public function inquerySend(Request $r,$slug){
        
        $product =Post::latest()->where('type',2)->where('slug',$slug)->first();
        if(!$product){
            return abort('404');
        }

        $check = $r->validate([
          'name' => 'required|max:100',
          'mobile' => 'required|max:100',
          'email' => 'nullable|max:100',
          'message' => 'required|max:500',
        ]);

        if(general()->mail_status && general()->mail_from_address){
            //Mail Data
            $datas =array('r'=>$r,'product'=>$product);
            $template ='mails.enquireMail';
            $toEmail =general()->mail_from_address;
            $toName =general()->mail_from_name;
            $subject ='Enquery Mail Form '.general()->title;
            sendMail($toEmail,$toName,$subject,$datas,$template);
        }
        

      Session()->flash('success','Your Inquery send successfully done. We are response as soon as possible.');
      return back();
    }

    public function search(Request $r){
      
      $products =Post::where('type',2)->where('status','active')
        ->where(function($q) use($r){
          $q->where('name','LIKE','%'.$r->search.'%');
          $q->orWhereHas('productCategories',function($qq) use($r){
                  $qq->where('name','LIKE','%'.$r->search.'%');
              });
          $q->orWhereHas('brand',function($qq) use($r){
                  $qq->where('name','LIKE','%'.$r->search.'%');
              });
        })
        ->whereDate('created_at','<=',date('Y-m-d'))
        ->paginate(12);
        
        if($r->ajax()){
            
            $searchProducts =View(welcomeTheme().'.products.ajaxSearchResult',compact('products'))->render();
            
            return Response()->json([
                  'searchProducts' => $searchProducts,
                ]);
            
        }

      return view(welcomeTheme().'search',compact('products'));

    }

    public function subscribe(Request $r){

      if(filter_var($r->email, FILTER_VALIDATE_EMAIL)){
        $subscribe =PostExtra::latest()->where('type',1)->where('name',$r->email)->first();

        if(!$subscribe){
          
            $subscribe =new PostExtra();
            $subscribe->type=1;
            $subscribe->name=$r->email;
            $subscribe->save();
          $status=true;
          $message ='<b>Success:</b> You Are Successfully Subsribe.';
        }else{
          $status=true;
          $message ='<b>Note:</b> You Are Already Subsribe.Thank You.';
        }


      }else{
        $status=false;
        $message ='<b>Error:</b> Email Are Not validated';
      }

      if(request()->ajax()){
        
        return Response()->json([
                'success' => $status,
                'message' => $message,
              ]);
      }

      Session()->flash($status?'success':'error',$message);
      return redirect()->back();

    }





}
