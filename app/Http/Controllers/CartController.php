<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\False_;
use PhpParser\Node\Name\Relative;

class CartController extends Controller
{
    //
    public function tambah_keranjang(Request $request)
    {
        // dd($request);
        CartFacade::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            ),
        ));
        return redirect('/')->with('success', 'Data Berhasil ditambah');
    }


    public function detail_keranjang()
    {
        $data = CartFacade::getContent();
        return view('front.keranjang', compact('data'));
    }

    public function clearAll()
    {
        CartFacade::clear();
    }

    public function update_keranjang(Request $request)
    {
        CartFacade::update(
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

        CartFacade::remove($request->id);
        return redirect('/detail_keranjang')->with('success', 'Data Berhasil dihapus');
    }
}
