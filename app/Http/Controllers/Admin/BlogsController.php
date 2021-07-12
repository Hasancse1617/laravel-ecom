<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BlogCategory;
use App\BlogTag;
use App\Blog;
use Session;
use Auth;
use Image;

class BlogsController extends Controller
{
    public function view()
    {
    	Session::put('page', 'blogs');
    	$blogs = Blog::with('author')->get();
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
    	return view('admin.blog.blog')->with(compact('blogs'));
    }

    public function addEditBlog(Request $request, $id=null)
    {
    	if ($id == "") {
    		$title = "Add Post";
    		$blog = new Blog();
    		$blogData = array();
    		$message = "Data inserted successfully";
  
	        if ($request->isMethod('post')) {
	        	$data = $request->all();
	             
	            ////Validation
	            $rules=[
	              'title' => 'required|regex:/^[\pL\s\-]+$/u',
	              'thumbnail'=> 'required|mimes:jpeg,png,jpg,gif,svg,mp3,mpeg,mp4,3gp|max:2048',
	    		];
	    		$custom_msg = [
	              'title.required' => 'Post title is required',
	              'title.regex' => 'Valid Post title is required',
	              'thumbnail.required'=> 'Post thumbnail is required',
	              'thumbnail.mimes' => 'Valid blog thumbnail is required',
	              'thumbnail.max' => 'thumbnail must be maximum 2 Mb',
	              
	    		];
	    		$this->validate($request,$rules,$custom_msg);

	            ////Validation End

	        	$data['category_id'] = implode(',', $request->category_id);
	        	$data['tag_id'] = implode(',', $request->tag_id);
	        	//dd($data);
	        	if ($request->hasFile('thumbnail')) {
	                $file_tmp = $request->file('thumbnail');
	                if ($file_tmp->isValid()) {
	                    $extension = $file_tmp->getClientOriginalExtension();
	                    $thumbnail = rand(111,99999).'.'.$extension;
	  
	                    if ($extension=='jpeg'||$extension=='jpg'||$extension=='png'||$extension=='gif'||$extension=='svg') {
	                    	$imagePath = 'images/post_images/'.$thumbnail;
	                    	Image::make($file_tmp)->save($imagePath);
	                        $blog->thumbnail = $thumbnail;
	                    }
	                    else if ($extension=='mpeg'||$extension=='mp4'||$extension=='3gp') {
	                    	$video_path = "videos/post_videos/";
	            		    $file_tmp->move($video_path,$thumbnail);
	                         
	                     	$blog->thumbnail = $thumbnail;
	                    }
	                    else if($extension=='mp3'){
	                    	$audio_path = "audios/post_audios/";
	            		    $file_tmp->move($audio_path,$thumbnail);

	                     	$blog->thumbnail = $thumbnail;
	                    }
	                   
	                }
	           
	            }

	            $blog->title = $data['title'];
	            $blog->slug = strtolower($data['title']);
	            $blog->description = $data['description'];
	            $blog->category_id = $data['category_id'];
	            $blog->tag_id = $data['tag_id'];
	            $blog->author_id = Auth::guard('admin')->user()->id;
	            $blog->status = 1;
	            $blog->save();
	            
	            return redirect('admin/blogs')->with('success_message',$message);
	        }
	    }

	    //Blog Edit
	    else {
    		$title = "Edit Post";
    		$blog = Blog::find($id);
    		$blogData = Blog::find($id)->toArray();
    		$blogData['category_id'] = explode(',', $blogData['category_id']);
    		$blogData['tag_id'] = explode(',', $blogData['tag_id']);
    		$message = "Data updated successfully";
    		
    		if ($request->isMethod('post')) {
	        	$data = $request->all();
	             //dd($data);
	            ////Validation
	            $rules=[
	              'title' => 'required|regex:/^[\pL\s\-]+$/u',
	    		];
	    		$custom_msg = [
	              'title.required' => 'Post title is required',
	              'title.regex' => 'Valid Post title is required',
	              
	    		];
	    		$this->validate($request,$rules,$custom_msg);

	            ////Validation End

	        	$data['category_id'] = implode(',', $request->category_id);
	        	$data['tag_id'] = implode(',', $request->tag_id);
	        	//dd($data);
	        	if ($request->hasFile('thumbnail')) {
	                
	                //// Unlink file
	                $thumbnail = Blog::where('id',$id)->first();
			        $thumbnail_image_path = "images/post_images/";
			        $thumbnail_video_path = "videos/post_videos/";
			        $thumbnail_audio_path = "audios/post_audios/";

			        if(file_exists($thumbnail_image_path.$thumbnail->thumbnail)){
			            unlink($thumbnail_image_path.$thumbnail->thumbnail);
			        }
			        if(file_exists($thumbnail_video_path.$thumbnail->thumbnail)){
			            unlink($thumbnail_video_path.$thumbnail->thumbnail);
			        }
			        if(file_exists($thumbnail_audio_path.$thumbnail->thumbnail)){
			            unlink($thumbnail_audio_path.$thumbnail->thumbnail);
			        }


	                $file_tmp = $request->file('thumbnail');
	                if ($file_tmp->isValid()) {
	                    $extension = $file_tmp->getClientOriginalExtension();
	                    $thumbnail = rand(111,99999).'.'.$extension;
	  
	                    if ($extension=='jpeg'||$extension=='jpg'||$extension=='png'||$extension=='gif'||$extension=='svg') {
	                    	$imagePath = 'images/post_images/'.$thumbnail;
	                    	Image::make($file_tmp)->save($imagePath);
	                        $blog->thumbnail = $thumbnail;
	                    }
	                    else if ($extension=='mpeg'||$extension=='mp4'||$extension=='3gp') {
	                    	$video_path = "videos/post_videos/";
	            		    $file_tmp->move($video_path,$thumbnail);
	                         
	                     	$blog->thumbnail = $thumbnail;
	                    }
	                    else if($extension=='mp3'){
	                    	$audio_path = "audios/post_audios/";
	            		    $file_tmp->move($audio_path,$thumbnail);

	                     	$blog->thumbnail = $thumbnail;
	                    }
	                   
	                }
	           
	            }

	            $blog->title = $data['title'];
	            $blog->slug = strtolower($data['title']);
	            $blog->description = $data['description'];
	            $blog->category_id = $data['category_id'];
	            $blog->tag_id = $data['tag_id'];
	            $blog->author_id = Auth::guard('admin')->user()->id;
	            $blog->status = 1;
	            $blog->save();
	            
	            return redirect('admin/blogs')->with('success_message',$message);
	        }
    	}
        //dd($blogData);
    	$categories = BlogCategory::orderBy('id','desc')->get()->toArray();
    	$tags = BlogTag::orderBy('id','desc')->get()->toArray();
    	return view('admin.blog.add-edit-blog')->with(compact('title','blogData','categories','tags'));
    }
    
    public function updateBlogStatus(Request $request)
    {
    	if ($request->ajax()) {
    		$data = $request->all();
    		
            if ($data['status'] == "Active") {
            	$status = 0;
            }
            else{
            	$status = 1;
            }
            Blog::where('id', $data['blog_id'])->update(['status'=>$status]);

            return response()->json(['status'=>$status,'blog_id'=>$data['blog_id']]);
    	}
    }

    public function deleteBlog($id)
    {
        $thumbnail = Blog::where('id',$id)->first();

        $thumbnail_image_path = "images/post_images/";
        $thumbnail_video_path = "videos/post_videos/";
        $thumbnail_audio_path = "audios/post_audios/";

        if(file_exists($thumbnail_image_path.$thumbnail->thumbnail)){
            unlink($thumbnail_image_path.$thumbnail->thumbnail);
        }
        if(file_exists($thumbnail_video_path.$thumbnail->thumbnail)){
            unlink($thumbnail_video_path.$thumbnail->thumbnail);
        }
        if(file_exists($thumbnail_audio_path.$thumbnail->thumbnail)){
            unlink($thumbnail_audio_path.$thumbnail->thumbnail);
        }
        Blog::where('id',$id)->delete();
        session::flash('success_message','Post deleted successfully');
        return redirect()->back();
    }

    ////Category
    public function viewCategory()
    {
    	Session::put('page', 'blog_category');
    	$categories = BlogCategory::all();
    	return view('admin.blog.category.view')->with(compact('categories'));
    }

    public function addCategory(Request $request)
    {
    	if ($request->isMethod('post')) {

    		$validated = $request->validate([
		        'name' => 'required|unique:blog_categories|max:255',
		    ]);

    		$data = $request->all();
    		$category = new BlogCategory();
    		$category->name = $data['name'];
    		$category->slug = strtolower($data['name']);
    		$category->save();
    		return redirect()->back();
    	}
    }

    public function deleteBlogCategory($id)
    {
    	BlogCategory::where('id',$id)->delete();
        session::flash('success_message','Post Tag deleted successfully');
        return redirect()->back();
    }

    ////Tag
    public function viewTag()
    {
    	Session::put('page', 'blog_tag');
    	$tags = BlogTag::all();
    	return view('admin.blog.tag.view')->with(compact('tags'));
    }

    public function addTag(Request $request)
    {
    	if ($request->isMethod('post')) {

    		$validated = $request->validate([
		        'name' => 'required|unique:blog_tags|max:255',
		    ]);

    		$data = $request->all();
    		$category = new BlogTag();
    		$category->name = $data['name'];
    		$category->slug = strtolower($data['name']);
    		$category->save();
    		return redirect()->back();
    	}
    }

    public function deleteBlogTag($id)
    {
    	BlogTag::where('id',$id)->delete();
        session::flash('success_message','Post Tag deleted successfully');
        return redirect()->back();
    }
}
