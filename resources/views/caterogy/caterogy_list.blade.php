@extends('layouts.admin')

@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        @if (session('status'))
        <div class="alter alter-success">{{session('status')}}</div>
        @endif
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0">Danh sách sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="text" class="form-control form-search mr-2" name="keyword" placeholder="Tìm kiếm" value="{{request()->input('keyword') }}">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary align-self-end">
                </form>
            </div>
        </div>
        
        <div class="card-body">
            <div class="analytic">
                <a href="{{ request()->fullUrlWithQuery(['status'=>'active']) }}" class="text-primary">Hoạt động <span class="text-muted">{{ $count[0] }}</span></a>
                <a href="{{ request()->fullUrlWithQuery(['status'=>'trash']) }}" class="text-primary">Đã xóa <span class="text-muted">{{ $count[1] }}</span></a>
               
            </div>
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Mô tả danh mục</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tác vụ</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                     $count =0;   
                    @endphp
                    @foreach($showcate as $showcates)
                    <tr class="">
                        @php
                        $count ++;   
                        @endphp
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>{{$count }}</td>
                        
                        <td>{{$showcates->namecaterogy }}</td>
                        <td>{{$showcates->describe }}</td>
                        <td>{{$showcates->created_at }}</td>
                        <td>
                            <a href="{{ route('edit_Cate',$showcates->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button" onclick="return confirm('Bạn có muốn thực hiện sửa không nè')" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('delete_Cate',$showcates->id) }}" class="btn btn-danger btn-sm rounded-0 text-white" type="button" onclick="return confirm('Bạn có muốn thực hiện xóa không nè')" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                       
                </tbody>
            </table>
            {{$showcate->links() }}
        </div>
    </div>
</div>
@endsection

