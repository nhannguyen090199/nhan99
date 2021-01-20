@extends('news.master')
@section('main')
    <style>
        .form-control{
            width: 600px;
        }
        #table td{
            padding: 5px;
        }

    </style>
    <script>
        @if(session('mess'))
        alert('{{session('mess')}}');
        @endif
    </script>


    <div class="container"  style="margin-top: 40px;">
        <h3>Thêm tin tức</h3>


        <table id="table">
            <tr>
                <td><h5>ID</h5></td>
                <form method="post" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <td><input type="text" class="form-control" name="cate_id" value="{{$cate->cate_id}}" disabled ></td>
            </tr>
            <tr>
                <td><h5>Chuyên mục</h5></td>
                <td><input type="text" name="cate_name" class="form-control" value="{{$cate->cate_name}}" ></td>
            </tr>


        </table>

        <input type="submit" value="Sửa" class="btn btn-primary ">
        </form>
    </div>

<script>
    @if(session('mess'))
        alert('{{session('mess')}}');
    @endif
</script>
@stop



