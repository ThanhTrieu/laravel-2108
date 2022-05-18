<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'add user',
                'slug' => 'add-user',
                'description' => 'add account user',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'update user',
                'slug' => 'update-user',
                'description' => 'update account user',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'delete user',
                'slug' => 'delete-user',
                'description' => 'delete account user',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
