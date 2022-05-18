<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $permission = 0)
    {
        // middleware se nhan param chinh id permission truyen len
        // id permission se dc chung ta dinh nghia trong code dua vao bang database permission

        // kiem tra id permission voi session luu tru toan bo id permission cua account
        // de biet duoc no se co nhung quyen gi
        $strSessionPermission = $request->session()->get('permissionSessionUser');
        $arrSessionPermission = explode(',', $strSessionPermission);
        if(!in_array($permission, $arrSessionPermission)){
            // dieu huong sang trang thong bao ko co quyen truy cap
            return redirect()->route('admin.not.permission');
        }
        return $next($request);
    }
}
