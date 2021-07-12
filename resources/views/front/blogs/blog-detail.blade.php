@extends('layouts.front_layout.front_layout')
@section('content')

<section class="bg-light py-6">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="h2 mb-0">{{ $blog->title }}</h1>
      </div>
      <div class="col-md-6 mt-3 mt-md-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a class="link-title" href="{{url('/')}}">Home</a>
            </li>
            <li class="breadcrumb-item"><a class="link-title" href="{{url('/blogs')}}">Blog</a></li>
            <li class="breadcrumb-item active text-primary" aria-current="page">Blog Detail</li>
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
<?php $comment_count = App\Comment::commentCount($blog->id); ?>

<section>
  <div class="container">
    <div class="row">
    <div class="col-12 col-lg-8 mb-6 mb-lg-0">
    <div class="col-12">
        <!-- Blog Card -->
        <div class="card border-0 bg-transparent">
          <div class="position-relative rounded overflow-hidden">
          <div class="position-absolute z-index-1 bg-white text-pink text-center py-2 px-3 my-4 blog-info rounded-right"><i class="las la-calendar-check"></i> {{ date('d M', strtotime($blog['created_at'])) }} <span>|</span> <i class="las la-comment-alt"></i> <a href="#">{{ $comment_count }} @if($comment_count > 1) Comments @else Comment @endif</a></div>
         @if(file_exists('images/post_images/'.$blog->thumbnail))
           <img class="card-img-top hover-zoom" src="{{ url('images/post_images/'.$blog->thumbnail) }}" alt="Image">
         @elseif(file_exists('videos/post_videos/'.$blog->thumbnail))
           <video id="clip1" class="rounded" width="100%" muted="" autoplay preload="" loop poster="assets/images/blog/video-image.jpg" style="object-fit: cover; min-height:240px; z-index: -100;">
            <source src="{{url('videos/post_videos/'.$blog->thumbnail)}}" type="video/mp4">
          </video>
         @elseif(file_exists('audios/post_audios/'.$blog->thumbnail))
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
            <audio controls autoplay="" style="object-fit: cover; min-width:100%">
              <source src="{{url('audios/post_audios/'.$blog->thumbnail)}}" type="audio/mpeg">
            </audio>
          @endif
          </div>
          <div class="card-body pt-3 px-0">
          
            <h2 class="font-w-6 mb-3 line-h-normal link-title">{{ $blog->title }}</h2>
            
            {!! $blog->description !!}
        
      </div>
          <div class="d-md-flex justify-content-between mt-2 mb-8 border-top border-bottom py-4">
            <div class="d-flex align-items-center">
              <ul class="list-inline social-icons">
                <li class="list-inline-item"><a class="bg-white p-2 link-title ic-1-1x" href="#"><i class="la la-facebook"></i></a>
                </li>
                <li class="list-inline-item"><a class="bg-white p-2 link-title ic-1-1x" href="#"><i class="la la-dribbble"></i></a>
                </li>
                <li class="list-inline-item"><a class="bg-white p-2 link-title ic-1-1x" href="#"><i class="la la-instagram"></i></a>
                </li>
                <li class="list-inline-item"><a class="bg-white p-2 link-title ic-1-1x" href="#"><i class="la la-twitter"></i></a>
                </li>
                <li class="list-inline-item"><a class="bg-white p-2 link-title ic-1-1x" href="#"><i class="la la-linkedin"></i></a>
                </li>
              </ul>
            </div>
            <div class="d-flex align-items-center text-md-right mt-5 mt-md-0">
              <ul class="list-inline">
                @foreach($blog->tag_id as $tag)
                <li class="list-inline-item"><a class="btn link-title btn-sm bg-light-4" href="{{ url('blog-tag/'.str_replace(' ','+',strtolower($tag))) }}">{{ $tag }}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="owl-carousel no-pb" data-dots="false" data-items="2" data-margin="30" data-autoplay="true">
            @foreach($posts as $post)
            <div class="item">
              <div class="card border-0 bg-transparent">
              <div class="position-relative rounded overflow-hidden">
                <div class="position-absolute z-index-1 bg-white text-pink text-center py-1 px-3 my-4">18 May</div>
                 @if(file_exists('images/post_images/'.$post->thumbnail))
                   <img class="card-img-top hover-zoom" src="{{ url('images/post_images/'.$post->thumbnail) }}" alt="Image">
                 @elseif(file_exists('videos/post_videos/'.$post->thumbnail))
                   <video id="clip1" class="rounded" width="100%" muted="" autoplay preload="" loop poster="assets/images/post/video-image.jpg" style="object-fit: cover; min-height:240px; z-index: -100;">
                    <source src="{{url('videos/post_videos/'.$post->thumbnail)}}" type="video/mp4">
                  </video>
                  @elseif(file_exists('audios/post_audios/'.$post->thumbnail))
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
                    <audio controls autoplay="" style="object-fit: cover; min-width:100%">
                      <source src="{{url('audios/post_audios/'.$post->thumbnail)}}" type="audio/mpeg">
                    </audio> 
                 @endif
              </div>
              <div class="card-body px-0 pb-0">
                <div> 
                  <?php $tag_count = count($post->tag_id);  ?>
                  @foreach($post->tag_id as $index => $tag)
                   @if($tag_count > $index+1) 
                   <a class="d-inline-block link-title btn-link text-small" href="{{ url('blog-tag/'.str_replace(' ','+',strtolower($tag))) }}">{{$tag}},</a>
                    @else
                   <a class="d-inline-block link-title btn-link text-small" href="{{ url('blog-tag/'.str_replace(' ','+',strtolower($tag))) }}">{{$tag}}</a> 
                   @endif
                  @endforeach 
                  </div>
                <h2 class="h5 font-w-5 mt-2 mb-0"> <a class="link-title" href="{{ url('blog-detail/'.str_replace(' ','+',strtolower($post->slug))) }}">{{ $post->title }}</a> </h2>
              </div>
              <div></div>
            </div>
            </div>
            @endforeach
           
          </div>
          <div class="comment-area mt-5">
          <div class="content_title">
              <h4>Comments</h4>
          </div>
          <ul class="list_none comment_list">
             <?php $comments = App\Comment::comments($blog->id); ?>
             @if(count($comments) > 0)
             @foreach($comments as $comment)
              <li class="comment_info">
                  
                  <div class="d-flex">
                      <div class="comment_user">
                          <img src="{{ url('images/front_images/thumbnail/member1.png') }}" alt="user2">
                      </div>
                      <div class="comment_content">
                          <div class="d-flex">
                              <div class="meta_data">
                                  <h6><a href="#">{{ $comment['name'] }}</a></h6>
                                  <div class="comment-time">{{ date('F d, Y, h:i A', strtotime($comment['created_at'])) }}</div>
                              </div>
                              <div class="ml-auto">
                                  <button class="comment-reply" comment-id="{{ $comment['id'] }}" style="border:none;background:none;color: red;"><i class="las la-arrow-left"></i> Reply</button>
                              </div>
                          </div>
                          <p>{{ $comment['comment'] }}</p>
                      </div>
                  </div>
                  <?php $replies = App\CommentReply::replies($comment['id']); ?>
                  @if(count($replies) > 0)
                  <ul class="children">
                    @foreach($replies as $reply)
                  	<li class="comment_info">
                          <div class="d-flex">
                              <div class="comment_user">
                                  <img src="{{ url('images/front_images/thumbnail/member1.png') }}" alt="user3">
                              </div>
                              <div class="comment_content">
                                  <div class="d-flex align-items-md-center">
                                      <div class="meta_data">
                                          <h6><a href="#">{{ $reply['name'] }}</a></h6>
                                          <div class="comment-time">{{ date('F d, Y, h:i A', strtotime($reply['created_at'])) }}</div>
                                      </div>
                                      <div class="ml-auto">
                                          <button class="comment-reply" comment-id="{{ $comment['id'] }}" comment-name="{{ $reply['name'] }}" style="border:none;background:none;color: red;"><i class="las la-arrow-left"></i> Reply</button>
                                      </div>
                                  </div>
                                  <p>{{ $reply['comment'] }}</p>
                              </div>
                          </div>
                      </li>
                      @endforeach
                  </ul>
                  @endif
                  <form class="row comment_reply_form comment_reply_form-{{ $comment['id'] }}" style="margin-top: 20px; display: none;" method="post" action="{{ url('/comment-reply/'.$comment['id']) }}">
                      @csrf
                      @if(!Auth::check())
                      <div class="form-group col-sm-5 offset-md-1">
                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Name" required >
                      </div>
                      <p class="p"></p>
                      <div class="form-group col-sm-5">
                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Email" required >
                      </div>
                      @else
                      <input type="hidden" name="name" value="{{ Auth::user()->fname }} {{ Auth::user()->lname }}">
                      <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                      @endif
                      <div class="form-group mb-0 col-sm-10 offset-md-1">
                        <textarea  name="comment" class="form-control h-100 form_reply" placeholder="Your Comment" rows="3" required ></textarea>
                      </div>
                      <div class="col-sm-10 offset-md-1">
                        <button type="submit" class="btn btn-primary btn-animated mt-5">Reply</button>
                        <a class="btn btn-secondary btn-animated mt-5 cancel_comment_reply_form">Cancel</a>
                      </div>
                  </form>
              </li>
              @endforeach
              @else
               <h2>No Comments found...</h2>
              @endif
             
          </ul>
          <div class="post-comments mt-8 bg-light-4 rounded p-5">
            <div class="mb-5">
              <h5>Leave A Comment</h5>
            </div>

            <form class="row" method="post" action="{{ url('/comments/'.$blog->id) }}">
              @csrf
              @if(!Auth::check())
              <div class="form-group col-sm-6">
                <input id="form_name" type="text" name="name" class="form-control" placeholder="Name" required >
              </div>
              <div class="form-group col-sm-6">
                <input id="form_email" type="email" name="email" class="form-control" placeholder="Email" required >
              </div>
              @else
              <input type="hidden" name="name" value="{{ Auth::user()->fname }} {{ Auth::user()->lname }}">
              <input type="hidden" name="email" value="{{ Auth::user()->email }}">
              @endif
              <div class="form-group mb-0 col-sm-12">
                <textarea id="form_comment" name="comment" class="form-control h-100" placeholder="Your Comment" rows="4" required ></textarea>
              </div>
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary btn-animated mt-5">Submit</button>
              </div>
            </form>

          </div>
          <div></div>
        </div>
        <!-- End Blog Card -->
      </div>
    </div>
      </div>
      
      @include('front.blogs.blog_sidebar')
    </div>
    
  </div>
</section>

@include('layouts.front_layout.subscribe')

</div>

@endsection