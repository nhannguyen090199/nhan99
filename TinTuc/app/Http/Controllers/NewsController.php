<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;

/**
 * Class NewsController
 * @package App\Http\Controllers
 */
class NewsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $news = News::all();
        return view('news.index',['news'=>$news]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editNews($id){
        $edit_news = News::where('news_id',$id)->first();
        $cate = Categorie::all();
        return view('news.edit_news',['edit_news'=>$edit_news, 'cate'=>$cate]);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEditNews($id, Request $request){
        if($request->hasFile('image')){
            $file_name = $request->image->getClientOriginalName();
            $request->image->move(public_path('img'), $file_name);
            $news['img'] = $file_name;
        }
        $news['title'] = $request->title;
        $news['summary'] = $request->summary;
        $news['content'] = $request->content;
        News::where('news_id',$id)->update($news);
        $request->session()->flash('mess','Đã sửa thành công!');
        return back();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addNews(){
        $cate = Categorie::all();
        return view('news.add_news',['cate'=>$cate]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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
        $request->session()->flash('mess','Đã thêm thành công!');
        return redirect('/admin/tintuc');

    }

    /**
     * @param Request $request
     */
    public function deleteModal(Request $request){
        $news = News::where('news_id',$request->id)->first();
        echo  $news;
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteNews($id){
        News::where('news_id',$id)->delete();
        return redirect('admin/tintuc')->with('mess','Đã xóa thành công!');
    }
}
