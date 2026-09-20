@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle($post->seo_title?:$post->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle($post->seo_title?:$post->name)}}" />
<meta name="description" property="og:description" content="{!!$post->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$post->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset($post->image())}}" />
<meta name="url" property="og:url" content="{{route('blogView',$post->slug?:'no-title')}}" />
<link rel="canonical" href="{{route('blogView',$post->slug?:'no-title')}}" />
@endsection @push('css') 

<style>
    /* Layout Container */
.blogCompany {
    background-color: #ffffff;
    padding: 40px 0;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    color: #2d3748;
}

/* Header & Metadata */
.blog_title h2 {
    font-size: 2.25rem;
    font-weight: 700;
    line-height: 1.3;
    color: #1a202c;
    margin-bottom: 12px;
}

.blog_title span, 
.blog_title a {
    font-size: 0.9rem;
    color: #718096;
    margin-right: 18px;
    text-decoration: none;
    transition: color 0.2s ease;
}

.blog_title a:hover {
    color: #3182ce;
}

.blog_title i {
    margin-right: 5px;
    color: #a0aec0;
}

/* Featured Image */
.single_blog_thumb {
    margin: 24px 0;
    border-radius: 8px;
    overflow: hidden;
}

.single_blog_thumb img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

/* Short Description (Lead Paragraph / Excerpt) */
.single-blog-content > p:first-child,
.single-blog-content .short-description-text {
    font-size: 1.2rem;
    line-height: 1.7;
    font-weight: 500;
    color: #4a5568;
    padding: 16px 20px;
    background-color: #f7fafc;
    border-left: 4px solid #3182ce;
    border-radius: 0 6px 6px 0;
    margin-bottom: 24px;
}

/* Divider Line */
.single-blog-content hr {
    border: 0;
    height: 1px;
    background: #e2e8f0;
    margin: 32px 0;
}

/* Main Body Content */
.detilsContentText {
    font-size: 1.05rem;
    line-height: 1.8;
    color: #2d3748;
}

.detilsContentText p {
    margin-bottom: 20px;
}

.detilsContentText h1, 
.detilsContentText h2, 
.detilsContentText h3, 
.detilsContentText h4 {
    color: #1a202c;
    font-weight: 600;
    margin-top: 32px;
    margin-bottom: 16px;
    line-height: 1.4;
}

.detilsContentText blockquote {
    padding: 16px 24px;
    margin: 24px 0;
    border-left: 4px solid #cbd5e0;
    background: #f7fafc;
    font-style: italic;
    color: #4a5568;
}

.detilsContentText img {
    max-width: 100%;
    height: auto;
    border-radius: 6px;
    margin: 16px 0;
}

/* Related Blogs Section */
.realated-blogs {
    margin-top: 40px;
}

.realated-blogs h2 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1a202c;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 8px;
}

.realated-blogs h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 3px;
    background-color: #3182ce;
    border-radius: 2px;
}
.heading-banner h4 {
    background: #e6007e;
    display: block;
    padding: 40px 20px;
    color: #fff;
    border-radius: 20px;
}



/* =====================================
   BLOG CARD
===================================== */

.blogGrid {
    background: #fff;
    border: 1px solid #eeeeee;
    border-radius: 8px;
    overflow: hidden;
    transition: all 0.3s ease;
    height: 100%;
}

.blogGrid:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
}


/* =====================================
   IMAGE
===================================== */

.blogGrid .image {
    position: relative;
    height: 230px;
    overflow: hidden;
}

.blogGrid .image > a:first-child {
    display: block;
    width: 100%;
    height: 100%;
}

.blogGrid .image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease;
}

.blogGrid:hover .image img {
    transform: scale(1.05);
}


/* =====================================
   CATEGORY
===================================== */

.blogGrid .ctg {
    position: absolute;
    left: 15px;
    bottom: 15px;

    display: inline-block;

    background: #0ba350;
    color: #fff;

    padding: 6px 12px;
    border-radius: 4px;

    font-size: 12px;
    font-weight: 500;

    text-decoration: none;
}

.blogGrid .ctg:hover {
    background: #078942;
    color: #fff;
}


/* =====================================
   TITLE
===================================== */

.blogGrid .title {
    padding: 16px 15px 10px;
}

.blogGrid .title a {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;

    color: #222;
    font-size: 18px;
    font-weight: 600;
    line-height: 1.45;

    text-decoration: none;

    transition: color 0.3s ease;
}

.blogGrid .title a:hover {
    color: #0ba350;
}


/* =====================================
   AUTHOR / DATE
===================================== */

.blogGrid .author {
    border-top: 1px solid #eeeeee;
    padding: 11px 15px 13px;

    color: #888;
    font-size: 13px;
}

.blogGrid .author i {
    color: #0ba350;
    margin-right: 4px;
}

.blogGrid .author a {
    color: #555;
    text-decoration: none;
    margin-left: 2px;
}

.blogGrid .author a:hover {
    color: #0ba350;
}


/* =====================================
   MOBILE
===================================== */

@media (max-width: 767px) {

    .blogGrid .image {
        height: 210px;
    }

    .blogGrid .title {
        padding: 14px 12px 9px;
    }

    .blogGrid .title a {
        font-size: 16px;
    }

    .blogGrid .author {
        padding: 10px 12px;
        font-size: 12px;
    }



.blogname a {
    padding: 20px;
    text-align: center;
    text-decoration: none;
    color: #000;
    display: block;
    font-size: 20px;
}



</style>


@endpush @section('contents')

 <div class="pageContainer"> 
       <div class="heading-banner">
         <div class="custom-container container">
           <div class="row align-items-center">
             <div class="col-sm-12">
               <h4>Blogs detail</h4>
             </div>
          
           </div>
         </div>
       </div>


<div class="blogCompany">
    <div class="container">
        <div class="row">
            <div class="12">
                <div class="blog_title">
                    <h2>{{$post->name}}</h2>
                    <span><i class="fa fa-calendar"></i> {{$post->created_at->format('d F, Y')}}</span>
                    <a href="javascript:void(0)"> <i class="fa fa-user"></i> {{$post->user?$post->user->name:'No Author'}} </a>
                </div>
                <div class="single_blog_thumb" style="padding: 10px 0;">
                    <img src="{{asset($post->image())}}" alt="{{$post->name}}" />
                </div>
                <div class="single-blog-content">
                    {!!$post->short_description!!}
                    <hr />
                    <div class="detilsContentText">
                        {!!$post->description!!}
                    </div>
                </div>
                
                {{--<div class="single-blog-comment">
                    <h3>{{$post->postComments->where('status','active')->count()}} Comments</h3>
                    @foreach($comments as $comment)
                    <div class="card mb-3" style="max-width: 100%;">
                        <div class="row g-0 m-0">
                            <div class="col-md-4" style="max-width: 100px; padding: 5px; text-align: center;">
                                <img src="{{asset($comment->image())}}" class="img-fluid rounded-start" style="max-height: 80px;" alt="{{$comment->name}}" />
                            </div>
                            <div class="col-md-8" style="padding: 5px;">
                                <div class="card-body" style="padding: 5px 10px;">
                                    <h5 style="margin: 0;">
                                        {{$comment->name}}
                                    </h5>
                                    <span>{{$comment->created_at->format('F d, Y \a\t g:ia')}}</span>
                                    <p style="margin: 0;">{!!$comment->content!!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach @if($comments->count()==0)
                    <span>No Comment Yet</span>
                    @endif
                    <div class="commentForm">
                        <h4>Leave A Reply</h4>
                        <form action="{{route('blogComments',$post->slug)}}" method="post">
                        @csrf
                        <div class="form-group">
                            @if ($errors->has('comment'))
                            <p style="color: red; margin: 0;">{{ $errors->first('comment') }}</p>
                            @endif
                            <textarea rows="5" class="form-control" name="comment" placeholder="Write Your Comment*" required="">{{old('comment')}}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" required="" placeholder="Your name*">
                                @if ($errors->has('name'))
                                <p style="color: red; margin: 0;">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" name="email" value="{{old('email')}}" class="form-control" required="" placeholder="Your Email*">
                                @if ($errors->has('email'))
                                <p style="color: red; margin: 0;">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="website" value="{{old('website')}}" class="form-control" required="" placeholder="Your website*">
                            @if ($errors->has('website'))
                                <p style="color: red; margin: 0;">{{ $errors->first('website') }}</p>
                                @endif
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>--}}
                
            </div>
            {{--<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                @include(welcomeTheme().'blogs.includes.sideBar')
            </div>--}}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <hr />
                    <div class="realated-blogs">
                        <h2>Related Blogs</h2>

                        <div class="row" style="padding: 10px 0;">
                            @foreach($relatedPosts as $post)
                            <div class="col-md-3">
                                @include(welcomeTheme().'.blogs.includes.blogGrid')
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
            </div>

        </div>
    </div>
</div>



















@endsection @push('js') @endpush