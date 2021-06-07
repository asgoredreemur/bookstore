@extends('layouts.layout')

@section('content')

<div class="content" align="center">
    <h3>Cart</h3>
    @if ($cart->isEmpty())
    <img src="/img/Book lover-bro.png" alt="" class="cartimage" align="center">
    <p align="center">There's nothing in your cart yet</p>
    <a href="{{ url('/books') }}">Browse Books</a>
    @else
    @foreach ($cart as $book)
        <li><p>{{ $book->productname }}</p></li>
    @endforeach
    @endif
</div>
    
@endsection