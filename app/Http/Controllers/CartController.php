<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Display the cart
    public function index()
    {
        $cartItems = session()->get('cart', []);
        $savedItems = session()->get('saved', []);

        // Calculate subtotal, tax, and grand total
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        $tax = $subtotal * 0.10; // 10% tax
        $grandTotal = $subtotal + $tax;

        return view('cart.index', compact('cartItems', 'savedItems', 'subtotal', 'tax', 'grandTotal'));
    }

    // Add a product to the cart
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Find the product
        $product = Product::findOrFail($request->product_id);

        // Get the current cart items from the session
        $cartItems = session()->get('cart', []);

        // Check if the product already exists in the cart
        if (isset($cartItems[$request->product_id])) {
            // Update the quantity if the product exists
            $cartItems[$request->product_id]['quantity'] += $request->quantity;
        } else {
            // Add the product to the cart if it doesn't exist
            $cartItems[$request->product_id] = [
                'id' => $product->id,
                'name' => $product->title, // Assuming 'title' is the product name field
                'quantity' => $request->quantity,
                'price' => $product->price,
                'image' => $product->image, // Assuming 'image' is the product image field
            ];
        }

        // Save the updated cart back to the session
        session()->put('cart', $cartItems);

        // Redirect to the cart index page with a success message
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    // Update the quantity of a product in the cart
    public function update(Request $request, $productId)
    {
        // Validate the request
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Get the current cart items from the session
        $cartItems = session()->get('cart', []);

        // Update the quantity if the product exists in the cart
        if (isset($cartItems[$productId])) {
            $cartItems[$productId]['quantity'] = $request->quantity;
            session()->put('cart', $cartItems);
        }

        // Redirect to the cart index page with a success message
        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    // Remove a product from the cart
    public function destroy($productId)
    {
        // Get the current cart items from the session
        $cartItems = session()->get('cart', []);

        // Remove the product from the cart if it exists
        if (isset($cartItems[$productId])) {
            unset($cartItems[$productId]);
            session()->put('cart', $cartItems);
        }

        // Redirect to the cart index page with a success message
        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }

    // Clear the entire cart
    public function clear()
    {
        // Clear the entire cart from the session
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Cart cleared!');
    }

    // Save an item for later
    public function saveForLater($productId)
    {
        $cartItems = session()->get('cart', []);
        $savedItems = session()->get('saved', []);

        if (isset($cartItems[$productId])) {
            $savedItems[$productId] = $cartItems[$productId];
            unset($cartItems[$productId]);
        }

        session()->put('cart', $cartItems);
        session()->put('saved', $savedItems);

        return redirect()->route('cart.index')->with('success', 'Item saved for later!');
    }

    // Move a saved item back to the cart
    public function moveToCart($productId)
    {
        $cartItems = session()->get('cart', []);
        $savedItems = session()->get('saved', []);

        if (isset($savedItems[$productId])) {
            $cartItems[$productId] = $savedItems[$productId];
            unset($savedItems[$productId]);
        }

        session()->put('cart', $cartItems);
        session()->put('saved', $savedItems);

        return redirect()->route('cart.index')->with('success', 'Item moved to cart!');
    }

    // Remove an item from the saved list
    public function removeSaved($productId)
    {
        $savedItems = session()->get('saved', []);

        if (isset($savedItems[$productId])) {
            unset($savedItems[$productId]);
        }

        session()->put('saved', $savedItems);

        return redirect()->route('cart.index')->with('success', 'Item removed from saved list!');
    }
}
