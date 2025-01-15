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
                'name' => 'Android Garxy10',
                'explain' => '中古美品です',
                'fee' => 84200,
                'imagePath' => 'mobile.jpg',
            ],
            [
                'name' => 'フィルムカメラ',
                'explain' => '1960年式のカメラです',
                'fee' => 200000,
                'imagePath' => 'filmcamera.jpg',
            ],
            [
                'name' => 'イヤホン',
                'explain' => 'ノイズキャンセリングがついてます',
                'fee' => 20000,
                'imagePath' => 'iyahon.jpg',
            ],
            [
                'name' => '時計',
                'explain' => '1980年式の掛け時計です',
                'fee' => 120000,
                'imagePath' => 'clock.jpg',
            ],
            [
                'name' => '地球儀',
                'explain' => '珍しい商品です',
                'fee' => 120000,
                'imagePath' => 'earth.jpg',
            ],
            [
                'name' => '腕時計',
                'explain' => 'プレゼントにどうぞ',
                'fee' => 9800,
                'imagePath' => 'watch.jpg',
            ],
            [
                'name' => 'カメラレンズ35mm',
                'explain' => '最新式です',
                'fee' => 79800,
                'imagePath' => 'lens.jpg',
            ],
            [
                'name' => 'シャンパン',
                'explain' => 'パーティにどうぞ',
                'fee' => 800,
                'imagePath' => 'shanpan.jpg',
            ],
            [
                'name' => 'ビール',
                'explain' => '大量生産されたビールです',
                'fee' => 200,
                'imagePath' => 'beer.jpg',
            ],
            [
                'name' => 'やかん',
                'explain' => 'かなり珍しいやかんです',
                'fee' => 1200,
                'imagePath' => 'yakan.jpg',
            ],
            [
                'name' => 'パソコン',
                'explain' => 'ジャンク品です',
                'fee' => 11200,
                'imagePath' => 'pc.jpg',
            ],
            [
                'name' => '精米',
                'explain' => '米30Kgです',
                'fee' => 11200,
                'imagePath' => 'kome.jpg',
            ],
            [
                'name' => 'アコースティックギター',
                'explain' => 'ヤマハ製のエントリーモデルです',
                'fee' => 25600,
                'imagePath' => 'aguiter.jpg',
            ],
            [
                'name' => 'エレキギター',
                'explain' => '初心者向けのエントリーモデルです',
                'fee' => 15600,
                'imagePath' => 'eguiter.jpg',
            ],
            [
                'name' => '加湿器',
                'explain' => '乾燥する季節の必需品',
                'fee' => 3200,
                'imagePath' => 'steamer.jpeg',
            ],
            [
                'name' => 'マウス',
                'explain' => 'ゲーミングマウスです',
                'fee' => 4200,
                'imagePath' => 'mouse.jpeg',
            ],
        ];

        DB::table('stocks')->insert($stocks);
    }
}