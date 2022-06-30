<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;


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
        return redirect('/');
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
                'quantity' => $request->quantity
            ]
        );
    }
}
