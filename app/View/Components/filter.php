<?php

namespace App\View\Components;

use App\Models\Kategori;
use Illuminate\View\Component;

class filter extends Component
{
    protected $jenis;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($jenis)
    {
        $this->jenis = $jenis;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $kategori = Kategori::where('status', '=', 'on')->where('jenis_kategori', '=', $this->jenis)->get();
        $jenis = str_replace(' ', '', $this->jenis);
        return view('components.filter', compact('kategori', 'jenis'));
    }
}
