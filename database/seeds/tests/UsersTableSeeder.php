<?php

use App\Model\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'szymon',
                'nick' => 'admin',
                'email' => 'szymon@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'),
                'remember_token' => Str::random(10),
                'created_at' => '2017-06-14 12:43:14',
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'jan',
                'nick' => 'kowalix',
                'email' => 'normal_user@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('user'),
                'remember_token' => Str::random(10),
                'created_at' => '2017-06-14 12:43:14',
                'updated_at' => now(),
            ],
        ]);
    }
}
