<?php

namespace App\Listeners;

use App\Models\Cart;
use App\Models\ProductInCart;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserLoggedInListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;
        \Log::info("Usuário {$user->name} fez login");

        $carrinhoSessao = session()->get('carrinho');

        // Acha um carrinho existente para o usuario ou cria um novo
        $carrinhoDB = Cart::where('user_id', '=', $user->id)->first();
        if (!isset($carrinhoDB)) {
            \Log::info("Usuário {$user->name} nao tinha carrinho");
            $carrinhoDB = Cart::create([
                "user_id" => $user->id
            ]);
        } 
        else \Log::info("Usuário {$user->name} ja tem carrinho!");

        if (!isset($carrinhoSessao)) return; // nao precisa adicionar nada

        // Logica de adicionar coisas no carrinho
        foreach($carrinhoSessao as $product_id => $item) {

            $produto_no_carrinho = ProductInCart::where('product_id', '=', $product_id)
                                                ->where('cart_id', '=', $carrinhoDB->id)
                                                ->first();

            if (!isset($produto_no_carrinho)) {
                \Log::info("Produto {$item['nome']} nao estava no carrinho do DB");
                $produto_no_carrinho = ProductInCart::create([
                    "product_id" => $product_id,
                    "cart_id" => $carrinhoDB->id,
                    "quantity" => 0 // $item['quantidade']
                ]);
            }

            $produto_no_carrinho->quantity += $item['quantidade'];
            $produto_no_carrinho->save(); 

        }

        session()->forget('carrinho');
    }
}
