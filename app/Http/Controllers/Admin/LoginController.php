<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use voku\helper\AntiXSS;
use App\Http\Requests\PostLoginRequest as PostLogin;
use App\Models\Admin;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function handleLogin(PostLogin $request, AntiXSS $antiXSS)
    {
        $user     = $request->input('emailUser');
        $user     = $antiXSS->xss_clean($user);
        $password = $request->input('passwordUser');
        $password = $antiXSS->xss_clean($password);
        
        // kiem tra username co hop le ko?
        $infoUser = Admin::where(['email' => $user])->first();
        // dd($infoUser);
        // query builder tra ve object khong phai array
        if($infoUser !== null){
            // kiem tra mat khau co hop le
            $hasPassword = $infoUser->password; // lay dc mk da ma hoa
            // di so sanh mk da ma hoa nay voi mk gui len tu form login
            if(Hash::check($password, $hasPassword)){
                // oke
                $request->session()->put('sessionEmailUser', $infoUser->email);
                $request->session()->put('sessionIdUser', $infoUser->id);
                $request->session()->put('sessionUser', $infoUser->username);
                // chay vao trang chon vai tro su dung cho he thong
                return redirect()->route('admin.chose.role');
            }
            return redirect()->back()->with('invalidLogin', 'Tai khoan khong ton tai');
        } else {
            // account not exists
            // with : luu vao flash session
            return redirect()->back()->with('invalidLogin', 'Tai khoan khong ton tai');
        }
    }

    public function logout(Request $request)
    {
        // huy session dc tao ra.
        // quay ve trang login
        $request->session()->flush();
        return redirect()->route('admin.login');
    }
}
