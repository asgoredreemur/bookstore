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
            <input type="radio" id="card" name="payment" value="card" required>
            <label for="card">Card</label><br>
            <input type="radio" id="cash" name="payment" value="cash">
            <label for="cash">Cash on Delivery</label><br>
            <input type="submit" value="Confirm Order" name="submit">
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
            @endforeach
        </td>
        </tr>
        </table>
    </div>
@endsection