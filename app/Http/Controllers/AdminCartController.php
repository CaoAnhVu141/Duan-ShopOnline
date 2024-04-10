<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminCartController extends Controller
{
    //

     //viết hàm show giỏ hàng

    public function showAllCart()
    {
      return view('homeproducts.cartpage.cart');
    }


    ///viêt hàm thêm sản phẩm vào giỏ hàng

    public function addToCart(Request $request,$id)
    {

      $products = Product::find($id);
      

      Cart::add([
        'id'=> $products->id,
        'name'=> $products->nameproduct,
        'qty'=> 1,
        'price'=> $products->price,
        'options' =>['thumbnail'=>$products->image]
      ]);

      return redirect('/cart');

      // echo "<pre>";
      // print_r(Cart::content());
      
    }


    //xây dựng hàm xoá

    public function deleteCart($rowId)
    {
      Cart::remove($rowId);
      return redirect('/cart');
    }


    //xử lý cập nhật giỏ hàng

    public function updateCart(Request $request)
    {
      
      $data = $request->get('quantity');

      //dùng vòng lặp để thực hiệm lặp toàn bộ số lượng và sau đó thực hiện update
      //dùng key value
     foreach ($data as $key => $value) {
        Cart::update($key,$value);
     }
     return redirect('/cart');

    }

   
}
