<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('test.login.user')->only('watchFilm');
        $this->middleware('test.login.user')->except(['index','login']);
    }

    public function index(Request $request)
    {
        // input : nhan request tu form gui len
        // nhan tham so dc truyen truc tiep tu url thi ko can input
        $name = $request->name; //$request->input('name');
        $id   = $request->id; //$request->input('id');
        //dd($name, $id); // var_dump + die ;
        //return "This is class " . __CLASS__;
        return view('test.index'); // di qua thu muc test va file index.blade.php ben trong (luon luon nam trong thu muc resource/view)
    }

    public function login(Request $request)
    {
        $username = $request->username; //$request->input('username');
        $password = $request->password; //$request->input('password');
        if($username === 'admin' && $password === '123'){
            $request->session()->put('user', $username);
            //$_SESSION['user'] = $username;
            return redirect()->route('test.watchFilm');
        }
        return redirect()->route('test.home',['name' => 'a', 'id' => 1]);
    }

    public function watchFilm()
    {
        return "OK";
    }
}
