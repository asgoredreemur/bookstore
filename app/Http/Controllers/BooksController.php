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
        $carts = Cart::all();
        return view('bookstore.show', [
            'books' => $books,
            'carts' => $carts
        ]);
    }
    public function cart(){
        $carts = Cart::where("userid", session("userid"))->get();
        return view('bookstore.cart', [
            'carts' => $carts
        ]);
    }
    public function store(){
        $cart = new Cart();
        $cart->userid = request("userid");
        $cart->username = request("username");
        $cart->thumbnail = request("thumbnail");
        $cart->productid = request("productid");
        $cart->productname = request("productname");
        $cart->price = request("price");
        $cart->quantity = request("quantity");
        $productexists = Cart::select("*")
        ->where("userid", request("userid"))
        ->where("productid", request("productid"))
        ->exists();
        if ($productexists){
        error_log("product exists");
        $oldquantity = Cart::select("quantity")
        ->where("userid", request("userid"))
        ->where("productid", request("productid"))
        ->latest()
        ->first();
        $number = $oldquantity->quantity;
        $newquantity = $number + request("quantity");
        Cart::where("userid", request("userid"))
        ->where("productid", request("productid"))
        ->update(['quantity' => $newquantity]);
        }else{
        $cart->quantity = request("quantity");
        $cart->save();
        }
        return redirect('/books')->with('mssg', 'Added to Cart');
    }
    public function checkout(){
        $carts = Cart::where("userid", session("userid"))->get();
        return view('bookstore.checkout', [
            'carts' => $carts
        ]);
    }
}
