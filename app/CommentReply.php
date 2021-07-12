<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;

    public static function replies($comment_id)
    {
    	$replies = CommentReply::where('comment_id',$comment_id)->get()->toArray();
    	return $replies;
    }
}
