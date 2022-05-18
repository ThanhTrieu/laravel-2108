<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Role;
use App\Models\Production;

class EloquentController extends Controller
{
    public function query()
    {
        $user = Role::find(1)->admins;
        dd($user->toArray());
        
        $roles = Admin::find(2)->roles()->orderBy('name')->get();
        dd($roles->toArray());

        $pd = Production::find(1); // san pham id bang 1
        dd($pd->brand->logo); // lay ra dc logo thuong hieu cua san pham day

        // $product = Brand::find(1)->productions;
        // // lay ra san pham co id brand = 1
        // dd($product);
        // foreach ($product as $key => $p) {
        //     echo $p->id;
        // }
    
        // $data = Admin::all();
        // if($data){
        //     // convert to array
        //     dd($data->toArray()); // chi danh orm
        // }
        
    }

    public function addUser()
    {
        return view('test.add-user');
    }

    public function handleAdd(Request $request, Admin $admin)
    {
        //dd($request->all());
        /*
        $admin->username = $request->input('username');
        $admin->password = $request->input('password');
        $admin->save(); // luu vao db
        */
        // Mass Assignment
        Admin::create($request->all());

        // tim ban ban ghi - khong co thi se insert
        Admin::firstOrCreate($request->all());
        // firstOrNew

        // tim ban ban ghi - khong co tra ve 1 instance cua admin va goi save de insert
        $user2 = Admin::firstOrCreate($request->all());
        $user2->save(); //

        // tu dong kiem tra xem la update hay insert data
        Admin::updateOrCreate($request->all());
    }
}
