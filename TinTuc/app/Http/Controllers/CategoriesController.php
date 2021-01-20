<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Categorie;

/**
 * Class CategoriesController
 * @package App\Http\Controllers
 */
class CategoriesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $cate = Categorie::all();
        return view('categories.categories',['cate'=>$cate]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addCategories(){
        return view('categories.add_categories');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postAddCategories(Request $request){
        $cate = new Categorie;
        $cate->cate_name = $request->cate_name;
        $cate->status = 0;
        $cate->save();
        return redirect('admin/chuyenmuc')->with('mess','Đã thêm thành công!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editCategories($id){
        $cate = Categorie::where('cate_id',$id)->first();
        return view('categories.edit_categories',['cate'=>$cate]);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postEditCategories($id,Request $request){
        Categorie::where('cate_id',$id)->update(['cate_name'=>$request->cate_name]);
        return redirect('admin/chuyenmuc')->with('mess','Sửa thành công');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteCategories($id){
        Categorie::where('cate_id',$id)->delete();
        return redirect('admin/chuyenmuc')->with('mess','Xóa thành công');
    }
}
