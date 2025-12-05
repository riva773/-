<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ItemSeeder extends Seeder
{
    public function run()
    {
        $userId = DB::table('users')->value('id');

        DB::table('items')->insert([
            [
                'name' => '腕時計',
                'image_url' => 'item_image/Armani+Mens+Clock.jpg',
                'brand' => 'armani',
                'price' => 15000,
                'description' => 'スタイリッシュなデザインのメンズ腕時計',
                'condition' => 'like_new',
                'category' => 'fashion',
                'status' => 'Available',
                'user_id' => $userId,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'HDD',
                'image_url'   => 'item_image/HDD+Hard+Disk.jpg',
                'brand'       => 'generic',
                'price'       => 5000,
                'description' => '高速で信頼性の高いハードディスク',
                'condition'   => 'good',
                'category'    => 'electronics',
                'status'      => 'available',
                'user_id'     => $userId,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'name'        => '玉ねぎ3束',
                'image_url'   => 'item_image/iLoveIMG+d.jpg',
                'brand'       => null,
                'price'       => 300,
                'description' => '新鮮な玉ねぎ3束のセット',
                'condition'   => 'good',
                'category'    => 'kitchen',
                'status'      => 'available',
                'user_id'     => $userId,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'name'        => '革靴',
                'image_url'   => 'item_image/Leather+Shoes+Product+Photo.jpg',
                'brand'       => 'classic',
                'price'       => 4000,
                'description' => 'クラシックなデザインの革靴',
                'condition'   => 'good',
                'category'    => 'fashion',
                'status'      => 'available',
                'user_id'     => $userId,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'name'        => 'ノートPC',
                'image_url'   => 'item_image/Living+Room+Laptop.jpg',
                'brand'       => 'generic',
                'price'       => 45000,
                'description' => '高性能なノートパソコン',
                'condition'   => 'like_new',
                'category'    => 'electronics',
                'status'      => 'available',
                'user_id'     => $userId,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'name'        => 'マイク',
                'image_url'   => 'item_image/Music+Mic+4632231.jpg',
                'brand'       => 'generic',
                'price'       => 8000,
                'description' => '高音質のレコーディング用マイク',
                'condition'   => 'good',
                'category'    => 'electronics',
                'status'      => 'available',
                'user_id'     => $userId,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'name'        => 'ショルダーバッグ',
                'image_url'   => 'item_image/Purse+fashion+pocket.jpg',
                'brand'       => 'basic',
                'price'       => 3500,
                'description' => 'おしゃれなショルダーバッグ',
                'condition'   => 'good',
                'category'    => 'fashion',
                'status'      => 'available',
                'user_id'     => $userId,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'name'        => 'タンブラー',
                'image_url'   => 'item_image/Tumbler+souvenir.jpg',
                'brand'       => 'basic',
                'price'       => 500,
                'description' => '使いやすいタンブラー',
                'condition'   => 'good',
                'category'    => 'kitchen',
                'status'      => 'available',
                'user_id'     => $userId,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'name'        => 'コーヒーミル',
                'image_url'   => 'item_image/Waitress+with+Coffee+Grinder.jpg',
                'brand'       => 'manual',
                'price'       => 4000,
                'description' => '手動のコーヒーミル',
                'condition'   => 'good',
                'category'    => 'kitchen',
                'status'      => 'available',
                'user_id'     => $userId,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'name'        => 'メイクセット',
                'image_url'   => 'item_image/外出メイクアップセット.jpg',
                'brand'       => null,
                'price'       => 2500,
                'description' => '便利なメイクアップセット',
                'condition'   => 'good',
                'category'    => 'cosmetics',
                'status'      => 'available',
                'user_id'     => $userId,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
