
    <h1>Shopping Cart</h1>

    @if ($cartCounter->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <ul>
            @foreach ($cartCounter as $cartItem)
                <li>
                    {{ $cartItem->product->name }} - Quantity: {{ $cartItem->quantity }}
                    <form action="{{ route('cart.remove', ['id' => $cartItem->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Remove from Cart</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <p>Total: ${{ $totalPrice }}</p>

        <!-- Checkout Button (Assuming you have a form for checkout) -->
        <form action="{{ route('checkout') }}" method="post">
            @csrf
            <button type="submit">Checkout</button>
        </form>
    @endif
