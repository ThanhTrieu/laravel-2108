<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:create-product');
    }
    public function index()
    {
        return view('admin.account.index');
    }

    public function addAccount()
    {
        $listRoles = Role::all();
        return view('admin.account.add',[
            'roles' => $listRoles
        ]);
    }

    public function handleAdd(Request $request, Admin $admin)
    {
        // cac ban tu xu ly viec kiem tra tinh hop le du lieu 
        // validation laravel
        // gia su cac du lieu deu hop le

        // co 2 cong viec can xu ly
        // CV 1 : them moi du lieu vao bang admins
        // CV 2: them moi du lieu vao bang admin_role
        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $fullName = $request->input('fullname');
        $address = $request->input('address');
        $birthday = $request->input('birthday'); // YYYY-MM-DD
        $birthday = date('Y-m-d', strtotime($birthday)); // YYYY-MM-DD
        $gender = $request->input('gender');
        $gender = $gender === '0' || $gender === '1' ? $gender : '0';
        $roles = $request->input('roles'); // array chua cac vai tro

        // tien hanh upload images - avatar
        // kim tra xem co thuc su upload file ko
        $nameAvatar = null;
        if($request->hasFile('avatar')){
            // kiem tra file co loi ko
            if($request->file('avatar')->isValid()){
                // $extension = $request->file('avatar')->getClientOriginalExtension();
                // thuc su tien hanh upload file
                // lay ra ten file
                $nameAvatar = $request->file('avatar')->hashName();
                // di chuyen vao thu muc
                $request->file('avatar')->store(PATH_UPLOAD_AVATAR);
                // dd($nameAvatar);
            }
        }

        // tien hanh luu database
        // ma hoa mk moi luu vao db
        $hasPassword = Hash::make($password);

        $admin->username = $username;
        $admin->password = $hasPassword;
        $admin->email = $email;
        $admin->phone = $phone;
        $admin->fullname = $fullName;
        $admin->address = $address;
        $admin->birthday = $birthday;
        $admin->avatar = $nameAvatar;
        $admin->gender = $gender;
        // save
        $admin->save();
        $idAdmin = $admin->id; // lay ra id vua tao moi

        // luu vao bang admin_role
        if(is_numeric($idAdmin) && $idAdmin > 0){
            $dataRoles = [];
            foreach ($roles as $role) {
                $dataRoles[] = [
                    'admin_id' => $idAdmin,
                    'role_id' => $role,
                    'created_at' => date('Y-m-d H:i:s')
                ];
            }
            $insert = DB::table('admin_role')->insert($dataRoles);
            if($insert){
                // quay ve trang list user
                return redirect()->route('admin.account')->with('success.add.user', 'Add Success');
            } else {
                // xoa du lieu o bang admin
                $user = Admin::find($idAdmin);
                $user->delete();
                // xoa anh da upload
                if(Storage::exists(PATH_UPLOAD_AVATAR.'/'.$nameAvatar)){
                    Storage::delete(PATH_UPLOAD_AVATAR.'/'.$nameAvatar);
                }
                // quay ve lai dung form add
                return redirect()->route('admin.add.account')->with('error.add.user', 'Add Failed admin role table');
            }
        } else {
            // delete anh avatar da upload
            if(Storage::exists(PATH_UPLOAD_AVATAR.'/'.$nameAvatar)){
                Storage::delete(PATH_UPLOAD_AVATAR.'/'.$nameAvatar);
            }
            return redirect()->route('admin.add.account')->with('error.add.user', 'Add Failed admin table');
        }
    }
}
