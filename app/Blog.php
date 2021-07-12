<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\BlogTag;

class Blog extends Model
{
    use HasFactory;

    public function author()
    {
    	return $this->belongsTo(Admin::class,'author_id');
    }

    public function postView()
    {
        return $this->hasMany(PostView::class);
    }

    public static function blogs()
    {
    	$blogs = Blog::where('status',1)->orderBy('id','desc')->get();
    	foreach ($blogs as $blog) {             
             //Get Tag
            $tags = [];
    		$blog_tag = explode(',', $blog->tag_id);
    		foreach ($blog_tag as $id) {
    			$tag = BlogTag::where('id',$id)->value('name');
    			$tags[] = $tag;
    		}
    		$blog->tag_id = $tags;
        }
        return $blogs;
    }
}
