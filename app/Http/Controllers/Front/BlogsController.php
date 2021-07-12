<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BlogCategory;
use App\BlogTag;
use App\PostView;
use App\Blog;
use Session;

class BlogsController extends Controller
{
    public function blogs()
    {
        Session::put('page', 'blogs');
    	$blogs = Blog::orderBy('id', 'desc')->where('status',1)->paginate(6);
    	foreach ($blogs as $blog) {
    		//Get Category
    		$categories = [];
    		$blog_category = explode(',', $blog->category_id);
    		foreach ($blog_category as $id) {
    			$category = BlogCategory::where('id',$id)->value('name');
    			$categories[] = $category;
    		}
    		$blog->category_id = $categories;
             
             //Get Tag
    		$tags = [];
    		$blog_tag = explode(',', $blog->tag_id);
    		foreach ($blog_tag as $id) {
    			$tag = BlogTag::where('id',$id)->value('name');
    			$tags[] = $tag;
    		}
    		$blog->tag_id = $tags;
    	}
    	//dd($blogs->toArray());
    	$categories = BlogCategory::orderBy('id','desc')->get();
    	$tags = BlogTag::orderBy('id','desc')->get();
    	return view('front.blogs.blog')->with(compact('blogs','tags','categories'));
    }

    public function blogCategory($slug)
    {
        $slug = str_replace('+',' ',$slug);
        $categorypage = BlogCategory::where('slug',$slug)->first();
        Session::put('page', 'blogs');
        $blogs = Blog::orderBy('id', 'desc')->where('status',1)->where('category_id','like','%'.$categorypage->id.'%')->paginate(6);
        foreach ($blogs as $blog) {
            //Get Category
            $categories = [];
            $blog_category = explode(',', $blog->category_id);
            foreach ($blog_category as $id) {
                $category = BlogCategory::where('id',$id)->value('name');
                $categories[] = $category;
            }
            $blog->category_id = $categories;
             
             //Get Tag
            $tags = [];
            $blog_tag = explode(',', $blog->tag_id);
            foreach ($blog_tag as $id) {
                $tag = BlogTag::where('id',$id)->value('name');
                $tags[] = $tag;
            }
            $blog->tag_id = $tags;
        }
        //dd($blogs->toArray());
        $categories = BlogCategory::orderBy('id','desc')->get();
        $tags = BlogTag::orderBy('id','desc')->get();
        return view('front.blogs.blog')->with(compact('blogs','tags','categories','categorypage'));
    }

    public function blogTag($slug)
    {
        $slug = str_replace('+',' ',$slug);
        $tagpage = BlogTag::where('slug',$slug)->first();
        Session::put('page', 'blogs');
        $blogs = Blog::orderBy('id', 'desc')->where('status',1)->where('tag_id','like','%'.$tagpage->id.'%')->paginate(6);
        foreach ($blogs as $blog) {
            //Get Category
            $categories = [];
            $blog_category = explode(',', $blog->category_id);
            foreach ($blog_category as $id) {
                $category = BlogCategory::where('id',$id)->value('name');
                $categories[] = $category;
            }
            $blog->category_id = $categories;
             
             //Get Tag
            $tags = [];
            $blog_tag = explode(',', $blog->tag_id);
            foreach ($blog_tag as $id) {
                $tag = BlogTag::where('id',$id)->value('name');
                $tags[] = $tag;
            }
            $blog->tag_id = $tags;
        }
        //dd($blogs->toArray());
        $categories = BlogCategory::orderBy('id','desc')->get();
        $tags = BlogTag::orderBy('id','desc')->get();
        return view('front.blogs.blog')->with(compact('blogs','tags','categories','tagpage'));
    }

    public function blogSearch()
    {
        $data = $_GET['post'];
       //dd($data);
        Session::put('page', 'blogs');
        $blogs = Blog::where('status',1)->where('title','like','%'.$data.'%')->orWhere('description','like','%'.$data.'%')->orderBy('id', 'desc')->paginate();
        //dd($blogs->toArray());
        foreach ($blogs as $blog) {
            //Get Category
            $categories = [];
            $blog_category = explode(',', $blog->category_id);
            foreach ($blog_category as $id) {
                $category = BlogCategory::where('id',$id)->value('name');
                $categories[] = $category;
            }
            $blog->category_id = $categories;
             
             //Get Tag
            $tags = [];
            $blog_tag = explode(',', $blog->tag_id);
            foreach ($blog_tag as $id) {
                $tag = BlogTag::where('id',$id)->value('name');
                $tags[] = $tag;
            }
            $blog->tag_id = $tags;
        }
        //dd($blogs->toArray());
        $categories = BlogCategory::orderBy('id','desc')->get();
        $tags = BlogTag::orderBy('id','desc')->get();
        return view('front.blogs.blog')->with(compact('blogs','tags','categories'));
    }

    public function blogDetail($slug)
    {
        Session::put('page', 'blog_detail');
        $slug = str_replace('+',' ',$slug);
        $blog = Blog::where('slug',$slug)->first();

        $views = Blog::where('slug',$slug)->value('views');
        $updateviews = Blog::where('slug',$slug)->update(['views'=> $views+1]);
        
        $posts = Blog::orderby('id','desc')->where('slug','!=',$slug)->take(3)->get();    
        foreach ($posts as $post) {            
             //Get Tag
            $tags = [];
            $post_tag = explode(',', $post->tag_id);
            foreach ($post_tag as $id) {
                $tag = BlogTag::where('id',$id)->value('name');
                $tags[] = $tag;
            }
            $post->tag_id = $tags;
        }
        ///single post tag
        $single_tag = [];
        $blog_tag = explode(',', $blog->tag_id);
        foreach ($blog_tag as $id) {
            $tag = BlogTag::where('id',$id)->value('name');
            $single_tag[] = $tag;
        }
        $blog->tag_id = $single_tag;
        //dd($post->toArray());
        

        $categories = BlogCategory::orderBy('id','desc')->get();
        $tags = BlogTag::orderBy('id','desc')->get();
        return view('front.blogs.blog-detail')->with(compact('blog','posts','categories','tags'));
    }
}
