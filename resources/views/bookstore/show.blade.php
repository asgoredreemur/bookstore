@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="topnav">
            <form action="">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit" class="submit">Search</button>
            </form>
        </div>
        <div>
            <h2>Books</h2>
            <p style="text-align: center" class="mssg">{{ session('mssg') }}</p>
            @foreach ($books as $book)
                <form action="{{ url('/books') }}" method="POST">
                @csrf
                <h3>{{ $book->name }}</h3>
                <table><tr><td><img src="/img/covers/{{ $book->thumbnail }}" alt="" class="thumbnails">
                <p>Price: ${{ $book->price }} Quantity: <input type="number" name="quantity" value="1" min="1" max="10"><input type="submit" name="add" value="Add To Cart"></p></td>
                <td>{{ $book->description }}</td></tr></table>
                <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                <input type="hidden" name="username" value="{{ Auth::user()->name }}">
                <input type="hidden" name="thumbnail" value="{{ $book->thumbnail }}">
                <input type="hidden" name="productid" value="{{ $book->id }}">
                <input type="hidden" name="productname" value="{{ $book->name }}">
                <input type="hidden" name="price" value="{{ $book->price }}">
                </form>
            @endforeach
        </div>
    </div>
@endsection