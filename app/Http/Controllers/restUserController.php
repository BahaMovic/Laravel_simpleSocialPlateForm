<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class restUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
         $data = User::create([
            'name'=>$req['name'],
            'email'=>$req['email'],
            'password'=>$req['password'],
            'gender'=>$req['gender'],
            'sport'=>$req['sport'],
            'art'=>$req['art'],
            'education'=>$req['education'],
            'api_token'=>str_random(60)
        ]);

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $data = User::where('id','=',$id)->update([
         'name'=>$req['name'],
            'email'=>$req['email'],
            'password'=>$req['password'],
            'gender'=>$req['gender'],
            'sport'=>$req['sport'],
            'art'=>$req['art'],
            'education'=>$req['education'],
        ]);

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::where('id','=',$id)->delete();

        return response()->json($data);
    }
}
