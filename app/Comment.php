<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function reply()
    {
    	return $this->hasMany('App\CommentReply', 'comment_id');
    }
    public static function comments($post_id)
    {
    	$comments = Comment::where('post_id',$post_id)->get()->toArray();
    	return $comments;
    }
    public static function commentCount($post_id)
    {
    	$comments = Comment::with('reply')->where('post_id',$post_id)->get()->toArray();
    	$replyCount = 0;
    	foreach ($comments as $comment) {
    		$reply = CommentReply::where('comment_id',$comment['id'])->get()->count();
    		$replyCount = $reply + $replyCount;
    	}
        $comments = $replyCount+ count($comments);
    	return $comments;
    }
}
