<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
     protected $fillable = ['student_id' , 'status' ,'book_id' , 'date'];

	public function book()
	   {
	   	return $this->belongsTo('App\Models\Book' , 'book_id');
	   }

	   public function student()
	   {
	   	return $this->belongsTo('App\Models\Student' , 'student_id');
	   }
}
