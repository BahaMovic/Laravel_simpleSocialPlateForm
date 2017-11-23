<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Http\Requests\postReq;
class postController extends Controller
{
    public function store(postReq $req)
    {
    	Post::create([
    		'text'=>$req['text'],
    		'cat_id'=>$req['cat_id'],
    		'user_id'=>Auth::user()->id,
    	]);
    	 return redirect("/profile/".Auth::user()->id);
    }

}
