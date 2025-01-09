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
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .cart-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .cart-summary {
            border-top: 2px solid #007bff;
            padding-top: 10px;
            margin-bottom: 20px;
        }
        .cart-actions {
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        .btn-update, .btn-remove, .btn-save-later {
            margin-right: 5px;
        }
        .product-image {
            width: 100px;
            height: auto;
        }
        .product-name {
            font-weight: bold;
        }
        .product-price, .product-total {
            font-size: 1.1em;
        }
        .btn-custom {
            width: 100%;
        }
        .btn-checkout {
            padding: 10px 20px;
            font-size: 1.1em;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-checkout:hover {
            background-color: #218838;
            color: white;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .alert-info a {
            text-decoration: underline;
        }
        .table thead {
            background-color: #007bff;
            color: #ffffff;
        }
        .table tbody tr td {
            vertical-align: middle;
        }
        .cart-summary p {
            margin: 0;
        }
        .cart-summary strong {
            display: inline-block;
            width: 150px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="cart-container">
        <h1 class="mb-4 text-center">Shopping Cart</h1>

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
                <p class="cart-summary">
                    <strong>Total Items:</strong> {{ count($cartItems) }}<br>
                    <strong>Subtotal:</strong> ${{ number_format($subtotal, 2) }}<br>
                    <strong>Tax (10%):</strong> ${{ number_format($tax, 2) }}<br>
                    <strong>Grand Total:</strong> ${{ number_format($grandTotal, 2) }}
                </p>
            </div>
        </div>

        <!-- Cart Items -->
        @if (count($cartItems) > 0)
            <table class="table table-hover">
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
                            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="product-image rounded">
                        </td>
                        <td class="product-name">{{ $item['name'] }}</td>
                        <td>
                            <!-- Update Quantity Form -->
                            <form method="POST" action="{{ route('cart.update', $item['id']) }}" class="d-inline">
                                @csrf
                                @method('PUT')
                                <div class="input-group" style="max-width: 150px;">
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control">
                                    <button type="submit" class="btn btn-primary btn-sm btn-update">Update</button>
                                </div>
                            </form>
                        </td>
                        <td class="product-price">${{ number_format($item['price'], 2) }}</td>
                        <td class="product-total">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        <td>
                            <!-- Remove Item Form -->
                            <form method="POST" action="{{ route('cart.destroy', $item['id']) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-remove">Remove</button>
                            </form>
                            <!-- Save for Later Form -->
                            <form method="POST" action="{{ route('cart.saveForLater', $item['id']) }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm btn-save-later">Save for Later</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Cart Actions -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <a href="{{ route('firstpage') }}" class="btn btn-outline-secondary">Continue Shopping</a>
                <a href="{{ route('checkout') }}" class="btn btn-success btn-checkout">Proceed to Checkout</a>
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
            <table class="table table-hover">
                <thead class="table-secondary">
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
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
