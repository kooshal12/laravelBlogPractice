<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	// Define table name explicitly
    protected $table= 'categories';

    public function posts(){

    	return $this->hasMany('App\Post');
    }
}
