@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm sản phẩm
        </div>
        <div class="card-body">
            <form action="{{ route('update_Pro',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="name" value="{{ $product->nameproduct }}" id="name1">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input class="form-control" type="text" name="price" value="{{ $product->price }}" id="price">
                            @error('price')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="intro">Mô tả sản phẩm</label>
                            <textarea class="form-control" name="intro" id="intro" cols="30" rows="5">{{ $product->productdescription }}</textarea>
                            @error('intro')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
        
                <div class="form-group">
                    <label for="intro_confirm">Chi tiết sản phẩm</label>
                    <textarea class="form-control" name="intro_confirm"  id="intro_confirm" cols="30" rows="5">{{ $product->detailproductdescription }}</textarea>
                    @error('intro_confirm')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="image">Chọn ảnh sản phẩm:</label>
                    <input type="file" class="form-control-file" id="chosefile" value="{{ $product->image }}"  name="chosefile">
                    @error('chosefile')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <label for="image">Chọn ảnh sản phẩm:</label>
                    <input type="file" class="form-control-file" id="chosefile" name="chosefile">
                    @if($product->image)
                        <small class="text-muted">Ảnh hiện tại: {{ $product->image }}</small>
                    @endif
                    @error('chosefile')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                

                <div class="form-group">
                    <label for="rightnow">Nhà sản xuất</label>
                    <input class="form-control" type="text" name="producer" value="{{ $product->producer }}" id="producer">
                    @error('producer')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="rightnow">Trạng thái</label>
                    <input class="form-control" type="text" name="rightnow" value="{{ $product->rightnow }}" id="rightnow">
                    @error('rightnow')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="category_id">Danh mục</label>
                    <select class="form-control" id="category_id"  name="category_id">
                        <option value="">Chọn danh mục</option>
                        @foreach ($showcate as $category)
                        <option value="{{ $category->id }}" {{ $product->id_cate == $category->id ? 'selected' : '' }}>{{ $category->namecaterogy }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label>Tình trạng</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="newProduct" value="Hàng mới" checked>
                        <label class="form-check-label" for="newProduct">
                            Hàng mới
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="oldProduct" value="Hàng cũ">
                        <label class="form-check-label" for="oldProduct">
                            Hàng cũ
                        </label>
                    </div> 
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
        
    </div>
</div>
@endsection
