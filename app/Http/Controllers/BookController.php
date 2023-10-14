<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $results = Book::where('title', 'like', "%$query%")
            ->orWhere('author', 'like', "%$query%")
            ->get();

        return $results;
    }
}
