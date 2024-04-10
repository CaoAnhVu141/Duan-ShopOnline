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
                <div class="col-12">
                    <div class="product_tab_button">
                        <ul class="nav" role="tablist">
                            {{-- <li>
                                <a class="active" data-toggle="tab" href="{{ url('/index') }}" role="tab" aria-controls="clothing" aria-selected="true">All</a>
                            </li> --}}
                           @foreach ($category as $item)
                          <li>
                            {{-- <a data-toggle="tab" href="{{ route('byproducts', $item->id) }}" role="tab" aria-controls="shoes" aria-selected="false">{{ $item->namecaterogy }}</a> --}}
                             {{-- <a data-toggle="tab" href="{{ route('byproducts',$item->id) }}" role="tab" aria-controls="shoes" aria-selected="false">{{ $item->namecaterogy }}</a> --}}
                             <a href="{{ route('byproducts',$item->id) }}">{{ $item->namecaterogy }}</a>
                            </li>

                           @endforeach
                           
                           
                        </ul>
                    </div>
                </div>
            </div>
             <div class="tab-content">
                  <div class="tab-pane fade show active" id="clothing" role="tabpanel">
                    <div class="product_container">
                        <div class="row product_column4">
                            @foreach ($dataproduct as $item)
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ url('/index') }}"><img src="{{ url($item->image) }}" alt="" height="280px" width="191"></a>
                                        {{-- <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product24.jpg" alt=""></a> --}}
                                        <div class="quick_button">
                                            <a href="{{ route('productsdetail', ['id' => $item->id]) }}" title="quick_view">Xem sản phẩm</a>
                                        </div>
                                        <div class="product_sale">
                                            {{-- <span>-{{ $item->discount }}%</span> --}}
                                            <span>3%</span>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <h3><a href="{{ route('productsdetail', ['id' => $item->id]) }}">{{ $item->nameproduct }}</a></h3>
                                        <span class="current_price">{{ number_format($item->price,0, '','.') }} vnd</span>
                                        {{-- <span class="old_price">£{{ $item->old_price }}</span> --}}

                                    </div>
                                </div>
                            </div>
                            @endforeach
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
                @foreach ($popularProducts as $item)
                   <div class="col-lg-3">
                       <div class="single_product">
                           <div class="product_thumb">
                            <a class="primary_img" href="{{ url('/index') }}"><img src="{{ url($item->image) }}" alt="" height="280px" width="191"></a>
                               <div class="quick_button">
                                   <a href="{{ route('productsdetail', ['id' => $item->id]) }}" title="quick_view">Xem sản phẩm</a>
                               </div>
                           </div>
                           <div class="product_content">
                               <h3><a href="{{ route('productsdetail', ['id' => $item->id]) }}">{{ $item->nameproduct }}</a></h3>
                               <span class="current_price">{{ $item->price }}</span>
                           </div>
                       </div>
                   </div>
                   @endforeach
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