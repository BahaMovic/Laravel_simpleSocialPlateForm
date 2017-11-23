<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['id', 'text', 'user_id', 'cat_id', 'created_at', 'updated_at'];
    protected $table = "posts";


    public function user(){
    	return $this->belongsTo("App\User");
    }

    public function comments()
    {
    	return $this->hasMany("App\Comment");
    }

    public function getCategory_codeAttribute($value)
    {
    	if($value == "1")
    	{
    		return "Sport";
    	}
    	elseif($value == "2")
    	{
    		return "Art";
    	}
    	else
    	{
    		return "Education";
    	}
    }
    public function cat()
    {
    	return $this->belongsTo("App\Cat");
    }
}
