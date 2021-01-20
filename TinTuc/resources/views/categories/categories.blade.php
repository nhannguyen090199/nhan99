@extends('news.master')
@section('main')
    <div  style="width: 100%;">
        <h2>DANH SÁCH CHUYÊN MỤC </h2>
        <a href="{{asset('admin/them-chuyenmuc')}}" class="btn btn-primary">Thêm chuyên mục</a>
        <table class="table table-bordered">
            <tr style="background-color: #a0aec0; text-align: center">
                <td width="5%">ID</td>
                <td width="10%">Chuyên mục</td>
                <td width="2%">Trạng thái</td>
                <td width="1%"></td>
                <td width="1%"></td>
            </tr>
            @foreach($cate as $cate)
                <tr>
                    <td>{{$cate->cate_id}}</td>
                    <td>{{$cate->cate_name}}</td>
                    <td>{{$cate->status}}</td>
                    <td><a href="{{asset('admin/sua-chuyenmuc/'.$cate->cate_id)}}">Sửa</a></td>
                    <td><a href="{{asset('admin/xoa-chuyenmuc/'.$cate->cate_id)}}">Xóa</a></td>
                </tr>
            @endforeach

        </table>
    </div>
    <script>
        @if(session('mess'))
        alert('{{session('mess')}}') ;
        @endif
    </script>
@stop


