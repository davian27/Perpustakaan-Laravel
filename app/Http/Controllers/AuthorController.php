<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\Request;
use App\Models\Author;
use Exception;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('authors.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        Author::create($request->all());
        return redirect()->route('authors.index')->with('success','Author Created Successfully');
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
    public function edit(string $id)
    {
        $authors = Author::findorfail($id);
        return view('authors.edit',compact('authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, string $id,Author $authors)
    {
        $authors = Author::findorfail($id);
        $authors->update($request->all());
        return redirect()->route('authors.index')->with('success','Author Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,Author $authors)
    {
        try {
            $authors = Author::findorfail($id);
            $authors->delete();
            return redirect()->route('authors.index')->with('success','Author Successfully Deleted');
        }
        catch (Exception $e){
            return redirect()->route('authors.index')->with('error','Author Tidak Dapat Di Hapus Karena Masih Terhubung Buku ');
        }
    }
}

