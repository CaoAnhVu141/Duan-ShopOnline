<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CateArticle;


class AdminCateArticleController extends Controller
{
    //
    //xây dựng hàm show add danh mục bài viết
    public function showAddCateArticle()
    {
        return view('admin.article.add_cate_article');
    }

    //xây dựng hàm thực thi add danh mục bài viết

    public function addListCateArticle(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:200'],
            'content' => ['required','string','max:500'],
           ],[
                'required' => ':attribute Không được để trống',
                'min' => ':attribute có độ dài ít nhất :min kí tự',
                'max' => ':attribute có độ dài :max kí tự',
           ],[
              'name' => 'Tên danh mục',
              'content' => 'Chi tiết danh mục',
           ]);

           CateArticle::create([
            'nameartical'=>$request->input('name'),
            'articaldescription'=>$request->input('content')
           ]);

        return redirect('admin/post/cat/list')->with('status',"Bạn đã thêm danh mục thành công");
    }


    ///xây dựng hàm show toàn bộ danh sách bài viết

    public function showCaterogyArticle()
    {
        $cate_article = CateArticle::paginate(5);
        return view('admin.article.list_cate_article',compact('cate_article'));
    }

    ///xây dựng hàm xóa danh sách bài viết

    public function deleteCateArticle($id)
    {
        $cate_article = CateArticle::find($id);

        if(!$cate_article)
        {
            return redirect('admin/post/cat/list')->with('status',"Bạn chưa xóa thành công rồi nè");
        }

        $cate_article->delete();

        return redirect('admin/post/cat/list')->with('status',"Bạn đã xóa thành công rồi nè");

    }

  //xây dựng hàm edit cho danh mục bài viết

  public function editCateArticle($id)
  {
    $cate_article = CateArticle::find($id);
    return view('admin.article.edit_cate_article',compact('cate_article'));
  }


    ///xây dựng update danh mục bài viết

    public function updateCateArticle(Request $request,$id)
    {
        $request->validate([
            'name' => ['required','string','max:200'],
            'content' => ['required','string','max:500'],
           ],[
                'required' => ':attribute Không được để trống',
                'min' => ':attribute có độ dài ít nhất :min kí tự',
                'max' => ':attribute có độ dài :max kí tự',
           ],[
              'name' => 'Tên danh mục',
              'content' => 'Chi tiết danh mục',
           ]);

           CateArticle::where('id',$id)->update([
            'nameartical'=>$request->input('name'),
            'articaldescription'=>$request->input('content')
           ]);
        return redirect('admin/post/cat/list')->with('status',"Bạn đã sửa thành công rồi nè");


    }


}
