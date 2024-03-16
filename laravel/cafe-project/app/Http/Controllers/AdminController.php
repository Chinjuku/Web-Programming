<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    function index() {
        // ดึงข้อมูลจาก table blogs มาใช้งาน
        // $blogs = DB::table('blogs')->paginate(3); // table('blogs')ระบุชื่อตาราง
        // $register = DB::table('register')->get();
        // return view('blog', compact('blogs', 'register'));
        return view('index');
    }
    function createform() {
        return view('form');
    }
    // form validation
    function insert(Request $request) {
        $request->validate( //function validate
            // 'required'ต้องใส่ค่าทุกครั้ง , 'max:50' ห้ามใส่ข้อความเกิน 50 ตัวอักษร
            // ถ้าไม่มีค่าด้านใน จะส่งerrorออกไป
            [
            'title' => 'required|max:50', 
            'content' => 'required'
            ],
            [
                'title.required' => 'กรุณาป้อนชื่อบทความสิ',
                'title.max' => 'ชื่อบทความไม่ควรเกิน 50 ตัวอักษร',
                'content.required' => 'กรุณาป้อนเนื้อหาบทความสิ',
            ]
        );
        // if ($request != null) {
            DB::table('blogs')->insert(
                [   
                    'title' => $request->title,
                    'content' => $request->content, 
                    // 'status' => 1,
                    // 'create_at' => ,
                ],
            );
            return redirect('/');
        // }
    }
    function delete($id) {
        // dd($id); // dd() -> แสดงข้อมูล id
        DB::table('blogs')->where('id' , $id )->delete(); //ดึงข้อมูลมา delete
        return redirect('/');
    }
    function change($id) {
        // dd($id); // dd() -> แสดงข้อมูล id
        $getblogs = DB::table('blogs')->where('id', $id )->first(); //ดึงข้อมูลที่จะ update
        $data = [
            'status' => !$getblogs->status,
        ];
        DB::table('blogs')->where('id', $id )->update($data); //ดึงข้อมูลมา update
        return redirect('/');
    }
    // Edit data form
    function edit($id)  {
        $getblogs = DB::table('blogs')->where('id', $id )->first();
        // dd($getblogs);
        return view('edit', compact('getblogs'));
    }
    function updateForm(Request $request, $id) {
        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];
        DB::table('blogs')->where('id', $id )->update($data);
        return redirect('/');
    }
}
