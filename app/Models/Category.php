<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    Protected $fillable	=['name'];
    
    public function book()
    {
    	return $this->hasMany('App\Models\Books');
    }
}
