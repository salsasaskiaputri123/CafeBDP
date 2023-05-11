<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CartOrderController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('menus', compact('products'));
    }
    public function cart()
    {
        return view('order');
    }
    public function addToCart($id_product)
    {
        $product = Product::findOrFail($id_product);

        $cart = session()->get('cart', []);

        if(isset($cart[$id_product])) {
            $cart[$id_product]['quantity']++;
        }  else {
            $cart[$id_product] = [
                "name" => $product->name,
                "image" => $product->image,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id_product && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id_product]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function remove(Request $request)
    {
        if($request->id_product) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id_product])) {
                unset($cart[$request->id_product]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function checkout(Request $request){
       
        $id_product = $request->id_product;
        $total_pesanan = $request->total_pesanan;
        $totalPrice = $request->totalPrice;
 
            for($i=0;$i<count((array)$id_product);$i++){
                Order::create([
                    'id_product' => $id_product[$i],
                    'total_pesanan' => $total_pesanan[$i],
                    'totalPrice' => $totalPrice[$i]
                ]);
            }
         

       
        // $item = new Product();
        // $total = ($item->stok - $request->total_pesanan);
        // // $item->where('id_product', '=', $request->id_product)->decrement('stok', $request->total_pesanan);
        // Product::where('id_product','=',$id_product)->update(['stok'=>$total]);

        $request->session()->forget('cart');
        
        return redirect('/product')->with('success', 'Product orders successfully!');

    }
}
