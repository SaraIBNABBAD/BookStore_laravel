<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function displaybook()
    {
        $book = Book::all();
        return view('welcome', ['books' => $book]);
    }
    public function showonebook($id)
    {
        $book=Book::find($id);
        return view('onebook',['book'=>$book]);
        
    }
}
