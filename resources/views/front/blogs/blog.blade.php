@extends('layouts.front_layout.front_layout')
@section('content')
<!--hero section start-->
<section class="bg-light py-6">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="h2 mb-0">Blog</h1>
      </div>
      <div class="col-md-6 mt-3 mt-md-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a class="link-title" href="{{ url('/') }}">Home</a>
            </li>
            @if(@$categorypage)
             <li class="breadcrumb-item"><a class="link-title" href="{{ url('/blogs') }}">Blog</a>
             <li class="breadcrumb-item active text-primary" aria-current="page">{{ $categorypage->name }}</li>
            @elseif(@$tagpage)
             <li class="breadcrumb-item"><a class="link-title" href="{{ url('/blogs') }}">Blog</a>
             <li class="breadcrumb-item active text-primary" aria-current="page">{{ $tagpage->name }}</li>
            @elseif(@$_GET['post'])
             <li class="breadcrumb-item"><a class="link-title" href="{{ url('/blogs') }}">Blog</a>
             <li class="breadcrumb-item active text-primary" aria-current="page">{{ $_GET['post'] }}</li>
            @else
            <li class="breadcrumb-item active text-primary" aria-current="page">Blog</li>
            @endif
          </ol>
        </nav>
      </div>
    </div>
    <!-- / .row -->
  </div>
  <!-- / .container -->
</section>

<!--hero section end--> 


<!--body content start-->

<div class="page-content">

<!--blog start-->

<section>
  <div class="container">
    <div class="row">
    <div class="col-12 col-lg-8 mb-6 mb-lg-0">
    <div class="row">
      @if(count($blogs) > 0)
      @foreach($blogs as $blog)
      @if(file_exists('images/post_images/'.$blog->thumbnail))
      <div class="col-12 col-lg-6 col-md-6 mb-5">
        <!-- Blog Card -->
        <div class="card border-0 bg-transparent">
          <div class="position-relative rounded overflow-hidden">
            <div class="position-absolute z-index-1 bg-white text-pink text-center py-1 px-3 my-4">{{ date('d M', strtotime($blog['created_at'])) }}</div>
            <img class="card-img-top hover-zoom" src="{{url('images/post_images/'.$blog->thumbnail)}}" alt="Image"> </div>
          <div class="card-body px-0 pb-0">
            <div>
              <?php $tag_count = count($blog->tag_id);  ?>
              @foreach($blog->tag_id as $index => $tag)
               @if($tag_count > $index+1) 
               <a class="d-inline-block link-title btn-link text-small" href="{{ url('blog-tag/'.str_replace(' ','+',strtolower($tag))) }}">{{$tag}},</a>
                @else
               <a class="d-inline-block link-title btn-link text-small" href="{{ url('blog-tag/'.str_replace(' ','+',strtolower($tag))) }}">{{$tag}}</a> 
               @endif
              @endforeach
             </div>
            <h2 class="h5 font-w-5 mt-2 mb-0"> <a class="link-title" href="{{ url('blog-detail/'.str_replace(' ','+',strtolower($blog->slug))) }}">{{ $blog->title }}</a> </h2>
          </div>
          <div></div>
        </div>
        <!-- End Blog Card -->
      </div>
      @elseif(file_exists('videos/post_videos/'.$blog->thumbnail))
      <div class="col-12 col-lg-6 col-md-6  mb-5 mt-md-0">
        <!-- Blog Card -->
        <div class="card border-0 bg-transparent">
          <div class="position-absolute z-index-1 bg-white text-pink text-center py-1 px-3 my-4">{{ date('d M', strtotime($blog['created_at'])) }}</div>
          <video id="clip1" class="rounded" width="100%" muted="" autoplay preload="" loop poster="assets/images/blog/video-image.jpg" style="object-fit: cover; min-height:240px; z-index: -100;">
            <source src="{{url('videos/post_videos/'.$blog->thumbnail)}}" type="video/mp4">
          </video>
          <div class="card-body px-0 pb-0">
            <div> 
              <?php $tag_count = count($blog->tag_id);  ?>
              @foreach($blog->tag_id as $index => $tag)
               @if($tag_count > $index+1) 
               <a class="d-inline-block link-title btn-link text-small" href="{{ url('blog-tag/'.str_replace(' ','+',strtolower($tag))) }}">{{$tag}},</a>
                @else
               <a class="d-inline-block link-title btn-link text-small" href="{{ url('blog-tag/'.str_replace(' ','+',strtolower($tag))) }}">{{$tag}}</a> 
               @endif
              @endforeach 
            </div>
            <h2 class="h5 font-w-5 mt-2"> <a class="link-title" href="{{ url('blog-detail/'.str_replace(' ','+',strtolower($blog->slug))) }}">{{ $blog->title }}</a> </h2>
          </div>
          <div></div>
        </div>
        <!-- End Blog Card -->
      </div>
      @elseif(file_exists('audios/post_audios/'.$blog->thumbnail))
      <div class="col-12 col-lg-6 col-md-6 mb-5">
        <!-- Blog Card -->
        <div class="card border-0 bg-transparent">
          <div class="position-relative rounded overflow-hidden bg-light-4">
            <div class="position-absolute z-index-1 bg-white text-pink text-center py-1 px-3 my-4">{{ date('d M', strtotime($blog['created_at'])) }}</div>
            <div class="loader-container">
              <div class="rectangle-1"></div>
              <div class="rectangle-2"></div>
              <div class="rectangle-3"></div>
              <div class="rectangle-4"></div>
              <div class="rectangle-5"></div>
              <div class="rectangle-6"></div>
              <div class="rectangle-5"></div>
              <div class="rectangle-4"></div>
              <div class="rectangle-3"></div>
              <div class="rectangle-2"></div>
              <div class="rectangle-1"></div>
            </div>
            <audio controls autoplay="" style="object-fit: cover; min-width:350px">
              <source src="{{url('audios/post_audios/'.$blog->thumbnail)}}" type="audio/mpeg">
            </audio>
          </div>
          <div class="card-body px-0 pb-0">
            <div>
              <?php $tag_count = count($blog->tag_id);  ?>
              @foreach($blog->tag_id as $index => $tag)
               @if($tag_count > $index+1) 
               <a class="d-inline-block link-title btn-link text-small" href="{{ url('blog-tag/'.str_replace(' ','+',strtolower($tag))) }}">{{$tag}},</a>
                @else
               <a class="d-inline-block link-title btn-link text-small" href="{{ url('blog-tag/'.str_replace(' ','+',strtolower($tag))) }}">{{$tag}}</a> 
               @endif
              @endforeach
            </div>
            <h2 class="h5 font-w-5 mt-2"> <a class="link-title" href="{{ url('blog-detail/'.str_replace(' ','+',strtolower($blog->slug))) }}">{{ $blog->title }}</a> </h2>
          </div>
          <div></div>
        </div>
        <!-- End Blog Card -->
      </div>
    
      @endif
      @endforeach
      @else
         <div class="col-md-12 text-center" style="background:#ce0c15;padding:20px;color:#fff;">
            <h2>Oops! No post found... </h2>
         </div>
      @endif
      </div>
      </div>
      @include('front.blogs.blog_sidebar')
    </div>
    <div class="row mt-10">
      <div class="col-12">
        {{ $blogs->links() }}

      </div>
    </div>
  </div>
</section>
   
   @include('layouts.front_layout.subscribe')

</div>

@endsection