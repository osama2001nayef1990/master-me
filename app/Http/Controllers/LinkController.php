<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLink;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateLink $request)
    {
        //Authorization
        //Validation
        $inputs = $request->rules();

        //Save Inputs
        $link = new Link();
        $link->short_url = 'http://www.iquick.link/'.Str::random(10);
        $link->long_url = \request()->link;
        $link->is_active = 1;
        $link->user_id = auth()->user()->id;
        $link->category_id = 1;
        $link->domain_id = 1;
        $link->save();

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
    public function destroy(Link $link)
    {
        //
        $link->delete();
        session()->flash('delete');
        return back();
    }
}
