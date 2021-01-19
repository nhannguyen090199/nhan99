<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
</head>
<body>
<div class="container"  style="margin-top: 40px;">
    <h3>Thêm tin tức</h3>
    @if(count($errors)>0)
        @foreach($errors->all as $erro)
            <li>{{$erro}}</li>
        @endforeach
    @endif

    <table id="table">
        <tr>
            <td><h5>Mã tin</h5></td>
            <form method="post" enctype="multipart/form-data"  accept="image/*">
                {{ csrf_field() }}
                <td><input type="text" class="form-control" name="id"  disabled ></td>
        </tr>
        <tr>
            <td><h5>Tiêu đề</h5></td>
            <td><input type="text" name="title" class="form-control"  ></td>
        </tr>
        <tr>
            <td><h5>Hình ảnh</h5></td>
            <td>
                <input type="file" name="image" class="form-control" onchange="changeImg(this)" >
                <img id="img"   style="width: 200px; ">
                <span style="color: #ff0000"></span>
            </td>
        </tr>
        <tr>
            <td><h5>Tóm tắt</h5></td>
            <td>
                <textarea class="form-control" rows="3" name="summary"></textarea></td>
        </tr>
        <tr>
            <td><h5>Nội dung</h5></td>
            <td>
                <textarea class="form-control" rows="5" name="content"></textarea>
            </td>
        </tr>
        <tr>
            <td><h5>Loại tin tức</h5></td>
            <td>
                <select name="cate" id="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>

                </select>
            </td>
        </tr>
    </table>

    <input type="submit" value="Thêm" class="btn btn-primary ">
    </form>
</div>
</body>

<script>
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
</html>

