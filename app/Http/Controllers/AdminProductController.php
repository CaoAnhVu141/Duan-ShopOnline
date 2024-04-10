<?php

namespace App\Http\Controllers;

use App\Models\Caterogy;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminProductController extends Controller
{
    //

    public function showProduct(Request $request)
    {
       
        $keyword = "";
        
        if($request->input('keyword'))
        {
            $keyword = $request->input('keyword');
        }
    
        $product = Product::paginate(3);    

        // $data = Product::where('nameproduct','LIKE',"%$keyword%")->paginate(5);
        $product = Product::where('nameproduct', 'LIKE' , "%{$keyword}%")->paginate(3);
        return view('admin.products.list_products', compact('product'));
    }

    //
    public function add()
    {
        $cate = Caterogy::paginate(5);
        return view('admin.products.add_product', compact('cate'));
    }


    ///link đến trang thêm sản phẩm

    function addProduct(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'price' => ['required', 'numeric'],
            'chosefile' => ['required', 'image', 'max:2048'],
            'producer' => ['required', 'string', 'max:200'],
            'rightnow' => ['required', 'string', 'max:200'],
            'intro' => ['required', 'string', 'max:200'],
            'intro_confirm' => ['required', 'string', 'max:200'],
            'status' => ['required', 'string', 'max:200'],
            'category_id' => ['required', 'exists:caterogies,id'], // Sửa thành exists:categories,id
        ], [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được vượt quá :max kí tự',
            'numeric' => ':attribute phải là một số nguyên',
            'integer' => ':attribute phải là một số nguyên',
            'image' => ':attribute phải là một hình ảnh',
        ], [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá sản phẩm',
            'chosefile' => 'Ảnh sản phẩm',
            'producer' => 'Nhà sản xuất',
            'rightnow' => 'Trạng thái sản phẩm',
            'intro' => 'Giới thiệu sản phẩm',
            'intro_confirm' => 'Chi tiết sản phẩm',
            'status' => 'Tình trạng sản phẩm',
            'category_id' => 'Danh mục sản phẩm',
        ]);

        // $imagePath = $request->file('chosefile')->store('products'); // Lưu vào thư mục public/products
        $category_id = $request->input('category_id');
        // Tiếp tục xử lý và lưu dữ liệu vào cơ sở dữ liệu

        //thực hiện kiểm tra và đẩy ảnh vào database

        // if($request->hasFile('chosefile'))
        // {
        //     // $imagePath = $request->file('chosefile')->storeAs('public/uploads', $request->file('chosefile')->getClientOriginalName());
        //     // $file_name = $request->file('chosefile')->getClientOriginalName();
        //     // $imagePath = basename($_FILES['chosefile'] ['name']);
        // }
        // else{
        //     $imagePath = null;
        // }
        // if ($request->hasFile('chosefile')) {
        //     $imagePath = $request->file('chosefile')->store('uploads', 'public');
        // } else {
        //     $imagePath = null;
        // }

        ///////////////
        $file = $request->file('chosefile'); // Lấy file từ request

        if ($file) {
            $file_name = $file->getClientOriginalName();

            // Kiểm tra xem thư mục public/uploads đã tồn tại chưa
            $directory = 'uploads';
            if (!File::exists($directory)) {
                // Nếu thư mục không tồn tại, hãy tạo nó
                File::makeDirectory($directory);
            }

            // Di chuyển tệp tải lên vào thư mục public/uploads
            $path = $file->move($directory, $file_name);

            // Tạo đường dẫn của ảnh từ thư mục uploads
            $thumbnail = $directory . '/' . $file_name;
        } else {
            $thumbnail = null; // Nếu không có tệp tải lên, sử dụng giá trị null cho thumbnail
        }


        // if ($request->hasFile('chosefile')) {
        //     // Lưu tập tin hình ảnh vào thư mục public/image
        //     $imagePath = $request->file('chosefile')->store('public/uploads');
    
        //     // Lấy tên của tập tin hình ảnh để lưu vào cơ sở dữ liệu
        //     $imageFilename = $request->file('chosefile')->getClientOriginalName();
        // } else {
        //     // Nếu không có tập tin hình ảnh được tải lên, gán giá trị mặc định cho tên tập tin
        //     $imageFilename = null;
        // }


        Product::create([
            'nameproduct' => $request->input('name'),
            'price' => $request->input('price'),
            'image' => $thumbnail,
            'producer' => $request->input('producer'),
            'rightnow' => $request->input('rightnow'),
            'productdescription' => $request->input('intro'),
            'detailproductdescription' => $request->input('intro_confirm'),
            'neworold' => $request->input('status'),
            'id_cate' => $category_id
        ]);
        return redirect('admin/product/list')->with('status', "Bạn đã thêm dữ liệu thành công rồi nè <3");
    }

    ///xây dừng hàm xóa 

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect('admin/product/list')->with('status', "Sản phẩm không tồn tại");
        }

        $product->delete();
        return redirect('admin/product/list')->with('status', "Bạn đã xóa sản phẩm thành công");
    }


    ///xây dựng hàm edit

    public function editProduct($id)
    {
        $showcate = Caterogy::paginate(10);
        $product = Product::find($id);
        return view('admin.products.edit_product', compact('product'), compact('showcate'));
    }


    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'price' => ['required', 'numeric'],
            'chosefile' => ['required', 'image', 'max:2048'],
            'producer' => ['required', 'string', 'max:200'],
            'rightnow' => ['required', 'string', 'max:200'],
            'intro' => ['required', 'string', 'max:200'],
            'intro_confirm' => ['required', 'string', 'max:200'],
            'status' => ['required', 'string', 'max:200'],
            'category_id' => ['required', 'exists:caterogies,id'], // Sửa thành exists:categories,id
        ], [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được vượt quá :max kí tự',
            'numeric' => ':attribute phải là một số nguyên',
            'integer' => ':attribute phải là một số nguyên',
            'image' => ':attribute phải là một hình ảnh',
        ], [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá sản phẩm',
            'chosefile' => 'Ảnh sản phẩm',
            'producer' => 'Nhà sản xuất',
            'rightnow' => 'Trạng thái sản phẩm',
            'intro' => 'Giới thiệu sản phẩm',
            'intro_confirm' => 'Chi tiết sản phẩm',
            'status' => 'Tình trạng sản phẩm',
            'category_id' => 'Danh mục sản phẩm',
        ]);

        $category_id = $request->input('category_id');
        // Tiếp tục xử lý và lưu dữ liệu vào cơ sở dữ liệu
        //thực hiện kiểm tra và đẩy ảnh vào database

        // if ($request->hasFile('chosefile')) {
        //     // $imagePath = $request->file('chosefile')->storeAs('public/image', $request->file('chosefile')->getClientOriginalName());
        //     // $file_name = $request->file('chosefile')->getClientOriginalName();
        //     $imagePath = basename($_FILES['chosefile']['name']);
        // } else {
        //     $imagePath = null;
        // }

        $file = $request->file('chosefile'); // Lấy file từ request

        if ($file) {
            $file_name = $file->getClientOriginalName();

            // Kiểm tra xem thư mục public/uploads đã tồn tại chưa
            $directory = 'uploads';
            if (!File::exists($directory)) {
                // Nếu thư mục không tồn tại, hãy tạo nó
                File::makeDirectory($directory);
            }

            // Di chuyển tệp tải lên vào thư mục public/uploads
            $path = $file->move($directory, $file_name);

            // Tạo đường dẫn của ảnh từ thư mục uploads
            $thumbnail = $directory . '/' . $file_name;
        } else {
            $thumbnail = null; // Nếu không có tệp tải lên, sử dụng giá trị null cho thumbnail
        }


        Product::where('id', $id)->update([
            'nameproduct' => $request->input('name'),
            'price' => $request->input('price'),
            'image' => $thumbnail,
            'producer' => $request->input('producer'),
            'rightnow' => $request->input('rightnow'),
            'productdescription' => $request->input('intro'),
            'detailproductdescription' => $request->input('intro_confirm'),
            'neworold' => $request->input('status'),
            'id_cate' => $category_id
        ]);
        return redirect('admin/product/list')->with('status', "Bạn đã sửa dữ liệu thành công rồi nè <3");
    }
}


//