<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function index()
    {
        $datas = Teacher::all();
        return view('teacher.search', compact('datas'));
    }

    public function create(Request $request)
    {
        $datas = [
            'name' => 'Trần Thị An',
            'avatar' => '12t4t82_teacher.jpg',
            'description' => 'Giáo viên toán',
            'specialized' => 'Toán Tin',
            'degree' => 'Thạc sĩ'
        ];

        Teacher::create($datas);
        echo "Đăng ký gv thành công!";
    }
    
    public function delete($id)
    {
        $teachers = Teacher::find($id);
        $teachers->delete();
        Session::flash('msg', 'Xóa thành công giáo viên '.$teachers['name']);
        return redirect(route('teacher.index'));
    }

    public function editForm($id)
    {
        $teacher = Teacher::find($id);
        return view('teacher.edit', compact('teacher'));
    }

    public function edit($id, Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'specialized' => 'required',
            'degree' => 'required',
            'description' => 'required|max:1000',
            'avatar' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            // return redirect(route('teacher.edit-form', ['id' => $id]))->withErrors($validator)->withInput();
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $datas = [
                'name' => $request->input('name'),
                'specialized' => $request->input('specialized'),
                'degree' => $request->input('degree'),
                'description' => $request->input('description')
            ];
            $image = $request->file('avatar');
            $avatar_name = time().'_teacher.'.$image->getClientOriginalExtension();
            $image->move(public_path('avatar/teacher'), $avatar_name);
            $datas['avatar'] = $avatar_name;
            Teacher::whereId($id)->update($datas);
            return redirect(route('teacher.index'));
        }
    }
}
