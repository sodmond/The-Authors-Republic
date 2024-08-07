<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => 'superuser'],
            ['title' => 'editor'],
            ['title' => 'analyst'],
        ];
        DB::table('admin_roles')->insert($data);
    }
}
