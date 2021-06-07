<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    public function getAddCart(Request $request, $id){
        $books = Books::find($id);
        $rowId = 456;
        $userId = 2;
        Cart::session($userId)->add(array(
            'id' => $rowId,
            'name' => $books->name, 
            'price' => $books->price,
            'quantity' => 4, 
            'attributes' => array(),
            'associateModel' => $books
        ));
    }
}

