<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Permission;
class SwitchRoleController extends Controller
{
    public function index(Request $request)
    {
        // lay ra toan bo roles cua user vua dang nhap
        // lay id cua user duoc luu vao session
        $idUser = $request->session()->get('sessionIdUser');
        // dd($idUser);
        $roles = Admin::find($idUser)->roles()->orderBy('name')->get();


        // $permission = $roles->permissions;
        // dd($permission);
        // dd($roles);

        //neu ma ton tai session chose role - xoa di
        if($request->session()->get('permissionSessionUser'))
        {
            $request->session()->forget('permissionSessionUser');
            $request->session()->forget('namePermissionSession');

        }
        return view('admin.switch-role',[
            'roles'=>$roles,
        ]);
    }
    public function handleSwitchRole(Request $request)
    {
        $idRole = $request->id;
        $roles = Role::findOrFail($idRole);
        if($roles === null)
        {
            return redirect()->back()->with('errorSwitchRole','role not found');
        }else
        {
            $permission = Role::find($idRole)->permissions()->orderBy('name')->get();
            // dd($permission->toArray());
            if($permission == null)
            {
                return redirect()->back()->with('errorSwitchRole','permission not found');
            }else
            {
                $arrPermisson = $permission->toArray();
                $arrSessionPermissions = array_column($arrPermisson,'slug');
                // dd($arrSessionPermissions);
                $request->session()->put('permissionSessionUser',$arrSessionPermissions);
                $request->session()->put('namePermissionSession',$roles->name);
                return redirect()->route('admin.dashboard');
            }
        }
    }
}
