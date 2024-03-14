<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLink;
use App\Models\Domain;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Qr_code;

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
        $DomainId = \request()->input('domain');
        $DomainName = Domain::all()->find($DomainId)->domain;
        $link->short_url = 'http://'.$DomainName.'/'.Str::random(10);
        $link->long_url = \request()->link;
        $link->is_active = 1;
        $link->user_id = auth()->user()->id;
        $link->category_id = \request()->input("category");
        $link->domain_id = \request()->input('domain');
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
    public function edit(CreateLink $request, Link $link)
    {
        //Authorization
        //Validation
        $inputs = $request->rules();

        //Save Inputs
        $DomainId = \request()->input('domain');
        $DomainName = Domain::all()->find($DomainId)->domain;
        $link->short_url = 'http://'.$DomainName.'/'.Str::random(10);
        $link->long_url = \request()->link;
        $link->is_active = 1;
        $link->user_id = auth()->user()->id;
        $link->category_id = \request()->input("category");
        $link->domain_id = \request()->input('domain');
        $link->update();

        return redirect('admin/links/all');
    }
    public function createQr(Link $link)
    {
        $qrCode = QrCode::format('svg')->size(200)->generate(\request()->link);
        $link->qrcodes->name = strval($qrCode);
        $link->update();
        return $link->qrcodes()->name;


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Link $link)
    {
        return view('admin.EditLink',['link'=>$link]);
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
