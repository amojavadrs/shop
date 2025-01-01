@extends('layout')

@section('content')
    <h1>Your Shopping Cart</h1>
    @if(session('cart'))
        <ul>
            @foreach(session('cart') as $item)
                <li>{{ $item['name'] }} - ${{ $item['price'] }}
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                        <button type="submit">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('cart.clear') }}">Clear Cart</a>
    @else
        <p>Your cart is empty.</p>
    @endif
@endsection
