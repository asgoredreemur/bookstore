@extends('layouts.layout')

@section('content')
    <div class="content" align="center">
        <table>
        <tr>
        <td>
        <div>
            <p>ADDRESS DETAILS</p>
        </div>
        <div>
            <p>DELIVERY METHOD</p>
        </div>
        <div>
            <p>PAYMENT METHOD</p>
        </div>
        <a href="confirm-order"></a>
        </td>
        <td>
            <p>YOUR ORDER</p>
            @foreach ($carts as $cart)
                <table>
                    <tr>
                        <td><img src="/img/covers/{{ $cart->thumbnail }}" class="thumbnails"></td>
                        <td><table><tr><td>{{ $cart->productname }}</td></tr><tr><td>{{ $cart->price }}</td></tr><tr><td>Qty: {{ $cart->quantity }}</td></tr></table></td>
                    </tr>
                </table>
            @endforeach
        </td>
        </tr>
        </table>
    </div>
@endsection