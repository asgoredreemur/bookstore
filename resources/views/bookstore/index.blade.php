@extends('layouts.layout')

@section('content')

<div class="main">
    <h1 class='browse'><a href="{{ url('/books') }}" class="link">Browse Books</a></h1>
    @if (Auth::user())
    {{session(['userid' => Auth::user()->id])}}
</div>    
    @endif
@endsection