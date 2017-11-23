<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable =['id', 'text', 'user_id', 'post_id', 'created_at', 'updated_at'];
	protected $table = "comments";


	public function user()
	{
		return $this->belongsTo("App\User");
	}
}
