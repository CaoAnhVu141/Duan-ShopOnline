<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    //
    ///hàm để showdata từ database
    public function showAdmin(Request $request)
    {
        $status = $request->input('status');
        if ($status == "trash") {
            $users = User::onlyTrashed()->paginate(10);
        } else {
            $keyword = "";
            if ($request->input('keyword')) {
                $keyword = $request->input('keyword');
            }
            $users = User::where('name', 'LIKE', "%$keyword%")->paginate(10);
        }

        $count_active = User::count();
        $count_trash = User::onlyTrashed()->count();
        $count = [$count_active, $count_trash];
        return view('admin.user.list_user', compact('users', 'count'));
    }



    ///hàm thêm danh sách users

    public function addUsers()
    {
        return view('admin.user.add_users');
    }


    ///thực hiện thêm database

    function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'required' => ':attribute Không được để trống',
            'min' => ':attribute có độ dài ít nhất :min kí tự',
            'max' => ':attribute có độ dài :max kí tự',
            'confirmed' => 'Xác nhận mật khẩu không trùng khớp',
        ], [
            'name' => 'Tên người dùng',
            'email' => 'Email',
            'password' => 'Mật khẩu',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        //chuyển hướng sang trang mới
        return redirect('admin/user/list')->with('status', "Bạn đã thêm dữ liệu thành công rồi nè <3");
    }



    ///  thực hiện xóa dữ liệu 

    public function delete($id)
    {
        if (Auth::id() != $id) {
            $user = User::find($id);
            $user->delete();
            return redirect('admin/user/list')->with('status', "Bạn đã xóa dữ liệu thành công");
        } else {
            return redirect('admin/user/list')->with('status', "Bạn không thể xóa dữ liệu");
        }
    }

    //xây dựng hàm xóa và khôi phục dữ liệu

    public function action(Request $request)
    {
        $list_check = $request->input('check_list');

        if ($list_check) {
            foreach ($list_check as $check => $id) {
                if (Auth::id() == $id) {
                    unset($data[$check]);
                }
            }
            if (!empty($data)) {
                $act = $request->input('act');
                if ($act == 'delete') {
                    User::destroy($list_check);
                    return redirect('admin/user/list')->with('status', "Bạn đã xóa data thành công rồi");
                }
                if ($act == 'restore') {
                    User::withTrashed()->where('id', $list_check)->restore();
                    return redirect('admin/user/list')->with('status', "Bạn đã khôi phục data thành công rồi");
                }
            }
        }
    }


    //xây dựng hàm sửa dữ liệu

    public function edit($id)
    {

        $user = User::find($id);

        return view('admin.user.edit_users', compact('user'));
    }


    //xây dựng hàm update rồi link qua bên view

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
        ], [
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải có ít nhất :min kí tự',
            'max' => ':attribute không được quá :max kí tự',
            'confirmed' => 'Xác nhận mật khẩu không trùng khớp',
        ], [
            'name' => 'Tên người dùng',
            'password' => 'Mật khẩu',
            'password_confirmation' => 'Xác nhận mật khẩu',
        ]);

        User::where('id', $id)->update([
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect('admin/user/list')->with('status', "Bạn đã sửa data thành công.");
    }
}
