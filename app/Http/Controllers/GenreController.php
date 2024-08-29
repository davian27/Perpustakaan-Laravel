<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use Exception;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index',compact('genres'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Genre $genres)
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request, Genre $genres)
    {
        Genre::create($request->all());

        return redirect()->route('genres.index')->with('success', 'Genre created successfully.');
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
    public function edit(string $id,Genre $genres)
    {
        $genres = Genre::findorfail($id);
        return view('genres.edit',compact('genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, string $id , Genre $genres)
    {
        $genres = Genre::findorfail($id);
        $genres->update($request->all());
        return redirect()->route('genres.index')->with('success', 'Genre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Genre $genres)
    {
        try {
        $genres = Genre::findorfail($id);
        $genres->delete();
        return redirect()->route('genres.index')->with('success','Genre Successfully Deleted');
        }

        catch (Exception $e){
            return redirect()->route('genres.index')->with('error','Genre Tidak Bisa Di Hapus Karena Masih Terelasi Dengan Buku');
        }
    }
}
