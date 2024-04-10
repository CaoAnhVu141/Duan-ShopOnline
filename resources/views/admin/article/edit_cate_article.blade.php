@extends('layouts.admin')

@section('content')
  
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm danh mục bài viết
        </div>
        <div class="card-body">
            <form action="{{ route('update_CateAticle',$cate_article->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Tiêu đề danh mục</label>
                    <input class="form-control" type="text" name="name" value="{{ $cate_article->nameartical }}" id="name">
                </div>
                <div class="form-group">
                    <label for="content">Nội dung bài viết</label>
                    <textarea name="content" class="form-control" id="content" cols="30" rows="5">{{ $cate_article->articaldescription }}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-warning">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection