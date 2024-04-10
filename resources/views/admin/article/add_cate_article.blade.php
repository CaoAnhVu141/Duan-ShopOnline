@extends('layouts.admin')

@section('content')
  
<script src="https://cdn.tiny.cloud/1/vx74jfnkcu6t4ii0bxesy8leneqkwz5ncnjpimah056yke9s/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
  
{{-- <script>tinymce.init({selector:'textarea',
    // width: 1000,
    height: 450,
    plugins: [
      'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
      'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
      'media', 'table', 'emoticons', 'help'
    ],
    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
      'forecolor backcolor emoticons | help',
    menu: {
      favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
    },
    menubar: 'favs file edit view insert format tools table help',
    content_css: 'css/content.css'});</script> --}}
    
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm danh mục bài viết
        </div>
        <div class="card-body">
            <form action="{{ url('admin/post/cat/store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Tiêu đề danh mục</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="content">Nội dung bài viết</label>
                    <textarea name="content" class="form-control" id="content" cols="30" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-warning">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection