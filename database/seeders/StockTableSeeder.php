<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stocks')->truncate(); //2回目実行の際に一旦テーブル情報をクリア
        
        $stocks = [
            [
                'name' => 'オークの板材',
                'explain' => 'オークの木からとれる板材。どこにでも生えている',
                'fee' => 250,
                'quantity' => 4,
                'imagePath' => 'Oak_Planks.webp',
                'modelPath' => 'oak_planks.glb',
            ],

            [
                'name' => '桜の板材',
                'explain' => '桜の木からとれる板材。桜バイオームでのみ生息',
                'fee' => 400,
                'quantity' => 4,
                'imagePath' => 'Cherry_Planks.webp',
                'modelPath' => 'cherry_planks.glb',
            ],
            [
                'name' => 'Android Garxy10',
                'explain' => '中古美品です',
                'fee' => 84200,
                'quantity' => 3,
                'imagePath' => 'mobile.jpg',
                'modelPath' => 'oak_planks.glb',
            ],
            [
                'name' => 'フィルムカメラ',
                'explain' => '1960年式のカメラです',
                'fee' => 200000,
                'quantity' => 3,
                'imagePath' => 'filmcamera.jpg',
                'modelPath' => 'oak_planks.glb',
            ],
            [
                'name' => 'イヤホン',
                'explain' => 'ノイズキャンセリングがついてます',
                'fee' => 20000,
                'quantity' => 3,
                'imagePath' => 'iyahon.jpg',
                'modelPath' => 'oak_planks.glb',
            ],
            [
                'name' => '時計',
                'explain' => '1980年式の掛け時計です',
                'fee' => 120000,
                'quantity' => 3,
                'imagePath' => 'clock.jpg',
                'modelPath' => 'oak_planks.glb',
            ],
            [
                'name' => '地球儀',
                'explain' => '珍しい商品です',
                'fee' => 120000,
                'quantity' => 3,
                'imagePath' => 'earth.jpg',
                'modelPath' => 'oak_planks.glb',
            ],
            [
                'name' => '腕時計',
                'explain' => 'プレゼントにどうぞ',
                'fee' => 9800,
                'quantity' => 3,
                'imagePath' => 'watch.jpg',
                'modelPath' => 'oak_planks.glb',
            ],
            [
                'name' => 'カメラレンズ35mm',
                'explain' => '最新式です',
                'fee' => 79800,
                'quantity' => 3,
                'imagePath' => 'lens.jpg',
                'modelPath' => 'oak_planks.glb',
            ],
            [
                'name' => 'シャンパン',
                'explain' => 'パーティにどうぞ',
                'fee' => 800,
                'quantity' => 3,
                'imagePath' => 'shanpan.jpg',
                'modelPath' => 'oak_planks.glb',
            ],
            [
                'name' => 'ビール',
                'explain' => '大量生産されたビールです',
                'fee' => 200,
                'quantity' => 3,
                'imagePath' => 'beer.jpg',
                'modelPath' => 'oak_planks.glb',
            ],
            [
                'name' => 'やかん',
                'explain' => 'かなり珍しいやかんです',
                'fee' => 1200,
                'quantity' => 3,
                'imagePath' => 'yakan.jpg',
                'modelPath' => 'oak_planks.glb',
            ],
            [
                'name' => 'パソコン',
                'explain' => 'ジャンク品です',
                'fee' => 11200,
                'quantity' => 3,
                'imagePath' => 'pc.jpg',
                'modelPath' => 'oak_planks.glb',
            ],
            [
                'name' => '精米',
                'explain' => '米30Kgです',
                'fee' => 11200,
                'quantity' => 3,
                'imagePath' => 'kome.jpg',
                'modelPath' => 'oak_planks.glb',
            ],
            [
                'name' => 'アコースティックギター',
                'explain' => 'ヤマハ製のエントリーモデルです',
                'fee' => 25600,
                'quantity' => 3,
                'imagePath' => 'aguiter.jpg',
                'modelPath' => 'oak_planks.glb',
            ],
            [
                'name' => 'エレキギター',
                'explain' => '初心者向けのエントリーモデルです',
                'fee' => 15600,
                'quantity' => 3,
                'imagePath' => 'eguiter.jpg',
                'modelPath' => 'oak_planks.glb',
            ],
            [
                'name' => '加湿器',
                'explain' => '乾燥する季節の必需品',
                'fee' => 3200,
                'quantity' => 3,
                'imagePath' => 'steamer.jpeg',
                'modelPath' => 'oak_planks.glb',
            ],
            [
                'name' => 'マウス',
                'explain' => 'ゲーミングマウスです',
                'fee' => 4200,
                'quantity' => 3,
                'imagePath' => 'mouse.jpeg',
                'modelPath' => 'oak_planks.glb',
            ],
        ];

        DB::table('stocks')->insert($stocks);
    }
}