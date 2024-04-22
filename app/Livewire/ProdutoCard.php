<?php

namespace App\Livewire;

use Livewire\Component;

class ProdutoCard extends Component
{
    public $key;
    public $count;
    public $product;

    public function mount($roupa)
    {
        $this->key = $roupa->id;
        $this->count = 0;
        $this->product = $roupa;
    }

    public function incrementCount() 
    {
        $this->count++;
    }

    public function decrementCount() 
    {
        if ($this->count > 0) {
            $this->count--;
        }
    }

    public function render()
    {
        return view('livewire.produto-card');
    }
}
