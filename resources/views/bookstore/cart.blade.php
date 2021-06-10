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
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

    <?php $total = 0?>
           
        @foreach($carts as $cart)      
        <?php $total += $cart->price * $cart->quantity ?>

        <tr>
            <td>
                <div class="row">
                    <div class="col"><img src="/img/covers/{{ $cart->thumbnail }}" class="thumbnails">
                    </div>
                    <div>
                        <h4>{{ $cart->productname }}</h4>
                    </div>
                </div>
            </td>
            <td>${{ $cart->price }}</td>
            <td><input type="number" value="{{ $cart->quantity }}"></td>
            <td>${{ $cart->price * $cart->quantity }}</td>
            <td>
            <form action="{{ url("remove-from-cart") }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value={{ $cart->id }}>
                <button>Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td><strong>Total {{ $total }}</strong></td>
            </tr>
        </tfoot>
    </table>
    @endif
</div>
    
@endsection