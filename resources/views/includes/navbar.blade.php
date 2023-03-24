<nav class="navbar navbar-expand-lg navbar-dark bg-dark" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand mb-0 h1" href="{{ route('home') }}" style="font-family: monospace">BILLA CAKE SHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('category.index') }}" style="font-family: monospace">Categories</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('product.index') }}" style="font-family: monospace"> Products</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('cart.index') }}"style="font-family: monospace"><i class="fa-solid me-2 fa-cart-shopping" ></i>Cart</a>
            </li>
        </ul>
        </div>
    </div>
</nav>

