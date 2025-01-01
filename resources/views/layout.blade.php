<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zay Shop</title>
    <link rel="stylesheet" href="{{ asset('style/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <script src="{{ asset('style/jquery.min.js') }}"></script>
    <script src="{{ asset('style/bootstrap.bundle.min.js') }}"></script>
</head>
<body>

<!-- Navigation Bar -->
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Zay Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @foreach($menus as $menu)
                    @if($menu->status == 1) <!-- Only show active menus -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $menu->link }}">{{ $menu->title }}</a>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<main>
    @yield('content') <!-- This is where the content of other views will be injected -->
</main>

<footer>
    <p>Footer content here</p>
</footer>

</body>
</html>
