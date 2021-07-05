@extends('layouts.layout')

@section('content')
    <div class="content" align=center>
        <h2>CHECKOUT</h2>
        <table>
        <tr>
        <td style="background-color:lavender">
        <form>
        <div>
            <h3><strong>ADDRESS DETAILS</strong></h3>
            <input type=text name="address" id="street" required>
            <label for="street">Street</label><br>
            <input type=text name="address" id="apartment" required>
            <label for="apartment">Apartment No</label><br>
            <input type=text name="address" id="town" required>
            <label for="town">Town/City</label><br>
            <input type=text name="address" id="state" required>
            <label for="state">State</label><br>
            <input type=text name="address" id="country" required>
            <label for="country">Country</label>
        </div>
        <div>
            <h3><strong>DELIVERY METHOD</strong></h3>
            <input type="radio" id="door" name="delivery" value="door" required>
            <label for="door">Door Delivery</label><br>
            <input type="radio" id="pickup" name="delivery" value="pickup">
            <label for="pickup">Pickup Station</label>
        </div>
        <div>
            <h3><strong>PAYMENT METHOD</strong></h3>
            <div class="stripe">
                <div class="links">
                    <form action="/api/payment" method="POST">
                        <script
                        src="https://checkout.stripe.com/checkout.js"
                        class="stripe-button"
                        data-key="pk_test_51J9dlhLIoC6UpHgDK5bntMkjcnxvk0VGfOpns8JWxtaCOb0NlxYutTLXMyRW9a5U9lSSeLT0ahAekRABo23DOj8Z00D6AjKnRi"
                            <?php $total = 0?>
                            @foreach($carts as $cart)      
                            <?php $total += $cart->price * $cart->quantity ?>
                            @endforeach
                        data-amount={{$total * 100}}
                        data-name="Hardcover Checkout"
                        data-description="Complete Payment"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto"
                        data-currency="usd">
                    </script>
                    </form>
                </div>
            </div>
        </div>
        </form>
        </td>
        <td style="background-color:beige">
            <h3><strong>YOUR ORDER</strong></h3>
            <a href={{url('/cart')}}>Modify Cart</a>
            @foreach ($carts as $cart)
                <table>
                    <tr>
                        <td><img src="/img/covers/{{ $cart->thumbnail }}" class="thumbnails"></td>
                        <td><table><tr><td>{{ $cart->productname }}</td></tr><tr><td>${{ $cart->price }}</td></tr><tr><td>Qty: {{ $cart->quantity }}</td></tr></table></td>
                    </tr>
                </table>
                <strong>Total: {{$total}}</strong>
            @endforeach
        </td>
        </tr>
        </table>
    </div>
@endsection