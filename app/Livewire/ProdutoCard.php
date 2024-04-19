<?php

namespace App\Livewire;

use Livewire\Component;

class ProdutoCard extends Component
{
    public $key;

    public function mount($key)
    {
        $this->key = $key;
    }

    public function render()
    {
        return view('livewire.produto-card');
    }
}
