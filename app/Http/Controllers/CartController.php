<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function Cart(){
        $cartitems= cart::all();
        $products=product::where('status','active')->get();
        return view('homeweb.cart',compact('cartitems','products'));
    }
    public function DelCartItem(){
        cart::find('id')->delete();
        return redirect()->route('cart');
    }







    public function AddtoCart($pid){
        $customer_id= auth()->user()->id;
        $product_id=$pid;

        $cart=cart::create([
            'customer_id'=>$customer_id,
            'unit_id'=>$product_id,
            'quantity'=>'1',
        ]);
        if ($cart) {
            return redirect()->route('cart');
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }
}
