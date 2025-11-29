<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Test User',
                    'email' => 'sample@example.com',
                    'password' => bcrypt('password123'),
                    'post_code' => 1234567,
                    'address' => '東京都渋谷区道玄坂1-2-3',
                    'building' => '渋谷マンション101',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'hoge',
                    'email' => 'hoge@example.com',
                    'password' => bcrypt('hogehoge'),
                    'post_code' => 1234567,
                    'address' => '東京都渋谷区道玄坂1-2-3',
                    'building' => '渋谷マンション101',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
