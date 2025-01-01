@extends('layouts.app')
@section('content')
    <h1>Shopping Cart</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (count($cartItems) > 0)
        <table class="table">
            <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cartItems as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>
                        <form method="POST" action="{{ route('cart.update', $item['id']) }}">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </form>
                    </td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['price'] * $item['quantity'] }}</td>
                    <td>
                        <form method="POST" action="{{ route('cart.destroy', $item['id']) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
    @else
        <p>Your cart is empty.</p>
    @endif

@endsection
