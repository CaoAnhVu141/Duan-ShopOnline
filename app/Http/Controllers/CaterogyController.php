<?php

namespace App\Http\Controllers;

use App\Models\Caterogy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaterogyController extends Controller
{
    //

    public function showAddCaterogy()
    {
        return view('caterogy.list_cate');
    }

    //xây dựng hàm show data danh sách danh mục

    public function showDSCate(Request $request)
    {
        // $showcate = Caterogy::paginate(3);

        $status = $request->input('status');
        if($status == "trash")
        {
            $showcate = Caterogy::onlyTrashed()->paginate(10);
        }
        else{
            $keyword = "";
            if($request->input('keyword'))
            {
               $keyword = $request->input('keyword');
            }
        $showcate = Caterogy::where('namecaterogy', 'LIKE' , "%$keyword%")->paginate(3);

        }
       
    //     $users = User::where('name', 'LIKE', "%$keyword%")->paginate(10);
    // }


       //dem so luong
       $count_active = Caterogy::count();
       $count_trash = Caterogy::onlyTrashed()->count();
       $count = [$count_active,$count_trash];

        return view('caterogy.caterogy_list',compact('showcate','count'));
        
        
    }


    //xây dựng hàm thêm danh mục 

     function addCaterogy(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:200'],
            'intro' => ['required','string','max:200'],
           ],[
                'required' => ':attribute Không được để trống',
                'min' => ':attribute có độ dài ít nhất :min kí tự',
                'max' => ':attribute có độ dài :max kí tự',
           ],[
              'name' => 'Tên danh mục',
              'intro' => 'Chi tiết danh mục',
           ]);
            Caterogy::create([
            'namecaterogy' => $request->input('name'),
            'describe' => $request->input('intro'),
        ]);

        return redirect('admin/product/list')->with('status',"Bạn đã thêm dữ liệu thành công");
    }


    //xây dựng hàm xóa dữ liệu

    public function deleteCaterogy($id)
    {
       if(Auth::id ()!= $id)
       {
          $id = Caterogy::find($id);
          $id->delete();
          return redirect('/admin/caterogy/cat/list')->with('status',"Bạn đã xóa thành công rồi nè");
       }else{
        return redirect('/admin/caterogy/cat/list')->with('status',"Bạn chưa xóa thành công rồi nè");
         
       }
    }


    //xây dựng hàm edit 

    public function editCate($id)
    {
        $cate_rogy = Caterogy::find($id);
        return view('caterogy.edit_caterogy',compact('cate_rogy'));
    }

    //xây dựng hàm update cho danh mục

    public function updateCate(Request $request,$id)
    {
        $request->validate([
            'name' => ['required','string','max:200'],
            'intro' => ['required','string','max:200'],
           ],[
                'required' => ':attribute Không được để trống',
                'min' => ':attribute có độ dài ít nhất :min kí tự',
                'max' => ':attribute có độ dài :max kí tự',
           ],[
              'name' => 'Tên danh mục',
              'intro' => 'Chi tiết danh mục',
           ]);
           Caterogy::where('id',$id)->update([
            'namecaterogy'=>$request->input('name'),
            'describe'=>$request->input('intro'),
           ]);
           return redirect('admin/caterogy/cat/list')->with('status',"Bạn đã sửa dữ liệu thành công rồi nha");
    }
}
