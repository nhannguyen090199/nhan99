@extends('news.master')
@section('main')
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="modal_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn xóa?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <b>ID:</b> <b id="news_id"></b><br>
                    <b>Tiêu đề:</b> <b id="news_title"></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    <a href="#" class="btn btn-danger" id="delete">Xóa</a>
                </div>
            </div>
        </div>
    </div>

    <div  style="width: 100%;">
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
                <td><button type="button" class="btn btn-danger delete" value="{{$news->news_id}}"  >
                        Xóa
                    </button></td>
{{--                <td><b><a href="{{asset('admin/xoa-tintuc/'.$news->news_id)}}" style="color: red">Xóa</a></b></td>--}}
            </tr>
            @endforeach
        </table>
    </div>
    <script>
        @if(session('mess'))
        alert('{{session('mess')}}') ;
        @endif

        $(document).ready(function (){
            $('.delete').click(function (){
                $('#modal_delete').modal('show');
                var id = $(this).val();
                $.ajax({
                    url: '{{asset('/admin/delete_modal')}}',
                    data: {id: id }
                }).done(function (news){
                    var object = JSON.parse(news);

                    $('#news_id').html(object['news_id']);
                    $('#news_title').html(object['title']);
                    $('#delete').attr('href','{{asset('admin/xoa-tintuc/')}}' +'/'+ object['news_id'] );


                });
            });
        });
    </script>
@stop

