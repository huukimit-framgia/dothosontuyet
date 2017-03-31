<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                'name' => 'Administrator',
                'desc' => 'Admin là người quản lý, điều hành toàn bộ website'
            ],
            [
                'name' => 'Moderator',
                'desc' => 'Hay còn gọi là Mod, là người quản lý một khu vực giới hạn nào đó'
            ],
            [
                'name' => 'Member',
                'desc' => 'Thành viên đăng ký tài khoản tại website'
            ]
        ]);
    }
}
