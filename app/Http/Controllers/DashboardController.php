<?php

namespace App\Http\Controllers;
use App\Models\Author;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\Category;
use App\Models\Student;




use Illuminate\Http\Request;

class DashboardController extends Controller
{

	

    public function index()
    {
    	
    	return view('dashboard', [
    		'authors_count' => Author::count(),
    		'books_count' => Book::count(),
    		'borrows_count'=> Borrow::count(),
            'categories'=> Category::all(),
            'authors'=> Author::all(),
            'students'=> Student::all(),
            'books'=> Book::all(),
            'borrows'=> Borrow::where('status', 0)->orderBy('date' , 'asc')->take(5)->get(),
    	]);
    	
    	
    }

    


}
