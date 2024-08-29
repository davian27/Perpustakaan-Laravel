<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Genre;
use Exception;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('author','genre')->get();
        return view ('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $authors = Author::all();
        $genres = Genre::all();
        return view('books.create',compact('authors','genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
      Book::create($request->all());
      return redirect()->route('books.index')->with('success','Book Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Book $books)
    {
        $books = Book::findorfail($id);
        $authors = Author::all();
        $genres = Genre::all();
        return view('books.edit',compact('books','genres','authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, string $id, Book $books)
    {
        $books = Book::findorfail($id);
        $books->update($request->all());
        return redirect()->route('books.index')->with('success','Book Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Book $books)
    {
        try {
            $books = Book::findorfail($id);
            $books->delete();
            return redirect()->route('books.index')->with('success','Book Deleted Successfuly');
        }

        catch (Exception $e)
        {
            return redirect()->route('books.index')->with('error','Book Tidak Bisa Di Hapus Karena Masih Terelasi Dengan Peminjaman');
        }
    }
}
