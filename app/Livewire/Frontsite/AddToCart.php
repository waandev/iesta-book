<?php

namespace App\Livewire\Frontsite;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route; // Pastikan ini ada
use Livewire\Component;

class AddToCart extends Component
{
    public $middleware = ['auth'];

    public $publicationId;

    public function addToCart()
    {
        if (!Auth::check()) {
            // Redirect ke halaman login jika belum login
            return redirect()->route('login');
        }

        // Retrieve the publication
        $publication = Publication::find($this->publicationId);

        if (!$publication || $publication->stock <= 0) {
            toast('Publication stock is not available', 'error');
            return redirect()->route('publication.index');;
        }

        // Get or create the cart for the user
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::user()->id,
        ]);

        // Check if the item already exists in the cart
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('publication_id', $publication->id)
            ->first();

        if ($cartItem) {
            if ($cartItem->quantity < $publication->stock) {
                $cartItem->quantity++;
                $cartItem->save();
            } else {
                toast('Quantity exceeds available stock!', 'error');
                return redirect()->route('publication.index');
            }
        } else {
            // If it doesn't exist, create a new cart item
            $cartItem = new CartItem();
            $cartItem->cart_id = $cart->id;
            $cartItem->publication_id = $publication->id;
            $cartItem->quantity = 1;
            $cartItem->save();
        }

        // Update total price in the cart
        $cart->total_price = $cart->cartItem->sum(function ($item) {
            return $item->quantity * $item->publication->price;
        });
        $cart->save();

        $this->dispatch('cartUpdated');

        toast('Publication added to cart successfully!', 'success');
        return redirect()->route('publication.index');
    }

    public function render()
    {
        return view('livewire.frontsite.add-to-cart');
    }
}
