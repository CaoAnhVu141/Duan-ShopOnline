@extends('layouts.admin-home-product')

@section('content')
   <!--breadcrumbs area start-->
    <div class="breadcrumbs_area other_bread">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{ url('/index') }}">home</a></li>
                            <li>/</li>
                            <li>cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!-- shopping cart area start -->
    <div class="shopping_cart_area">
        <div class="container">  
            {{-- <form action="#">  --}}
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <form action="{{ route('update.cart') }}" method="post">
                                @csrf
                                <div class="cart_page table-responsive">
                                    <table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $item)
                                        <tr>
                                            <td class="product_remove"><a href="{{ route('productsdetail',$item->id) }}"><i class="fa fa-trash-o"></i></a></td>
                                             <td class="product_thumb"><a href="#"><img src="assets/img/s-product/product.jpg" alt=""></a></td>
                                             <td class="product_name"><a href="{{ route('productsdetail',$item->id) }}">{{$item->name }}</a></td>
                                             <td class="product-price">{{ number_format($item->price,0,',','.')}}</td>
                                             <td class="product_quantity">
                                            <input min="1" max="100" value="{{ $item->qty }}" name="quantity" type="number">
                                           <input type="hidden" name="product_id" value="{{$item->id }}">
                                            </td>
                                             <td class="product_total">
                                                {{ number_format($item->price * $item->qty, 0, ',', '.') }}
                                             </td>
                                         </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>   
                            </div>  
                            <div class="cart_submit">
                                <button type="submit">update cart</button>
                            </div> 
                            </form>     
                        </div>
                    </div>
                </div>
                
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">   
                                    <p>Enter your coupon code if you have one.</p>                                
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </div>    
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                       <p>Subtotal</p>
                                       <p class="cart_amount"></p>
                                   </div>
                                   <div class="cart_subtotal ">
                                       <p>Shipping</p>
                                       <p class="cart_amount"><span>Flat Rate:</span></p>
                                   </div>
                                   <a href="#">Calculate shipping</a>

                                   <div class="cart_subtotal">
                                       <p>Total</p>
                                       <p class="cart_amount">{{ Cart::total() }} vnd</p>
                                   </div>
                                   <div class="checkout_btn">
                                       <a href="#">Proceed to Checkout</a>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
                
            {{-- </form>  --}}
        </div>     
    </div>
@endsection