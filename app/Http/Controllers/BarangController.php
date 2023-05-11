<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Exports\UsersExport;
use App\Models\DetailsKategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Translation\Util\ArrayConverter;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $awal = $request->awal;
        $akhir = $request->akhir;

        if ($request->ajax()) {
            if (!empty($awal)) {
                $aw = $awal . ' 00:00:00';
                $ak = $akhir . ' 23:59:00';
                $data = Barang::whereBetween('created_at', [$aw, $ak])->get();
                // $data['gambar'] = "asset('storage/'. $data->gambar)";
            } else {
                $data = Barang::select('barang.id', 'barang.nama_barang', 'barang.spesifikasi', 'barang.gambar', 'barang.harga', 'barang.stok', 'barang.status', 'barang.created_at')->get();
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
            'kategori' => 'required',
        ]);

        if ($req->file('gambar')) {

            $validated['gambar'] = $req->file('gambar')->store('img');
        }

        if ($req->kategori) {
            $data = Barang::create($validated);

            // masuk 2 record dalam tabel
            foreach ($req->kategori as $ktg) {
                $dataDetailKategori = DetailsKategori::create([
                    'barang_id' => $data->id,
                    'kategori_id' => $ktg,
                ]);
            }
        }
        // else {
        //     return redirect('barang/create');
        // }


        // dd($GetIdBarangKategori);
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

        $dataDetailKategori = DetailsKategori::where('barang_id', '=', $id)->get();

        // dd($dataDetailKategori);
        return view('barang/edit', compact('data', 'kategori', 'dataDetailKategori'));
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
        // dd($req);
        $data = Barang::findOrFail($id);

        $dataDetailKategori = DetailsKategori::where('barang_id', '=', $id)->get();

        // dd($dataDetailKategori[0]->kategori_id);
        $validated = $req->validate([
            'nama_barang' => 'required',
            'spesifikasi' => 'required',
            // 'gambar' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'status' => 'required',
            'kategori' => 'required'
        ]);
        // jika ada gambar yg di upload
        if ($req->file('gambar')) {
            Storage::delete($data->gambar);
            $validated['gambar'] = $req->file('gambar')->store('img');
        } else {
            // jika tidak ada gambar
            $validated['gambar'] = $data->gambar;
        }

        // dd($req->kategori);
        // dd($req);

        // if ($req->kategori) {
        //     foreach ($req->kategori as $kategori2) {
        //         echo $kategori2 . '<br>';
        //         foreach ($dataDetailKategori as $d_ktgr) {
        //             echo 'ini kategori id' .
        //                 $d_ktgr->kategori_id  . '<br>';
        //             if ($kategori2 == $d_ktgr->kategori_id) {
        //                 echo "ada dan di biarkan<br> ";
        //             } else if ($kategori2 != $d_ktgr->kategori_id) {
        //                 echo "gk ada dan di tambah<br>";
        //             } else if (!$kategori2 == $d_ktgr->kategori_id) {
        //                 echo "klo gk di pake di hapus<br>";
        //             }
        //         }
        //     }
        // $dataDetailsKategori = DetailsKategori::where('barang_id', '=', $id)->where('kategori_id', '=', $kategori2)->get();
        // $data->update($validated);
        // $dataDetailsKategori->updated($req->kategori2);
        // }
        // die();

        $dataDetailKategoriCek =
            DetailsKategori::where('barang_id', '=', $id)->get();
        foreach ($dataDetailKategori as $d_ktgr) {


            if ($req->kategori) {
                foreach ($req->kategori as $kategori2) {
                    dd($kategori2);
                    if (in_array("$d_ktgr->kategori_id", $dataDetailKategoriCek)) {
                        echo "Match found";
                    } else {
                        echo "Match not found";
                    }
                }
            }
        }
        die();

        // else {
        //     return redirect("barang/$id/edit");
        // }
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
