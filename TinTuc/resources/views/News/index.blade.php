<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        @if(session('mess'))
            alert('{{session('mess')}}') ;
        @endif
    </script>
    </head>
    <body>
    <div  style="margin-top: 40px;width: 100%;">

        <h2>DANH SÁCH TIN TỨC</h2>
        <a href="{{asset('admin/them-tintuc')}}" class="btn btn-primary">Thêm tin tức</a>
        <table class="table table-bordered">
            <tr style="background-color: #a0aec0; text-align: center">
                <td width="5%">ID</td>
                <td width="10%">Tiêu đề</td>
                <td width="20%">Tóm tắt</td>
                <td width="10%">Hình ảnh</td>
                <td width="50%">Nội dung</td>
                <td width="5%">Loại tin</td>
                <td width="5%">Lươt xem</td>
                <td width="5%">Lươt xem</td>
            </tr>
            @foreach($news as $news)
            <tr>
                <td>{{$news->news_id}}</td>
                <td><a href="{{asset('admin/sua-tintuc/'.$news->news_id)}}">{{$news->title}}</a></td>
                <td>{{$news->summary}}</td>
                <td> <img src="{{asset('img/'.$news->img)}}" alt="" width="100%">    </td>
                <td>{{$news->content}}</td>
                <td>{{$news->news_cate}}</td>
                <td>{{$news->view}}</td>
                <td><b><a href="{{asset('admin/xoa-tintuc/'.$news->news_id)}}" style="color: red">Xóa</a></b></td>
            </tr>
            @endforeach
        </table>
    </div>
    </body>
</html>
