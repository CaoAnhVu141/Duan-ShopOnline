<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CateArticle;
use App\Models\Caterogy;
use App\Models\Post;
use Symfony\Component\Console\Input\Input;

class AdminPostController extends Controller
{
    //

    //xây dựng hàm show add bài viết
    public function addArticle()
    {
        $cate_article = CateArticle::paginate(10);
        return view('admin.article.add_article',compact('cate_article'));
    }


    //xây dựng hàm thực thi add data vào bài viết

    public function addDataPost(Request $request)
    {
        $request->validate([
            'name' => ['required','string'],
            'content' => ['required','string','max:10000'],
            'listcate_id' => ['required','string','max:200'],
            'nameauthor' => ['required','string','max:200'],
            'exampleRadios' => ['required','string','max:100'],
           ],[
                'required' => ':attribute Không được để trống',
                'min' => ':attribute có độ dài ít nhất :min kí tự',
                'max' => ':attribute có độ dài :max kí tự',
           ],[
              'name' => 'Tên bài viết',
              'content' => 'Nội dung bài viết',
              'listcate_id' => 'Danh mục bài viết',
              'nameauthor' => 'Tên tác giả',
              'exampleRadios' => 'Trạng thái',

           ]);

           $cate_id = $request->input('listcate_id');

           Post::create([
            'namepost'=>$request->input('name'),
            'maincontent'=>$request->input('content'),
            'author'=>$request->input('nameauthor'),
            'status'=>$request->input('exampleRadios'),
            'id_cate'=> $cate_id,
           ]);

           return redirect('admin/post/list')->with('status',"Bạn thêm thành công rồi nè");
    }


    ///xây dựng hàm show data danh sách danh mục

    public function showDataListPost()
    {
        $data = Post::paginate(10);
        $data_list = Caterogy::paginate(10);
        return view('admin.article.list_article',compact('data'),compact('data_list'));
    }
}
