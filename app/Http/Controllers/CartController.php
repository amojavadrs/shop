<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Menu;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);
        return view('cart.index', compact('cartItems'));
    }

    public function store(Request $request)
    {
return redirect()->route('firstpage');
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $cartItems = session()->get('cart', []);

        if(isset($cartItems[$request->product_id])) {
            $cartItems[$request->product_id]['quantity'] += $request->quantity;
        } else {
            $cartItems[$request->product_id] = [
                'id' => $product->id,
                'name' => $product->name,
                'quantity' => $request->quantity,
                'price' => $product->price,
                // Add other product attributes as needed (e.g., image, options)
            ];
        }

        session()->put('cart', $cartItems);

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItems = session()->get('cart', []);

        if(isset($cartItems[$productId])) {
            $cartItems[$productId]['quantity'] = $request->quantity;
            session()->put('cart', $cartItems);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function destroy($productId)
    {
        $cartItems = session()->get('cart', []);

        if(isset($cartItems[$productId])) {
            unset($cartItems[$productId]);
            session()->put('cart', $cartItems);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Cart cleared!');
    }
}
