<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
       protected $fillable = ['emri' , 'sasia' , 'category_id'];

       public function category()
	   {
	   	return $this->belongsTo('App\Models\Category' , 'category_id');
	   }
	    public function author()
	   {
	   	return $this->belongsToMany('App\Models\Author' , 'authors_books' , 'book_id' , 'author_id');
	   }
	    public function borrow()
	   {
	   	return $this->hasMany('App\Models\Borrow'); 
	   }
}
