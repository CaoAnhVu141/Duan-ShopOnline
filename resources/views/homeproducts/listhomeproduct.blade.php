@extends('layouts.admin-home-product')

@section('content')
<section class="product_section womens_product">
    <div class="container">
        <div class="row">   
            <div class="col-12">
               <div class="section_title">
                   <h2>Sản phẩm của chúng tôi</h2>
                   <p>Các sản phẩm thiết kế hiện đại,mới nhất</p>
               </div>
            </div> 
        </div>    
        <div class="product_area"> 
            <div class="row">
            </div>
             <div class="tab-content">
                  <div class="tab-pane fade show active" id="clothing" role="tabpanel">
                    <div class="product_container">
                        <div class="row product_column4">
                            @foreach ($products as $product)
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ url('/index') }}"><img src="{{ url($product->image) }}" alt="" height="280px" width="191"></a>
                                        <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product24.jpg" alt=""></a>
                                        <div class="quick_button">
                                            <a href="{{ route('productsdetail', ['id' => $product->id]) }}" title="quick_view">Xem sản phẩm</a>
                                        </div>
                                        <div class="product_sale">
                                            {{-- <span>-{{ $item->discount }}%</span> --}}
                                            <span>3%</span>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <h3><a href="{{ route('productsdetail', ['id' => $product->id]) }}">{{ $product->nameproduct }}</a></h3>
                                        <span class="current_price">{{ $product->price }} vnd</span>
                                        {{-- <span class="old_price">£{{ $item->old_price }}</span> --}}

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                    <div class="tab-pane fade" id="shoes" role="tabpanel">
                         <div class="product_container">
                            <div class="row product_column4">
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product10.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product11.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                            <div class="label_product">
                                                <span>new</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Marshall Portable  Bluetooth</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product11.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product12.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Koss KPH7 Portable</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product13.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product9.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Beats Solo2 Solo 2</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product8.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product7.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Beats EP Wired</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product12.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product13.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Bose SoundLink Bluetooth</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product10.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product11.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Apple iPhone SE 16GB</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product13.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product14.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                            <div class="double_base">
                                                <div class="product_sale">
                                                    <span>-7%</span>
                                                </div>
                                                <div class="label_product">
                                                    <span>new</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">JBL Flip 3 Portable</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product15.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product16.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Beats Solo Wireless</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product18.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product17.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Apple iPad with Retina</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product19.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product20.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Marshall Portable  Bluetooth</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>  
                  <div class="tab-pane fade" id="accessories" role="tabpanel">
                         <div class="product_container">
                            <div class="row product_column4">
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product1.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product2.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Marshall Portable  Bluetooth</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product4.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product3.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Koss KPH7 Portable</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product6.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product5.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                            <div class="label_product">
                                                <span>new</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Beats Solo2 Solo 2</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product7.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product8.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Beats EP Wired</a></h3>
                                            <span class="current_price">£60.00</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product10.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product9.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Bose SoundLink Bluetooth</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product10.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product11.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Apple iPhone SE 16GB</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product13.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product14.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                            <div class="double_base">
                                                <div class="product_sale">
                                                    <span>-7%</span>
                                                </div>
                                                <div class="label_product">
                                                    <span>new</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">JBL Flip 3 Portable</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product15.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product16.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Beats Solo Wireless</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product18.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product17.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                            <div class="label_product">
                                                <span>new</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Apple iPad with Retina</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/product19.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product20.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="#" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Marshall Portable  Bluetooth</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div> 
            </div>
        </div>
           
    </div>
</section>
<!--product section area end-->

<!--banner area start-->
<section class="banner_section banner_section_three">
    <div class="container-fluid">
        <div class="row ">
           <div class="col-lg-6 col-md-6">
                <div class="banner_area">
                    <div class="banner_thumb">
                        <a href="shop.html"><img src="image/applechat.jpg" alt="#"></a>
                        <div class="banner_content">
                           <h1>AnhVuShop <br>Chuyên các sản phẩm về Apple</h1>
                            <a href="shop.html">Discover Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="banner_area">
                    <div class="banner_thumb">
                        <a href="shop.html"><img src="image/applechat1.jpg" alt="#"></a>
                        <div class="banner_content">
                           <h1>AnhVuShop <br>Chuyên táo</h1>
                            <a href="shop.html">Discover Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--banner area end-->

<!--product section area start-->
<section class="product_section womens_product bottom">
    <div class="container">
        <div class="row">   
            <div class="col-12">
               <div class="section_title">
                   <h2>Sản phẩm thịnh hành</h2>
                   <p>Sản phẩm ấn tượng và bán chạy nhất</p>
               </div>
            </div> 
        </div>    
        <div class="product_area"> 
             <div class="row">
                <div class="product_carousel product_three_column4 owl-carousel">
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="assets/img/product/product21.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product22.jpg" alt=""></a>

                                <div class="quick_button">
                                    <a href="#" title="quick_view">Xem sản phẩm</a>
                                </div>

                                <div class="product_sale">
                                    <span>-7%</span>
                                </div>
                            </div>
                            <div class="product_content">
                                <h3><a href="product-details.html">Marshall Portable  Bluetooth</a></h3>
                                <span class="current_price">£60.00</span>
                                <span class="old_price">£86.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="assets/img/product/product27.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product28.jpg" alt=""></a>

                                <div class="quick_button">
                                    <a href="#" title="quick_view">Xem sản phẩm</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <h3><a href="product-details.html">Koss KPH7 Portable</a></h3>
                                <span class="current_price">£60.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="assets/img/product/product6.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product5.jpg" alt=""></a>

                                <div class="quick_button">
                                    <a href="#" title="quick_view">Xem sản phẩm</a>
                                </div>

                            </div>
                            <div class="product_content">
                                <h3><a href="product-details.html">Beats Solo2 Solo 2</a></h3>
                                <span class="current_price">£60.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="assets/img/product/product7.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product8.jpg" alt=""></a>

                                <div class="quick_button">
                                    <a href="#" title="quick_view">Xem sản phẩm</a>
                                </div>

                                <div class="product_sale">
                                    <span>-7%</span>
                                </div>
                            </div>
                            <div class="product_content">
                                <h3><a href="product-details.html">Beats EP Wired</a></h3>
                                <span class="current_price">£60.00</span>
                                <span class="old_price">£86.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="assets/img/product/product24.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product25.jpg" alt=""></a>

                                <div class="quick_button">
                                    <a href="#" title="quick_view">Xem sản phẩm</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <h3><a href="product-details.html">Bose SoundLink Bluetooth</a></h3>
                                <span class="current_price">£60.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="assets/img/product/product10.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product11.jpg" alt=""></a>

                                <div class="quick_button">
                                    <a href="#" title="quick_view">Xem sản phẩm</a>
                                </div>

                                <div class="product_sale">
                                    <span>-7%</span>
                                </div>
                            </div>
                            <div class="product_content">
                                <h3><a href="product-details.html">Apple iPhone SE 16GB</a></h3>
                                <span class="current_price">£60.00</span>
                                <span class="old_price">£86.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="assets/img/product/product23.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product24.jpg" alt=""></a>

                                <div class="quick_button">
                                    <a href="#" title="quick_view">Xem sản phẩm</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <h3><a href="product-details.html">JBL Flip 3 Portable</a></h3>
                                <span class="current_price">£60.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
    </div>
</section>
<!--product section area end-->

<!--blog section area start-->
<section class="blog_section blog_section_three">
    <div class="container">
       <div class="row">
           <div class="col-12">
               <div class="section_title">
                   <h2>Bài viết mới nhất</h2>
                   <p>Cập nhật xu thế thời trang</p>
               </div>
           </div>
       </div>
        <div class="row">
            <div class="blog_wrapper blog_column3 owl-carousel">
                <div class="col-lg-4">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            <a href="blog-details.html"><img src="assets/img/blog/blog1.jpg" alt=""></a>
                            <div class="blog_icon">
                                <a href="blog-details.html"></a>
                            </div>
                        </div>
                        <div class="blog_content">
                            <h3><a href="blog-details.html">Mercedes Benz– Mirror To The Soul 360</a></h3>
                            <div class="author_name">
                               <p> 
                                    <span class="post_by">by</span>
                                    <span class="themes">ecommerce Themes</span>
                                    / 30 Oct 2017
                               </p>
                                
                            </div>
                            <div class="post_desc">
                                <p>Maria Denardo is the Fashion Director at theFashionSpot. Prior to joining tFS, she worked as...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            <a href="blog-details.html"><img src="assets/img/blog/blog2.jpg" alt=""></a>
                            <div class="blog_icon">
                                <a href="blog-details.html"></a>
                            </div>
                        </div>
                        <div class="blog_content">
                            <h3><a href="blog-details.html">Dior F/W 2015 First Fashion Experience</a></h3>
                            <div class="author_name">
                               <p> 
                                    <span class="post_by">by</span>
                                    <span class="themes">ecommerce Themes</span>
                                    / 30 Oct 2017
                               </p>
                                
                            </div>
                            <div class="post_desc">
                                <p>Maria Denardo is the Fashion Director at theFashionSpot. Prior to joining tFS, she worked as...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            <a href="blog-details.html"><img src="assets/img/blog/blog3.jpg" alt=""></a>
                            <div class="blog_icon">
                                <a href="blog-details.html"></a>
                            </div>
                        </div>
                        <div class="blog_content">
                            <h3><a href="blog-details.html">London Fashion Week & Royal Day</a></h3>
                            <div class="author_name">
                               <p> 
                                    <span class="post_by">by</span>
                                    <span class="themes">ecommerce Themes</span>
                                    / 30 Oct 2017
                               </p>
                                
                            </div>
                            <div class="post_desc">
                                <p>Maria Denardo is the Fashion Director at theFashionSpot. Prior to joining tFS, she worked as...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            <a href="blog-details.html"><img src="assets/img/blog/blog2.jpg" alt=""></a>
                            <div class="blog_icon">
                                <a href="blog-details.html"></a>
                            </div>
                        </div>
                        <div class="blog_content">
                            <h3><a href="blog-details.html">Best of New York Spring/Summer 2016</a></h3>
                            <div class="author_name">
                               <p> 
                                    <span class="post_by">by</span>
                                    <span class="themes">ecommerce Themes</span>
                                    / 30 Oct 2017
                               </p>
                                
                            </div>
                            <div class="post_desc">
                                <p>Maria Denardo is the Fashion Director at theFashionSpot. Prior to joining tFS, she worked as...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection