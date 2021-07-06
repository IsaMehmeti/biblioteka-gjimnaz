<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable =['name','surname'];

    public function book()
    {
    	return $this->belongsToMany('App\Models\Book' , 'authors_books' , 'author_id' , 'book_id');
    } 
}
