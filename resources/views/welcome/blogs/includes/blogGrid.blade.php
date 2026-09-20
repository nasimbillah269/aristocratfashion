<div class="blogGrid">
    <div class="image">
        <a href="{{route('blogView',$post->slug?:'no-title')}}">
            <img src="{{asset($post->image())}}" alt="{{$post->name}}">
        </a>
        @if($ctg =$post->postCategories()->first())
        <a href="{{route('blogCategory',$ctg->slug?:'no-title')}}" class="ctg">{{$ctg->name}}</a>
        @endif
    </div>
   
    <!--<div class="author">-->
    <!--    <div class="row m-0">-->
    <!--        <div class="col-6 p-0">-->
    <!--            <i class="fa fa-user"></i> By <a href="javascript:void(0)" style="color: #0ba350;"></a>-->
    <!--        </div>-->
    <!--        <div class="col-6 p-0" style="text-align:right;">-->
    <!--            <i class="fa fa-calander"></i> {{$post->created_at->format('d M Y')}}-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
     <div class="blogname">
        <a href="{{route('blogView',$post->slug?:'no-title')}}">{{$post->name}}</a>
    </div>
</div>
 {{--<div class="blog-main-box">
                   <div>
                     <div class="blog-img">  <img class="img-fluid bg-img" src="{{asset($post->image())}}" alt="" /></div>
                   </div>
                   <div class="blog-content">  <span class="blog-date">{{$post->created_at->format('d M Y')}}</span>
                   <a href="{{route('blogView',$post->slug?:'no-title')}}"> 
                       <h4>{{$post->name}}</h4></a>
                     <p>
                         {{$post->short_description}}
                     </p>
                     <div class="share-box">
                       <div class="d-flex align-items-center gap-2"><img class="img-fluid" src="../assets/images/user/1.jpg" alt="" />
                         <h6> <i class="fa fa-user"></i> {{$post->user?$post->user->name:'No Author'}}</h6>
                       </div><a href="{{route('blogView',$post->slug?:'no-title')}}"> Read More.. </a>
                     </div>
                   </div>
                 </div>--}}