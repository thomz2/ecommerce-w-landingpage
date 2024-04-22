<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Roupas extends Component
{
    public function render()
    {
        return view('livewire.roupas', [
            "roupas" => Product::all()
        ]);
    }
}
