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
                <h3>{{ $book->name }}</h3>
                <table><tr><td><img src="/img/covers/{{ $book->thumbnail }}" alt="" class="thumbnails"><p>Price: ${{ $book->price }} <a href="{{ url('add-to-cart/'.$book->id) }}">Add To Cart</a></p></td><td>{{ $book->description }}</td></tr></table>
            @endforeach
        </div>
    </div>
@endsection