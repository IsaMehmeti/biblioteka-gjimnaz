<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use App\Http\Requests\BookStore;
use App\Http\Requests\BookUpdate;



class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Book $books)
    {
        $books = Book::all();
        return view('librat.librat',compact('books'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $authors = Author::all();
        return view('librat.shto' , compact(['categories' , 'authors']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStore $request)
    {
        $books = Book::create($data=$request->all());
        $books->author()->attach($request->author_id);
        return redirect()->route('dashboard')->with('status', 'Libri u shtua me sukses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return redirect()->route('books.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
         $book = Book::find($id);
         $categories = Category::all();
         $authors = Author::all();
        return view('librat.edito' , compact(['book' , 'categories' , 'authors']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function update(BookUpdate $request, $id)
    {
         $data = $request->all();
        Book::find($id)->update($data);
        return redirect()->route('books.index')->with('warning','Libri u ndryshua me sukses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student =Book::find($id);
         $student->delete();
         return redirect()->route('books.index')->with('danger','Libri u fshi');
    }
}
