<?php

namespace App\Http\Controllers\Backsite\Customer;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Log;

class CartController extends Controller
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = Auth::user()->cart->cartItem()->with('publication')->get();

        // Kirim data ke view
        return view('pages.backsite.customer.cart.index', compact('cartItems'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cartItem = Auth::user()->cart->cartItem()->findOrFail($id);
        $cartItem->forceDelete();

        toast('Item removed from cart', 'success');
        return redirect()->route('customer.cart.index');
    }

    public function showShipment(Request $request)
    {
        $selectedItems = $request->session()->get('selected_cart_items', []);

        return view('pages.backsite.customer.cart.shipment', ['items' => $selectedItems]);
    }
}
