<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\CommentReply;

class CommentsController extends Controller
{
    public function comment(Request $request, $id)
    {
    	if ($request->isMethod('post')) {
    		$data = $request->all();

    		$comment = new Comment;
    		$comment->post_id = $id;
    		$comment->name = $data['name'];
    		$comment->email = $data['email'];
    		$comment->comment = $data['comment'];
    		$comment->save();

    		return redirect()->back();
    	}
    }

    public function commentReply(Request $request, $id)
    {
    	if ($request->isMethod('post')) {
    		$data = $request->all();

    		$comment = new CommentReply;
    		$comment->comment_id = $id;
    		$comment->name = $data['name'];
    		$comment->email = $data['email'];
    		$comment->comment = $data['comment'];
    		$comment->save();

    		return redirect()->back();
    	}
    }
}
