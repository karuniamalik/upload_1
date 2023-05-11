<?php

namespace App\View\Components;

use App\Models\Kategori as ModelsKategori;
use Illuminate\View\Component;

class Kategori extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $kategori = ModelsKategori::where('status', '=', 'on')->get();
        return view('components.kategori', compact('kategori'));
    }
}
