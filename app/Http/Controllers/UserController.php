<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
	    return view('users.all', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        // DO NOT USE.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // DO NOT USE.
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // DO NOT USE.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // DO NOT USE.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // DO NOT USE.
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'The User Deleted Successfully!');
    }
}
