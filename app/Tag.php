<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){


    	return  $this->belongsToMany('App\Post');//post_tag by default laravel assumes 'name_of_table','table_id','tag_id')
    }
}
