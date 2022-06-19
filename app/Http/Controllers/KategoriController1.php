<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Routing\Controller;
use App\Models\Kategori;

class KategoriController extends Controller
{
    //
    public function index()
    {

        return view('kategori/tampil');
    }

    public function create()
    {
        //
        $kategori = Kategori::all();
        // $data = Barang::find($id);
        return view('kategori/tambah', compact('kategori'));
    }

    public function store(Request $req)
    {
        //
        $validated = $req->validate([

            'kategori' => 'required',
            'status' => 'required',

        ]);

        $data = Kategori::create($validated);
        return redirect('kategori')->with('success', 'Data Berhasil Masuk');
    }
}
