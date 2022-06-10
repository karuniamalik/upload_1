<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\UsersExport;
use App\Models\Kategori;
use Illuminate\Contracts\Cache\Store;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;





class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $awal = $request->awal;
        $akhir = $request->akhir;

        if ($request->ajax()) {
            if (!empty($awal)) {
                $aw = $awal . ' 00:00:00';
                $ak = $akhir . ' 23:59:00';
                $data = Barang::whereBetween('created_at', [$aw, $ak])->get();
            } else {
                $data = Barang::all();
            }

            return Datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn btn-small btn-success" href="barang/' . $data->id . '/edit"><i class="fas fa-pen"></i></a> <a class="btn btn-small btn-danger" href="hapusbarang/' . $data->id . '"> <i class="fas fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('barang/tampil');
    }

    public function user()
    {
        return view('user');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        // $data = Barang::find($id);


        return view('barang/tambah', compact('kategori'));
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
        $validated = $req->validate([


            'nama_barang' => 'required',
            'spesifikasi' => 'required',
            'gambar' => 'required | image',
            'harga' => 'required',
            'stok' => 'required',
            'status' => 'required',
            'kategori_id' => 'required'

        ]);

        if ($req->file('gambar')) {

            $validated['gambar'] = $req->file('gambar')->store('img');
        }


        $data = Barang::create($validated);
        return redirect('barang')->with('success', 'Data Berhasil Masuk');
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
        $data = Barang::find($id);
        $kategori = Kategori::all();
        return view('barang/edit', compact('data', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = Barang::findOrFail($id);
        $validated = $request->validate([
            'nama_barang' => 'required',
            'spesifikasi' => 'required',
            'gambar' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'status' => 'required',
            'kategori_id' => 'required'
        ]);

        $data->update($validated);
        return redirect('barang')->with('success', 'Data Berhasil di ubah');
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
        $data = Barang::findOrFail($id);
        $data->delete();
        return redirect('barang')->with('success', 'Data Berhasil di hapus');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
