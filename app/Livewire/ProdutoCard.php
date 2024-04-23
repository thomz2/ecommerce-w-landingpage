<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProdutoCard extends Component
{
    public $key;
    public $count;
    public $product;

    public function mount($roupa)
    {
        $this->key = $roupa->id;
        $this->product = $roupa;
        // session()->forget('carrinho'); // para debug
        if (Auth::check()) {
            
        } else {
            $carrinho = session()->get('carrinho', null);

            // Caso o componente seja renderizado e nao tenha nada no carrinho
            if (!isset($carrinho)) {
                $this->count = 0;
                return;
            }

            // Caso exista pelo menos a quantidade = 1 no produto desse card
            if (isset($carrinho[$this->product->id]))
                $this->count = $carrinho[$this->product->id]['quantidade'];
            else 
                $this->count = 0;
        }
    }

    public function incrementCount() 
    {
        $this->count++;
        if (Auth::check()) {

        } else {            
            // Obtendo o carrinho atual da sessão (ou criando um novo se não existir)
            $carrinho = session()->get('carrinho', []);
            $prod_id = $this->product->id;
            if (array_key_exists($prod_id, $carrinho)) {
                $carrinho[$prod_id]['quantidade']++;
            } else {
                $item = [
                    'nome' => $this->product->name,
                    'quantidade' => 1,
                    'preco' => floatval(intval($this->product->price))
                ];

                $carrinho[$prod_id] = $item; // Adiciona o item ao carrinho
            }
            session()->put('carrinho', $carrinho); // Salva na sessão
        }
        $this->dispatch('carrinho-increment');
    }

    public function decrementCount() 
    {
        if ($this->count > 0) {
            $this->count--;
            if (Auth::check()) {

            } else {
                $carrinho = session()->get('carrinho', null);
                if (!isset($carrinho)) return; // Erro
                
                $prod_id = $this->product->id;
                $carrinho[$prod_id]['quantidade']--;

                if ($carrinho[$prod_id]['quantidade'] == 0) {
                    unset($carrinho[$prod_id]);
                }

                session()->put('carrinho', $carrinho);
            }
            $this->dispatch('carrinho-decrement');
        }
    }

    public function render()
    {
        return view('livewire.produto-card');
    }
}
