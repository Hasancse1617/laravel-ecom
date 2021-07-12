
<div class="col-12 col-lg-4 blog-sidebar">
 <form action="{{ url('/blog-search') }}" class="form-inline my-2 my-lg-0" method="get">
    <input class="form-control col" type="search" placeholder="Search" aria-label="Search" name="post">
    <button class="btn my-2 my-sm-0 col-auto" type="submit"><i class="las la-search"></i></button>
  </form>
  <div class="">
    <?php 
        if(Session::get('page')=="blog_detail"){
           $populars = App\Blog::orderBy('views','desc')->where('id','!=',$blog->id)->take(3)->get();
        }
        else {
          $populars = App\Blog::orderBy('views','desc')->take(3)->get();
        }

     ?>
    <div class="widget border p-4 rounded mt-5">
      <h5 class="mb-4">Most Popular Posts</h5>
      @foreach($populars as $popular)
      <article class="mt-0">
        <div class="media align-items-top">
          @if(file_exists('images/post_images/'.$popular->thumbnail))
           <img class="card-img-top hover-zoom" src="{{ url('images/post_images/'.$popular->thumbnail) }}" alt="Image" class="mr-3 mt-1" style="height: 100px;width: 100px;margin-right: 5px;margin-bottom: 10px;">
         @elseif(file_exists('videos/post_videos/'.$popular->thumbnail))
           <video id="clip1" class="rounded" width="100px" muted="" autoplay preload="" loop poster="assets/images/blog/video-image.jpg" style="object-fit: cover; min-height:100px; z-index: -100; margin-right: 5px;margin-bottom: 10px;" class="mr-3 mt-1">
            <source src="{{url('videos/post_videos/'.$popular->thumbnail)}}" type="video/mp4">
          </video>
         @elseif(file_exists('audios/post_audios/'.$popular->thumbnail))
            <audio controls autoplay="" style="object-fit: cover; width:100px; height: 100px;margin-right: 5px;margin-bottom: 10px;" class="mr-3 mt-1">
              <source src="{{url('audios/post_audios/'.$popular->thumbnail)}}" type="audio/mpeg">
            </audio>
          @endif
          
          <div class="media-body">
            <h6>
                <a class="link-title" href="{{ url('blog-detail/'.str_replace(' ','+',strtolower($blog->slug))) }}">{{ $popular->title }}</a>
              </h6>
            <a class="d-inline-block text-grey small font-w-4" href="#">{{ date('d F Y', strtotime($popular->created_at)) }}</a>
          </div>
        </div>
      </article>
      @endforeach
      
    </div>
    <div class="widget border p-4 rounded mt-5">
      <h5 class="mb-4">Categories</h5>
      <ul class="list-unstyled list-group-flush">
        @foreach($categories as $category)
        <li class="mb-3"> <a class="list-group-item-action d-flex justify-content-between align-items-center" href="{{ url('blog-category/'.str_replace(' ','+',$category->slug)) }}">
           {{ $category->name }}
           <?php 
               $count = App\Blog::where('category_id','like','%'.$category->id.'%')->count();
            ?>          
            <span class="badge bg-pink-light text-dark font-weight-normal p-2 badge-pill ml-2">{{$count}}</span>
          </a>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="widget border p-4 rounded mt-5">
      <h5 class="mb-4">Tags</h5>
     <div>
         @foreach($tags as $tag)
           <a class="btn link-title btn-sm bg-light-4 mr-1 mb-2" href="{{ url('blog-tag/'.str_replace(' ','+',$tag->slug)) }}">{{ $tag->name }}</a>
         @endforeach
      </div>
    </div>
    <div class="widget banner">
      
      <div class="position-relative rounded overflow-hidden mt-5"> 
      <!-- Background --> 
      <img class="img-fluid hover-zoom" src="assets/images/product-ad/02.jpg" alt=""> 
      <!-- Body -->
      <div class="position-absolute top-50 pl-4">
        <h6 class="text-dark">Todays Deals</h6>
        <!-- Heading -->
        <h4 class="font-w-6 text-dark">Accessories <br>
          Special</h4>
        <!-- Link --> <a class="more-link text-dark" href="#">Shop Now </a> </div>
    </div>
    
    
    <div class="position-relative rounded overflow-hidden mt-5"> 
      <!-- Background --> 
      <img class="img-fluid hover-zoom" src="assets/images/product-ad/03.jpg" alt=""> 
      <!-- Body -->
      <div class="position-absolute top-50 pl-5">
        <h6 class="text-dark">Hot Deals</h6>
        <!-- Heading -->
        <h4 class="font-w-6">Handbags<br>
          Design</h4>
        <!-- Link --> <a class="more-link text-dark" href="#">Shop Now </a> </div>
    </div>
    </div>
  </div>
</div>