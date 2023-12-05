<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailsKategori;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Barang::paginate(3)->withQueryString();
        $kategori = Kategori::where('status', '=', 'on')->get();

        return view('front.welcome', compact('data', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = DetailsKategori::where('kategori_id', $id)->paginate(3);

        return view('front.welcome', compact('data', 'id'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // $data = DB::select("SELECT * FROM details_kategori 
        // JOIN barang ON details_kategori.barang_id = barang.id
        // WHERE kategori_id IN (3,4)
        // GROUP BY nama_barang");

        // dd($data);
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
    }
    public function ceklist(Request $request)
    {
        //
        if (!empty($request->id)) {
            $arr = collect($request->id)->implode(',');

            $data = DB::select("SELECT * FROM details_kategori 
            JOIN barang ON details_kategori.barang_id = barang.id
            WHERE kategori_id IN ($arr)
            GROUP BY nama_barang");
        } else {
            $data = DetailsKategori::join('barang', 'barang.id', '=', 'details_kategori.barang_id')->groupBy('nama_barang')->get();
        }
        return json_encode($data);
    }
}
