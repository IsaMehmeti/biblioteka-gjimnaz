<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Book;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Student  $students)
    {
        $students = Student::all();
        return view('nxensat.nxensat', compact('students'));
         
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        return view('nxensat.shto' , compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
             'name'=>'required|unique:authors|max:225',
            'surname'=>'required|unique:authors|max:225',
            'class'=>'required',
            'parallel'=>'required|max:18',
         ]);
        Student::create($data=$request->all());
        return redirect()->route('dashboard')->with('status', 'Nxenesi u shtua me sukses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('students.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
         $books = Book::all();
        return view('nxensat.edit' , compact(['student', 'books']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validatedData = $request->validate([
             'name'=>'required|unique:authors|max:225',
            'surname'=>'required|unique:authors|max:225',
            'class'=>'required',
            'parallel'=>'required|max:18',
         ]);
        $data = $request->all();
        Student::find($id)->update($data);
        return redirect()->route('students.index')->with('warning','Studenti u ndryshua me sukses');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // $data = $request->all();
         $student =Student::find($id);
         $student->delete();
         return redirect()->route('students.index')->with('danger','Nxenesi u fshi');
    }
}
