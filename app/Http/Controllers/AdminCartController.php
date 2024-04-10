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
      ]);
       

      return redirect('cart');
      
    }

    //xử lý cập nhật giỏ hàng

    public function updateCart(Request $request, $id)
    {
      $newCart = $request->input('quantity');
      Cart::update($id,$newCart);

      return redirect()->back();
    }
//     public function updateCart(Request $request, $id)
// {
//     // Lấy số lượng mới từ request
//     $newQuantities = $request->input('quantity');
    
//     // Lấy ID của sản phẩm từ đối số truyền vào
//     $productId  = $request->input('product_id');

//     // Lặp qua mảng số lượng mới để cập nhật giỏ hàng
//     foreach ($newQuantities as $key => $newQuantity) {
//         Cart::update($productId [$key], $newQuantity);
//     }

//     return redirect()->back();
// }
   
}
