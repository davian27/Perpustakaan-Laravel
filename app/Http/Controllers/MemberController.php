<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Http\Request;
use App\Models\Member;
use Exception;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('members.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        Member::create($request->validated());
        return redirect()->route('members.index')->with('success','Members Successfully Created');
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
        $members = Member::findorfail($id);
        return view('members.edit',compact('members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, string $id,Member $members)
    {
        // dd($request->all());
        $members = Member::findorfail($id);
        $members->update($request->all());
        return redirect()->route('members.index')->with('success','Member Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       try{
        $members = Member::findorfail($id);
        $members->delete();
        return redirect()->route('members.index')->with('success','Member Successfuly Deleted');
       }

       catch (Exception)
       {
        return redirect()->route('members.index')->with('error','Member Tidak Bisa Di Hapus Karena Terhubung Peminjaman');
       }
    }
}
