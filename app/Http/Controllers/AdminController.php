<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLink;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    public function newLink()
    {
        return view('admin.shortlink');
    }
    public function category()
    {
        return view('admin.category');
    }
    public function users()
    {
        return view('admin.users');
    }
    public function links()
    {
        return view('admin.all-links');
    }
    public function block(User $user)
    {
        $user->is_active = 0;
        $user->update();
        return back();
    }
    public function activate(User $user)
    {
        $user->is_active = 1;
        $user->update();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
