<?php

namespace App\Http\Controllers;

use App\Models\Caterogy;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeProduct extends Controller
{
    //
  //xây dựng hàm show index
    public function showHomeProduct()
    {
        
        $dataproduct = Product::all();
        $category = Caterogy::orderBy('id', 'asc')->get();
         //viết  hiển thị sản phẩm thịnh hành
        $popularProducts = Product::where('featured',true)->get();
        return view('homeproducts.homeproduct',compact('dataproduct','category','popularProducts'));

    }

    ////
      ///show chi tiết sản phẩm
    public function showProductDetail($id)
    {
      $productdetail = Product::find($id);
      if($productdetail != null)
      {
        return view('homeproducts.productsdetails',compact('productdetail'));
      }
      else{
        return redirect('https://www.youtube.com/');
      }
    }


    ///viết hàm hiển thị sản phẩm cho danh mục

    public function categoryByProduct($id)
    {
      
      $products = Product::where('id_cate',$id)->get();
      // var_dump($products);die();
      return view('homeproducts.listhomeproduct',compact('products'));
    }

   


   


  

}

