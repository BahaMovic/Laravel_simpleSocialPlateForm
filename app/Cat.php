<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
   protected $fillable = ['id','text'];
   protected $table = 'cat';
}
