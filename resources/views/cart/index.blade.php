<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - MyShop</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h1 class="mb-4">Shopping Cart</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Cart Summary -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Cart Summary</h5>
            <p class="card-text">
                Total Items: {{ count($cartItems) }}<br>
                Subtotal: ${{ number_format($subtotal, 2) }}<br>
                Tax (10%): ${{ number_format($tax, 2) }}<br>
                Grand Total: ${{ number_format($grandTotal, 2) }}
            </p>
        </div>
    </div>

    <!-- Cart Items -->
    @if (count($cartItems) > 0)
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Image</th>
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
                    <td>
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" style="width: 50px; height: auto;">
                    </td>
                    <td>{{ $item['name'] }}</td>
                    <td>
                        <!-- Update Quantity Form -->
                        <form method="POST" action="{{ route('cart.update', $item['id']) }}" class="d-inline">
                            @csrf
                            @method('PUT')
                            <div class="input-group" style="max-width: 150px;">
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </form>
                    </td>
                    <td>${{ number_format($item['price'], 2) }}</td>
                    <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                    <td>
                        <!-- Remove Item Form -->
                        <form method="POST" action="{{ route('cart.destroy', $item['id']) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                        <!-- Save for Later Form -->
                        <form method="POST" action="{{ route('cart.saveForLater', $item['id']) }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">Save for Later</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Cart Actions -->
        <div class="d-flex justify-content-between align-items-center mt-3">
            <a href="{{ route('firstpage') }}" class="btn btn-outline-secondary">Continue Shopping</a>
            <div>
                <form method="POST" action="{{ route('cart.clear') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Clear Cart</button>
                </form>
                <a href="{{ route('checkout') }}" class="btn btn-success">Proceed to Checkout</a>
            </div>
        </div>
    @else
        <!-- Empty Cart Message -->
        <div class="alert alert-info">
            Your cart is empty. <a href="{{ route('firstpage') }}" class="alert-link">Continue shopping</a>.
        </div>
    @endif

    <!-- Saved for Later Section -->
    @if (count($savedItems) > 0)
        <h3 class="mt-5">Saved for Later</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($savedItems as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>${{ number_format($item['price'], 2) }}</td>
                    <td>
                        <form method="POST" action="{{ route('cart.moveToCart', $item['id']) }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Move to Cart</button>
                        </form>
                        <form method="POST" action="{{ route('cart.removeSaved', $item['id']) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
