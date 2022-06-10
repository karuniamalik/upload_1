<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->jabatan == 'admin') {
            return redirect('barang');
        } else if (Auth::user()->jabatan == 'user') {
            return redirect('user');
        }
    }
}
//     // public function admin()
//     // {
//     //     return view('template');
//     // }
//     public function user()
//     {
//         return view('user');
//     }
// }
