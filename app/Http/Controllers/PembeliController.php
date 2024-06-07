<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembeli;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PembeliController extends Controller
{
    //
    public function index()
    {
        return view('pembeli.index', [
            "title" => "Pembeli",
            "data" => Pembeli::all()
        ]);
    }    
    public function create():View
    {
        return view('pembeli.index')->with(["title" => "Tambah Data Pembeli"]);
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
        ]);
        if (empty($request['hp'])) {
            $request['hp']='null';
        if (empty($request['alamat'])) 
            $request['alamat']='null';
        }

        Pembeli::create($request->all());
        return redirect()->route('pembeli.index')->with('success','Data Pembeli Berhasil Ditambahkan');
    }

    public function edit(Pembeli $pembeli):View
    {
        return view('pembeli.editpembeli',compact('pembeli'))->with([
            "title" => "Ubah Data Pembeli",
        ]);
    }
    public function update(Pembeli $pembeli, Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
        ]);
        if (empty($request['hp'])) {
            $request['hp']='null';
        if (empty($request['alamat'])) 
            $request['alamat']='null';
        }

        $pembeli->update($request->all());
        return redirect()->route('pembeli.index')->with('updated','Data Pembeli Berhasil Diubah');
    }
public function show(pembeli $pembeli):view
{
    return view('pembeli.tampil',compact('pembeli'))->with(["title"=>"Data Pembeli"]);
}
}