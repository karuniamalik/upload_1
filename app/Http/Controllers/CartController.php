<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\False_;
use PhpParser\Node\Name\Relative;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function tambah_keranjang(Request $request)
    {
        // $userId = auth()->user()->id;
        // session(Auth::user()->id)->
        if (Auth::user()) {
            CartFacade::session(Auth::user()->id)->add([
                'id' => $request->id,
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'attributes' => array('image' => $request->image)
            ]);
        } else {
            CartFacade::add([
                'id' => $request->id,
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'attributes' => array('image' => $request->image)
            ]);
        }
        // dd(Auth::user()->id);
        // $keranjang = Keranjang::whereName($request->name)->get();

        // if ($keranjang) {
        //     // $tambah = $keranjang->quantity + $request->quantity;
        //     dd($keranjang);
        //     $keranjang->update([
        //         'name' => $request->name,
        //         'price' => $request->price,
        //         'quantity' => $request->quantity,
        //         'gambar' => $request->image,
        //         'user_id' => Auth::user()->id,
        //     ]);
        //     // dd($keranjang);
        // } else {
        //     Keranjang::create([
        //         'name' => $request->name,
        //         'price' => $request->price,
        //         'quantity' => $request->quantity,
        //         'gambar' => $request->image,
        //         'user_id' => Auth::user()->id,
        //     ]);
        // }
        // dd(Auth::user()->id);
        return redirect('/')->with('success', 'Data Berhasil ditambah');
    }


    public function detail_keranjang()
    {
        // $data = Keranjang::all();
        if (Auth::user()) {
            $data = CartFacade::session(Auth::user()->id)->getContent();
        } else {
            $data = CartFacade::getContent();
        }
        return view('front.keranjang', compact('data'));
    }

    public function clearAll()
    {
        CartFacade::clear();
    }

    public function update_keranjang(Request $request)
    {
        CartFacade::session(Auth::user()->id)->update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ]
            ]

        );

        return redirect('/detail_keranjang')->with('success', 'Data Berhasil diupdate');
    }
    public function delete(Request $request)
    {

        CartFacade::session(Auth::user()->id)->remove($request->id);
        return redirect('/detail_keranjang')->with('success', 'Data Berhasil dihapus');
    }
}
