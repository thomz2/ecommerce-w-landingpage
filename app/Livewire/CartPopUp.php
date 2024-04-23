<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CartPopUp extends Component
{
    public $count;

    public function mount()
    {
        if (Auth::check()) {
        
        } else {
            $carrinho = session()->get('carrinho', null);
            if (!isset($carrinho)) {
                $this->count = 0;
            } else {
                $sum = 0;
                foreach ($carrinho as $item) {
                    $sum += $item['quantidade'];
                }
                $this->count = $sum;
            }
        }
    }

    #[On('carrinho-increment')] 
    public function increment()
    {
        $this->count++;
    }

    #[On('carrinho-decrement')] 
    public function decrement()
    {
        if ($this->count > 0) {
            $this->count--;
        } 
    }

    public function render()
    {
        return view('livewire.cart-pop-up');
    }
}
