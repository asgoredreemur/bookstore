<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Cart;
use App\Http\Controllers\Auth;

class BooksController extends Controller
{
    public function index(){
        return view('bookstore.index');
    }
    public function show(){
        $books = Books::all();
        return view('bookstore.show', [
            'books' => $books
        ]);
    }
    public function cart(Request $request, $id){
        $book = Books::find($id);
    }
    public function store(){
        $cart = new Cart();
        $cart->username = request("username");
        $cart->userid = request("userid");
        $cart->productid = request("productid");
        $cart->price = request("price");
        $cart->status = request("status");
        $cart->productname = request("productname");

        $cart->save();
        return redirect('/books')->with('mssg', 'Added to Cart');
    }
}
