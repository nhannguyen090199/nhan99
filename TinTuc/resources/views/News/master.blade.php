<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
<div  style="margin-top: 20px;width: 100%">
    <h2 style="padding: 10px;border: 1px solid">ADMIN</h2>
<div class="row">
    <div class="col-3" style="background-color: #b5bac3">
        <h4><a href="{{asset('/admin/tintuc')}}">Quản lý tin tức</a></h4>
        <h4><a href="{{asset('admin/chuyenmuc')}}">Quản lý chuyên mục</a></h4>
    </div>
    <div class="col-9">
        @yield('main')
    </div>
</div>
</div>
</body>
<script>

</script>
</html>

