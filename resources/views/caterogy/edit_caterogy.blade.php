@extends('layouts.admin')

@section('content')
    
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm danh mục sản phẩm
        </div>
        <div class="card-body">
            <form action="{{route('update_Cate',$cate_rogy->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ $cate_rogy->namecaterogy }}">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="intro">Mô tả danh mục</label>
                            <textarea  class="form-control" name="intro" id="intro" cols="30" rows="5">{{ $cate_rogy->describe }}</textarea>
                            @error('intro')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection