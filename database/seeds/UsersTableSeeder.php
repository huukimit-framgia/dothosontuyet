<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 30)->create();
        factory(User::class)->create([
            'name' => 'Administrator',
            'email' => 'huukimit@gmail.com',
            'actived' => true,
            'blocked' => false,
            'groupid' => 1,
        ]);
    }
}
