<?php

namespace App\Http\Controllers;

use App\Http\Middleware\user;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Transaction;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Js;

class PaymentController extends Controller
{
    //

    public function cekoutTrue(Request $request)
    {
        if ($request->code == 200) {
            $data = Transaksi::where('order_id', '=', $request->result);
            $data->update([
                'status' => 'sukses'
            ]);
        } else if ($request->code == 401) {
            $data = Transaksi::where('order_id', '=', $request->result);
            $data->update([
                'status' => 'gagal'
            ]);
        }

        CartFacade::clear();


        return json_encode($request->result);
        // dd($request);

        // if ($request->result == 200) {
        //     return json_encode($data);
        // }
    }

    public function view_transaksi()
    {
        if (Auth::user()->id == 1) {
            $data = Transaksi::all();
            return view('transaksi', compact("data"));
        }
        $data = Transaksi::where('user_id', '=', Auth::user()->id)->get();
        return view('transaksi', compact("data"));
        // return view('transaksi', compact("data"));
    }

    public function Payment(Request $request)
    {
        // return json_encode(['snap' => $request->all()]);
        // return $request->total;
        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;

        $order_id =  rand();

        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => $request->total,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => '08111222333',
            ),
            'enabled_payments' => [
                'bank_transfer', 'gopay', 'indomaret', 'shopeepay'
            ]
        );
        $snapToken = Snap::getSnapToken($params);

        $dataTransaksi = Transaksi::create([
            'user_id' => Auth::user()->id,
            'order_id' => $order_id,
            'nama_barang' => $request->nama_barang[0],
            'harga' => $request->harga[0],
            'qty' => $request->qty[0],
            'date' => date("Y-m-d"),
            'status' => 'pending',
        ]);
        // return $dataTransaksi;


        // return view('front.payment', ['snap_token' => $snapToken]);
        // CartFacade::clear();

        return json_encode(['snap' => $snapToken, 'order_id' => $order_id]);
    }
    // 'data' => $dataTransaksi
    public function Cek()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        // Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        // Config::$is3ds = true;

        $notif = new \Midtrans\Notification();
        dd($notif->getResponse());

        // $transaction = $notif->transaction_status;
        // $type = $notif->payment_type;
        // $order_id = $notif->order_id;

        // $fraud = $notif->fraud_status;

        // if ($transaction == 'capture') {
        //     // For credit card transaction, we need to check whether transaction is challenge by FDS or not
        //     if ($type == 'credit_card') {
        //         if ($fraud == 'challenge') {
        //             // TODO set payment status in merchant's database to 'Challenge by FDS'
        //             // TODO merchant should decide whether this transaction is authorized or not in MAP
        //             echo "Transaction order_id: " . $order_id . " is challenged by FDS";
        //         } else {
        //             // TODO set payment status in merchant's database to 'Success'
        //             echo "Transaction order_id: " . $order_id . " successfully captured using " . $type;
        //         }
        //     }
        // } else if ($transaction == 'settlement') {
        //     // TODO set payment status in merchant's database to 'Settlement'
        //     echo "Transaction order_id: " . $order_id . " successfully transfered using " . $type;
        // } else if ($transaction == 'pending') {
        //     // TODO set payment status in merchant's database to 'Pending'
        //     echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
        // } else if ($transaction == 'deny') {
        //     // TODO set payment status in merchant's database to 'Denied'
        //     echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        // } else if ($transaction == 'expire') {
        //     // TODO set payment status in merchant's database to 'expire'
        //     echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
        // } else if ($transaction == 'cancel') {
        //     // TODO set payment status in merchant's database to 'Denied'
        //     echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
        // }
    }
}
