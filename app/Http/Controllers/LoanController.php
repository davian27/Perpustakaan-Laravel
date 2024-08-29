<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Member;
use App\Models\Loan;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::with(['books', 'members'])->get();
        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        $members = Member::all();
        return view('loans.create', compact('books', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $request, Book $books)
    {
        $books = Book::findorfail($request->book_id);
        if ($books->status === 'Dipinjam') {
            return redirect()->back()->with('error', 'Buku ini masih dipinjam orang lain');
        }
        Loan::create($request->all());
        $books->update(['status' => 'Dipinjam']);

        return redirect()->route('loans.index')->with('success', 'Loans Successfully Created');
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
    public function edit(string $id, Loan $loans)
    {
        $books = Book::all();
        $members = Member::all();
        $loans = Loan::findorfail($id);
        return view('loans.edit', compact('loans', 'books', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanRequest $request, string $id)
    {
        // Temukan data peminjaman berdasarkan ID
        $loan = Loan::findOrFail($id);

        // Temukan data buku berdasarkan ID dari request
        $book = Book::findOrFail($request->book_id);

        // Cek status peminjaman
        if ($loan->status === 'Dikembalikan' && $request->status !== 'Dikembalikan') {
            // Jika peminjaman sudah dikembalikan dan status baru bukan 'Dikembalikan', perbarui status buku
            if ($book->status === 'Dipinjam') {
                return redirect()->back()->with('error', 'Buku ini masih dipinjam orang lain');
            }
        } elseif ($loan->status !== 'Dikembalikan' && $request->status === 'Dikembalikan') {
            // Jika peminjaman belum dikembalikan dan status baru adalah 'Dikembalikan'
            // Pastikan buku tidak sedang dipinjam
            $book->update(['status' => 'Tersedia']);
        }

        // Update data peminjaman
        $loan->update($request->all());

        // Jika status baru adalah 'Dipinjam', perbarui status buku menjadi 'Dipinjam'
        if ($request->status === 'Dipinjam') {
            $book->update(['status' => 'Dipinjam']);
        }

        return redirect()->route('loans.index')->with('success', 'Data Peminjaman Berhasil Di Update');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loans = Loan::findorfail($id);
        $books = Book::findorfail($loans->book_id);
        if($books->status === 'Dipinjam')
        {
            return redirect()->back()->with('error','Anggota ini masih memiliki buku yang di pinjam');
        }
        $books->update(['status' => 'Tersedia']);
        $loans->delete();
        return redirect()->route('loans.index')->with('success', 'Peminjaman Deleted Successfuly');
    }
}
