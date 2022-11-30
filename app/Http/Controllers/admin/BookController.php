<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $books=Book::paginate(5);
         return view('admin.book.booklist',['books'=>$books]);
         
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.bookform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=> 'required | string',
            'author'=> 'required | string',
            'description'=> 'string',
            'editionDate'=> 'date',

        ]);

        $validated['user_id']=Auth::user()->id;

        if($request->hasFile('picture')){
            $file=$request->file('picture');
            $fileName='imgbook_'.$validated['title'].'.'.$file->getClientOriginalExtension();
            $image=$request->file('picture')->storeAs('imgs/books',$fileName,'public');
            $validated['picture']='storage/'.$image;
        }

        
        if($request->hasFile('filepath')){
            $file=$request->file('filepath');
            $fileName='file'.$validated['title'].'.'.$file->getClientOriginalExtension();
            $pdf=$request->file('filepath')->storeAs('filePDF/books',$fileName,'public');
            $validated['filepath']='storage/'.$pdf;
        }
        $book=Book::create($validated);
        if(isset($book)){
            return redirect()->route('books.index')->with('success','Book added with success');
        }
        return back()->with('error','Book not inserted');
        
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=Book::find($id);
        return view('admin.book.bookupdate',['book'=>$book]);
            
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
        $oldBook=Book::find($id);
        $validated = $request->validate([
            'title'=> 'required | string',
            'author'=> 'required | string',
            'description'=> 'string',
            'editionDate'=> 'date',

        ]);
        $oldBook->title=$validated['title'];
        $oldBook->author=$validated['author'];
        $oldBook->description=$validated['description'];
        $oldBook->editionDate=$validated['editionDate'];
        $oldBook->user_id=Auth::user()->id;
        

        if($request->hasFile('picture')){
            $file=$request->file('picture');
            $fileName='imgbook_'.$validated['title'].'.'.$file->getClientOriginalExtension();
            $image=$request->file('picture')->storeAs('imgs/books',$fileName,'public');
            $oldBook->picture='storage/'.$image;
        }

        
        if($request->hasFile('filepath')){
            $file=$request->file('filepath');
            $fileName='file'.$validated['title'].'.'.$file->getClientOriginalExtension();
            $pdf=$request->file('filepath')->storeAs('filePDF/books',$fileName,'public');
            $oldBook->filepath='storage/'.$pdf;
        }
        
        if($oldBook->save()){
            return redirect()->route('books.index')->with('success','Book is updated');
        }
        return back()->with('error','Book not updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $book=Book::find($id);
       if($book->delete()){
        return redirect()->route('books.index')->with('success','Book is deleted');
       }else{
        return back()->with('error', 'Book not deleted');
       }
    }
}
