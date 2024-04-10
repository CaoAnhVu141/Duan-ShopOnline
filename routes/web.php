<?php

use App\Http\Controllers\AdminArticalController;
use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminCateArticleController;
use App\Http\Controllers\AdminClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminHomeProduct;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CaterogyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeProductController;
use App\Http\Controllers\AdminCartController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//hiện thị dashboard

Route::get('/dashboard', [DashboardController::class, 'show'])->middleware('auth');
// Route::get('/home',[HomeController::class,'index']);


//thiết lập Route để show account admin

Route::get('/admin/user/list',[AdminController::class,'showAdmin']);


// thiết lập route để thêm dánh sách Users

Route::get('/admin/user/add',[AdminUserController::class,'addUsers']);


///thiết lập route add data vào database

Route::post('/admin/user/store',[AdminUserController::class,'store']);



///gom nhóm lại để fix bug đăng nhập

Route::middleware('auth')->group(function(){

    //thiết lập Route để show account admin

Route::get('/admin/user/list',[AdminUserController::class,'showAdmin']);


// thiết lập route để thêm dánh sách Users

Route::get('/admin/user/add',[AdminUserController::class,'addUsers']);


///thiết lập route add data vào database

Route::post('/admin/user/store',[AdminUserController::class,'store']);
});


///thiết lập route để xóa dữ liệu

Route::get('/admin/user/delete/{id}',[AdminUserController::class,'delete'])->name('delete_user');


Route::get('admin/user/show',[AdminUserController::class,'action']);


//thiết lập route dể sửa dữ liệu

Route::get('/admin/user/edit/{id}',[AdminUserController::class,'edit'])->name('edit_user');

Route::post('/admin/user/update/{id}',[AdminUserController::class,'update'])->name('edit_update');



///thiết lập route cho show product


Route::get('/admin/product/list',[AdminProductController::class,'ShowProduct']);


//thiết lập route cho add product nha.

Route::get('/admin/product/add',[AdminProductController::class,'add']);

Route::post('/admin/product/store',[AdminProductController::class,'addProduct']);


///
Route::get('admin/product/cat/list',[CaterogyController::class,'showAddCaterogy']);

Route::post('admin/cate/store',[CaterogyController::class,'addCaterogy']);


///định nghĩa Route in danh sách cho danh mục

Route::get('admin/caterogy/cat/list',[CaterogyController::class,'showDSCate']);

///định nghĩa route xóa danh sách danh mục

Route::get('/admin/caterogy/delete/{id}',[CaterogyController::class,'deleteCaterogy'])->name('delete_Cate');

//định nghĩa route sửa danh mục

Route::get('admin/caterogy/edit/{id}',[CaterogyController::class,'editCate'])->name('edit_Cate');
///UPDATE////////
Route::post('admin/caterogy/update/{id}',[CaterogyController::class,'updateCate'])->name('update_Cate');


///định nghĩa route xóa sản phẩm

Route::get('admin/product/delete/{id}',[AdminProductController::class,'deleteProduct'])->name('delete_Pro');


///định nghĩa route cho trang edit sẩn phẩm

Route::get('admin/product/edit/{id}',[AdminProductController::class,'editProduct'])->name('edit_Pro');

Route::post('admin/product/update/{id}', [AdminProductController::class, 'updateProduct'])->name('update_Pro');



////định nghĩa route cho xem  bài viết

Route::get('admin/post/list',[AdminPostController::class,'showDataListPost']);

Route::get('admin/post/add',[AdminPostController::class,'addArticle']);

Route::post('admin/post/store',[AdminPostController::class,'addDataPost']);


// Route cho danh mục bài viết

Route::get('admin/post/cat/add',[AdminCateArticleController::class,'showAddCateArticle']);

Route::post('admin/post/cat/store',[AdminCateArticleController::class,'addListCateArticle']);

Route::get('admin/post/cat/list',[AdminCateArticleController::class,'showCaterogyArticle']);

Route::get('admin/post/cat/delete/{id}',[AdminCateArticleController::class,'deleteCateArticle'])->name('delete_CateArticle');

Route::get('admin/post/cat/edit/{id}',[AdminCateArticleController::class,'editCateArticle'])->name('edit_CateAticle');

Route::post('admin/post/cat/update/{id}',[AdminCateArticleController::class,'updateCateArticle'])->name('update_CateAticle');




///THỰC HIỆN VIẾT ROUTE CHO NGƯỜI DÙNG

Route::get('client/register',[AdminClientController::class,'register']);
Route::post('admin/register',[AdminClientController::class,'addUsersClient']);

//login

Route::get('client/login',[AdminClientController::class,'showLogin']);

Route::post('admin/login',[AdminClientController::class,'loginUsersClient']);


//Thực hiện viết Route cho trang Home sản phẩm

Route::get('/index',[AdminHomeProduct::class,'showHomeProduct']);

// Route::get('/index',[AdminHomeProduct::class,'showPopularProducts']);


///thưc thi định nghĩa route cho show chi tiết sản phẩm

Route::get('products-detail/{id}',[AdminHomeProduct::class,'showProductDetail'])->name('productsdetail');
// Route::get('/products-detail/{id}', [AdminHomeProduct::class, 'showProductDetail'])->name('productsdetail');


//thực thi xuất sản phẩm theo danh mục
Route::get('category/{id}', [AdminHomeProduct::class, 'categoryByProduct'])->name('byproducts');

///thực thi viết route cho chi tiết sản phẩm sang giỏ hàng

Route::get('/add-cart/{id}', [AdminCartController::class, 'addToCart'])->name('add.cart');

//update giỏ hàng

Route::post('update-cart',[AdminCartController::class,'updateCart'])->name('update.cart');


//xoá giỏ hàng

Route::get('remove-cart/{rowId}',[AdminCartController::class,'deleteCart'])->name('remove.cart');


//thực thi viết route cho giỏ hàng
Route::get('/cart',[AdminCartController::class,'showAllCart'])->name('carts');
