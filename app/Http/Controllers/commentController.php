<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\commentReq;
use Auth;
use App\Comment;
class commentController extends Controller
{
    public function store(commentReq $req)
    {
    	$comment = Comment::create(
    	 	[
    	 		'text'=>$req['text'],
    	 		'post_id'=>$req['post_id'],
    	 		'user_id'=>Auth::user()->id
    	 	]);

    	return view("profile.layouts.comment",compact('comment'));
    }
}
