<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\Student;
use App\Http\Requests\BorrowStore;
use App\Http\Requests\BorrowUpdate;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrows = Borrow::where('status', 0)->get();
        return view('huazimet.index', compact('borrows'));
    }

    public function archive()
    {
         $borrows = Borrow::where('status', '1')->get();
         return view('huazimet.archive', compact('borrows'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        $students = Student::all();
        return view('huazimet.shto' , compact('books', 'students'));
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
            'book_id' => 'required',
            'date' => 'required|after:today',
         ]);
         Borrow::create($data=$request->all());
        return redirect()->route('dashboard')->with('status', 'Nxenesi huazoi me sukses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('borrows.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $borrow = Borrow::find($id);
         $books = Book::all();
         $students = Student::all();
        return view('huazimet.edit' , compact(['borrow', 'books', 'students']));
    }
    public function active(Request $request, $id, $type)
    {
        $dt = Carbon::now();
        $dt->timezone('CET');
        $borrow = Borrow::find($id);
        $borrow->status = $type;
        $borrow->deadline = $borrow->date;
        $borrow->date = $dt->isoFormat('YYYY-MM-DD HH:mm:ss');
        $borrow->update();
        return redirect()->back();
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
            'book_id' => 'required',
            'date' => 'required|after:today',
         ]);
        $data = $request->all();
        Borrow::find($id)->update($data);
        return redirect()->route('borrows.index')->with('warning','Huazimi i studentit u ndryshua me sukses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $student =Borrow::find($id);
         $student->delete();
         return redirect()->back();
    }

}
