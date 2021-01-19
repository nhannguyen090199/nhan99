<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(){
        $news = News::all();
        return view('News.index',['news'=>$news]);
    }
    public function editNews($id){
        $edit_news = News::where('news_id',$id)->first();
        return view('News.edit_news',['edit_news'=>$edit_news]);
    }
    public function postEditNews($id, Request $request){
        $request->validate([
            'image'=> 'required'
        ]);
        $file_name = $request->image->getClientOriginalName();;
        $request->image->move(public_path('img'), $file_name);
        $news = News::where('news_id',$id)->update(['title'=>$request->title,
            'summary'=>$request->summary,'content'=> $request->content,'img'=> $file_name]);
        return back()->with('mess','Sửa thành công!!');
    }
    public function addNews(){
        return view('News.add_news');
    }
    public function postAddNews(Request $request){
        $request->validate([
            'title'=>'required',
            'image' =>'required',
            'summary'=>'required',
            'content'=>'required',
        ]);
        $news = new News;
        $news->title = $request->title;
        $news->summary = $request->summary;
        $news->content = $request->content;
        $news->news_cate = $request->cate;
        $news->view = 0;

        $name_img=$request->image->getClientOriginalName();
        $news->img = $name_img;
        $request->image->move(public_path('img'),$name_img);
        $news->save();
        return redirect('/admin/tintuc')->with('mess','thêm thành công');

    }
    public function deleteNews($id){
        News::where('news_id',$id)->delete();

        return redirect('admin/tintuc')->with('mess','Xóa thành công!');
    }
}
