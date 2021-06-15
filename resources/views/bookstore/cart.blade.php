@extends('layouts.layout')

@section('content')

<div class="content" align="center">
    <h3>Cart</h3>
    @if ($carts->isEmpty())
        <p>You cart is empty</p>
        <img src="/img/Book lover-bro.png" alt="" class="cartimage">
        <p><a href="{{ url('/books') }}" class="cartbrowse">Browse Some Books</a></p>
    @else
    <table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:30%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:8%" class="text-center">Subtotal</th>
            <th style="width:5%"></th>
        </tr>
        </thead>
        <tbody>

    <?php $total = 0?>
           
        @foreach($carts as $cart)      
        <?php $total += $cart->price * $cart->quantity ?>

        <tr class="productrow">
            <td class="tableitem" id="nameimage">
                <div class="row">
                    <div class="col"><img src="/img/covers/{{ $cart->thumbnail }}" class="thumbnails">
                    </div>
                    <div>
                        <h4>{{ $cart->productname }}</h4>
                    </div>
                </div>
            </td>
            <td class="tableitem" id="price">${{ $cart->price }}</td>
            <td class="tableitem" id="quantity"><input type="number" value="{{ $cart->quantity }}" min="1" max="10"></td>
            <td class="tableitem" id="subtotal">${{ $cart->price * $cart->quantity }}</td>
            <td class="tableitem" id="action">
            <form action="{{ url("remove-from-cart") }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value={{ $cart->id }}>
                <button>Remove</button>
            </form>
            </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td><strong>Total: ${{ $total }}</strong><p><a href="{{url("/checkout")}}">Proceed to Checkout &nbsp;</a><a href="{{url("/books")}}" class="button">Continue Shopping</p></td>
            </tr>
        </tfoot>
    </table>
    @endif
</div>
@endsection
