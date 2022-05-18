<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostPermission as RequestPermission;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permission = Permission::paginate(2);
        return view('admin.permissions.index',[
            'permission' => $permission
        ]);
    }

    public function handleAdd(RequestPermission $request)
    {
        $add = Permission::create($request->all());
        if($add) {
            return redirect()->back()->with('addPermissionSuccess', 'Them thanh cong');
        }
        return redirect()->back()->with('addPermissionFail', 'Them that bai');
    }
}
