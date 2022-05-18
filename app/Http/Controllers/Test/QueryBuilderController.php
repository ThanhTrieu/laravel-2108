<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderController extends Controller
{
    public function insertUser()
    {
        DB::table('admin')->insert([

        ]);
    }

    public function updateUser()
    {
        DB::table('roles')->where('id', 1)
            ->update(['description' => 'staff']);
        // UPDATE `roles` SET `description` = 'staff' WHERE `id` = :id
    }

    public function deleteUser()
    {
        DB::table('permissions')->where('id', '=', 3)->delete();
    }
}
