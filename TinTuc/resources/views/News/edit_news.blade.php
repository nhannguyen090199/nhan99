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
<div class="container"  style="margin-top: 40px;">
    <h3>{{$edit_news->title}}</h3><hr>

        <table id="table">
            <tr>
                <td><h5>Mã tin</h5></td>
                <form method="post" enctype="multipart/form-data"  accept="image/*">
                    {{ csrf_field() }}
                <td><input type="text" class="form-control" name="id" value="{{$edit_news->news_id}}" disabled ></td>
            </tr>
            <tr>
                <td><h5>Tiêu đề</h5></td>
                <td><input type="text" name="title" class="form-control" value="{{$edit_news->title}}" ></td>
            </tr>
            <tr>
                <td><h5>Hình ảnh</h5></td>
                <td>
                    <input type="file" name="image" class="form-control" onchange="changeImg(this)" >
                    <img id="img"  src="{{asset('img/'.$edit_news->img)}}" style="width: 200px; ">
                    <span style="color: #ff0000"></span>
                </td>
            </tr>
            <tr>
                <td><h5>Tóm tắt</h5></td>
                <td>
                    <textarea class="form-control" rows="3" name="summary">{{$edit_news->summary}}</textarea></td>
            </tr>
            <tr>
                <td><h5>Nội dung</h5></td>
                <td>
                    <textarea class="form-control" rows="5" name="content">{{$edit_news->content}}</textarea>
                </td>
            </tr>
            <tr>
                <td><h5>Loại tin tức</h5></td>
                <td>
                    <select name="cate" id="">
                        @foreach($cate as $cate)
                            <option value="{{$cate->cate_id}}"
                            @if($cate->cate_id==$edit_news->news_cate) selected @endif>{{$cate->cate_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>

        <input type="submit" value="Lưu" class="btn btn-primary ">
    </form>
</div>
    <script>
        @if(session('mess'))
        alert('{{session('mess')}}');
        @endif
        function changeImg(file){
            let files=file.files[0];
            var reader=new FileReader();
            if(files.type.search('image')>=0) {

                reader.onload = function (e) {
                    $('#img').attr('src', e.target.result);
                }
                reader.readAsDataURL(files);
                    $('span').hide();
                $('#img').show();
            }
            else {
                $('#img').hide();
                $('span').show();
                $('span').html('Phải lựa chọn file ảnh!!');

            }
        }

    </script>
@stop
