@extends('layouts.layout')

@section('content')

<div class="content" align="center">
    <h3>Cart</h3>
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

    @if (session('cart'))
        @foreach(session('cart') as $id => $details)      
        <?php $total += $details['price'] * $details['quantity'] ?>

        <tr>
            <td>
                <div class="row">
                    <div class="col"><img src="/img/covers/{{ $details['thumbnail'] }}" class="thumbnails">
                    </div>
                    <div>
                        <h4>{{ $details['name'] }}</h4>
                    </div>
                </div>
            </td>
            <td>${{ $details['price'] }}</td>
            <td><input type="number" value="{{ $details['quantity'] }}"></td>
            <td>${{ $details['price'] * $details['quantity'] }}</td>
            <td><button data-id="{{ $id }}"><i class="fa"></i></button></td>
        </tr>
        @endforeach
    @endif
        </tbody>
        <tfoot>
            <tr>
                <td><strong>Total {{ $total }}</strong></td>
            </tr>
        </tfoot>
    </table>
</div>
    
@endsection

@section('scripts')


    <script type="text/javascript">

        $(".update-cart").click(function (e) {
           e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>

@endsection