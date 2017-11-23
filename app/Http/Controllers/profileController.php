<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\imageRequest;
use App\User;
use App\Post;
use Auth;
class profileController extends Controller
{
    public function show( $id)
    {
    	$user = User::findOrFail($id);
        $posts = Post::where('user_id',"=",$id)->get();
    	return view("profile.index",compact("user","posts"));
        
    }

    function imageEdit($image)
    {
        $imageName = date('d-m-y-h-s').$image->getClientOriginalName();
        $path = base_path().'\public\images\\';
       $image->move($path , $imageName);
        return 'images\\'.$imageName;
    }

    public function editImage(imageRequest $req)
    {
    	User::where("id","=",Auth::user()->id)->update(['image'=>$this->imageEdit($req['image'])]);

    	return redirect("/profile/".Auth::user()->id);
    }
}
