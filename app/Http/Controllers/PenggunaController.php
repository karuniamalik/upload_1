<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $data = User::all();
        return view('pengguna/tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $data = User::all();
        // $data = Barang::find($id);


        // return view('pengguna/tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        // $validated = $req->validate([


        //     'name' => 'required',
        //     'email' => 'required',
        //     'jabatan' => 'required',

        // ]);

        // $data = User::create($validated);
        // return redirect('pengguna')->with('success', 'Data Berhasil Masuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = User::find($id);

        // $kategori = Kategori::all();


        return view('pengguna/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $data = User::findOrFail($id);
        $validated = $req->validate([
            'name' => 'required',
            'email' => 'required',
            'jabatan' => 'required'

        ]);



        $data->update($validated);
        return redirect('pengguna')->with('success', 'Data Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = User::findOrFail($id);
        $data->delete();
        return redirect('pengguna')->with('success', 'Data Berhasil di hapus');
    }
}
