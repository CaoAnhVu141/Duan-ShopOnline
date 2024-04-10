@extends('layouts.admin')

@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách danh mục sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="text" class="form-control form-search" placeholder="Tìm kiếm" name="keyword" value="{{request()->input('keyword') }}">
                    <input type="submit" name="btn-search" value="Tìm kiếm"  class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                     $count =0;   
                    @endphp
                    @foreach ($product as $item)
                    @php
                    $count ++;   
                   @endphp
                    <tr>
                        <th scope="row">{{$count }}</th>
                        {{-- <td><img src="{{ asset('image/' . $item->image) }}" alt="" height="100px" width="100px"></td> --}}
                        <td><img src="{{ url($item->image) }}" alt="" height="100px" width="100px"></td>
                        {{-- <td><img src="{{ asset('image/' . $item->image) }}" alt="" height="100px" width="100px"></td> --}}

                        <td>{{ $item->nameproduct }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->id_cate }}</td>
                        <td><span class="badge badge-info">{{ $item->rightnow }}</span></td>
                        <td><span class="badge badge-warning">{{ $item->neworold }}</span></td>
                        <td>
                            <a href="{{ route('edit_Pro',$item->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button" onclick="return confirm('Bạn có muốn thực hiện sửa không nè')" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('delete_Pro',$item->id) }}" class="btn btn-danger btn-sm rounded-0 text-white" type="button" onclick="return confirm('Bạn có muốn thực hiện xóa không nè')" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>

                        </td>
                    </tr>
                    @endforeach
                
                </tbody> 
            </table>
            {{ $product->links() }}

        </div>
    </div>
</div>
@endsection

