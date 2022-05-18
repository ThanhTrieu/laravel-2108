<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $sessionUser = $request->session()->get('sessionEmailUser');
        $students = [
            [
                'id' => 1,
                'name' => '<h1><i>Van Teo</i></h1>',
                'email' => 'vanteo@gmail.com',
                'address' => 'Ha Noi',
                'age' => 20,
                'gender' => 1,
                'money' => 2000000
            ],
            [
                'id' => 2,
                'name' => 'Van Ty',
                'email' => 'vanty@gmail.com',
                'address' => 'Hai Phong',
                'age' => 19,
                'gender' => 1,
                'money' => 3000000
            ],
            [
                'id' => 3,
                'name' => 'Van Hoi',
                'email' => 'vanhoi@gmail.com',
                'address' => 'Hai Duong',
                'age' => 19,
                'gender' => 0,
                'money' => 2000000
            ],
            [
                'id' => 4,
                'name' => 'Van Suu',
                'email' => 'vansuu@gmail.com',
                'address' => 'Ha Nam',
                'age' => 19,
                'gender' => 0,
                'money' => 1500000
            ]
        ];

        return view('admin.dashboard.index',[
            'user' => $sessionUser,
            'students' => $students
        ]);
    }

    public function search(Request $request)
    {
        // kiem tra xem co phai phuong truy cap la ajax
        if($request->ajax()){
            $data = $request->key;
            // response
            return response()->json([
                'data' => $data
            ]);
        }
    }
}
