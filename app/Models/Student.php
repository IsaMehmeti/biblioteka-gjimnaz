<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Student extends Model
{

    protected $fillable = ['name' , 'surname' , 'class' , 'parallel'];

	public function borrow()
	   {
	   	return $this->hasOne('App\Models\Borrow');
	   }
}
