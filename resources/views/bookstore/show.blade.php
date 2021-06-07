@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="topnav">
            <form action="">
            <input type="text" placeholder="Search...">
            <button type="submit" class="submit">Search</button>
            </form>
        </div>
        <div>
            <h2>Books</h2>
            <p style="text-align: center" class="mssg">{{ session('mssg') }}</p>
            @foreach ($books as $book)
                <form action="/books" method="POST">
                @csrf
                <h3>{{ $book->name }}</h3>
                <table><tr><td><img src="/img/covers/{{ $book->thumbnail }}" alt="" class="thumbnails"><p>Price: ${{ $book->price }} <input type="submit" value="Add to Cart" class="button"></p></td><td>{{ $book->description }}</td></tr></table>
                <input type="hidden" name="productid" value="{{ $book->id }}">
                @if (Auth::user())
                <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                <input type="hidden" name="username" value="{{ Auth::user()->name }}">
                <input type="hidden" name="price" value="{{ $book->price }}">
                <input type="hidden" name="status" value="Pending">
                <input type="hidden" name="productname" value="{{ $book->name }}"> 
                @else 
                <input type="hidden" name="userid" value="guest">
                <input type="hidden" name="username" value">
                <input type="hidden" name="price" value="{{ $book->price }}">
                <input type="hidden" name="status" value="Pending">
                <input type="hidden" name="productname" value="{{ $book->name }}"> 
                @endif
                </form>
            @endforeach
        </div>
    </div>
@endsection