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
    public function cart(){
        return view('bookstore.cart');
    }
    public function addToCart($id){
        $book = Books::find($id);
        if (!$book){
            abort(404);
        }
        $cart = session()->get('cart');
        //if cart is empty then this is the first product 
        if (!$cart){
            $cart = [
                $id => [
                    "name" => $book->name, 
                    "quantity" => 1, 
                    "price" => $book->price, 
                    "thumbnail"=>$book->thumbnail
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        //if cart not empty then check if this product exists then increment quantity
        if (isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        //if item does not exist in the cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $book->name,
            "quantity" => 1,
            "price" => $book->price, 
            "thumbnail"=>$book->thumbnail
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request){
        if($request->id and $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request){
        if ($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
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
