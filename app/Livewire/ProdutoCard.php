<?php

namespace App\Livewire;

use Livewire\Component;

class ProdutoCard extends Component
{
    public $key;
    public $count;

    public function mount($key)
    {
        $this->key = $key;
        $this->count = 0;
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
