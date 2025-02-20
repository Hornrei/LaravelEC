<?php

namespace Database\Seeders;

use App\Models\Stock;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('stock_tag')->delete(); // 中間テーブルを先に削除
        DB::table('stocks')->delete();
        DB::table('tags')->delete();
        
        // タグの定義
        $tags = [
            '鉱石' => Tag::create(['name' => '鉱石']),
            '木材' => Tag::create(['name' => '木材']),
            'その他' => Tag::create(['name' => 'その他']),
            '石'   => Tag::create(['name' => '石']),
        ];

        // 商品データ
        $stocks = [
            // 鉱石
            ['name' => '石炭鉱石', 'explain' => '燃料として使用できる一般的な鉱石。', 'fee' => 100, 'quantity' => 64, 'imagePath' => 'Coal_Ore.webp', 'modelPath' => 'coal_ore.glb', 'tags' => ['鉱石']],
            ['name' => '銅鉱石', 'explain' => '装飾ブロックや雷避けの材料。', 'fee' => 150, 'quantity' => 64, 'imagePath' => 'Copper_Ore.webp', 'modelPath' => 'copper_ore.glb', 'tags' => ['鉱石']],
            ['name' => '鉄鉱石', 'explain' => '道具や装備の材料として不可欠。', 'fee' => 250, 'quantity' => 64, 'imagePath' => 'Iron_Ore.webp', 'modelPath' => 'iron_ore.glb', 'tags' => ['鉱石']],
            ['name' => '金鉱石', 'explain' => '柔らかく加工しやすいが耐久性が低い。', 'fee' => 500, 'quantity' => 64, 'imagePath' => 'Gold_Ore.webp', 'modelPath' => 'gold_ore.glb', 'tags' => ['鉱石']],
            ['name' => 'ラピスラズリ鉱石', 'explain' => 'エンチャントや染料に使用される貴重な鉱石。', 'fee' => 400, 'quantity' => 64, 'imagePath' => 'Lapis_Ore.webp', 'modelPath' => 'lapis_ore.glb', 'tags' => ['鉱石']],
            ['name' => 'ダイヤモンド鉱石', 'explain' => '最強の道具や防具を作成できる高価な鉱石。', 'fee' => 1000, 'quantity' => 64, 'imagePath' => 'Diamond_Ore.webp', 'modelPath' => 'diamond_ore.glb', 'tags' => ['鉱石']],
            ['name' => 'エメラルド鉱石', 'explain' => '村人との取引に使用できる希少な鉱石。', 'fee' => 800, 'quantity' => 64, 'imagePath' => 'Emerald_Ore.webp', 'modelPath' => 'emerald_ore.glb', 'tags' => ['鉱石']],
        
            // 木材
            ['name' => 'シラカバの木材', 'explain' => '白くて明るい色の建築用木材。', 'fee' => 250, 'quantity' => 64, 'imagePath' => 'Birch_Planks.webp', 'modelPath' => 'birch_planks.glb', 'tags' => ['木材']],
            ['name' => 'オークの木材', 'explain' => '標準的で使いやすい木材。', 'fee' => 250, 'quantity' => 64, 'imagePath' => 'Oak_Planks.webp', 'modelPath' => 'oak_planks.glb', 'tags' => ['木材']],
            ['name' => 'サクラの木材', 'explain' => 'ピンク色の可愛らしい木材。', 'fee' => 400, 'quantity' => 64, 'imagePath' => 'Cherry_Planks.webp', 'modelPath' => 'cherry_planks.glb', 'tags' => ['木材']],
            ['name' => 'アカシアの木材', 'explain' => 'オレンジがかった独特な木材。', 'fee' => 300, 'quantity' => 64, 'imagePath' => 'Acacia_Planks.webp', 'modelPath' => 'acacia_planks.glb', 'tags' => ['木材']],
            ['name' => 'ジャングルの木材', 'explain' => '熱帯で見つかる濃い色の木材。', 'fee' => 300, 'quantity' => 64, 'imagePath' => 'Jungle_Planks.webp', 'modelPath' => 'jungle_planks.glb', 'tags' => ['木材']],
        
            // その他
            ['name' => '氷', 'explain' => '滑りやすく溶ける特性を持つブロック。', 'fee' => 200, 'quantity' => 16, 'imagePath' => 'Ice.webp', 'modelPath' => 'ice.glb', 'tags' => ['その他']],
            ['name' => '雪', 'explain' => '雪玉を作ることができる冷たいブロック。', 'fee' => 150, 'quantity' => 64, 'imagePath' => 'Snow.webp', 'modelPath' => 'snow.glb', 'tags' => ['その他']],
            ['name' => '土', 'explain' => '最も一般的な地面のブロック。', 'fee' => 50, 'quantity' => 64, 'imagePath' => 'Dirt.webp', 'modelPath' => 'dirt.glb', 'tags' => ['その他']],
            ['name' => '草ブロック', 'explain' => '上面に草が生えた装飾用ブロック。', 'fee' => 100, 'quantity' => 64, 'imagePath' => 'Grass_Block.webp', 'modelPath' => 'grass_block.glb', 'tags' => ['その他']],
        
            // 石
            ['name' => '石', 'explain' => '建築や道具の作成に使える基本ブロック。', 'fee' => 100, 'quantity' => 64, 'imagePath' => 'Stone.webp', 'modelPath' => 'stone.glb', 'tags' => ['石']],
            ['name' => '花崗岩', 'explain' => '装飾用の赤みがかった石材。', 'fee' => 150, 'quantity' => 64, 'imagePath' => 'Granite.webp', 'modelPath' => 'granite.glb', 'tags' => ['石']],
            ['name' => '苔石', 'explain' => '苔の生えたクラシックな丸石。', 'fee' => 200, 'quantity' => 64, 'imagePath' => 'Mossy_Cobblestone.webp', 'modelPath' => 'mossy_cobblestone.glb', 'tags' => ['石']],
            ['name' => '黒曜石', 'explain' => 'ネザーポータルの作成に使う超硬いブロック。', 'fee' => 750, 'quantity' => 16, 'imagePath' => 'Obsidian.webp', 'modelPath' => 'obsidian.glb', 'tags' => ['石']],
        ];
       // 商品をDBに挿入し、タグを関連付ける
       foreach ($stocks as $stockData) {
        $stock = Stock::create([
            'name' => $stockData['name'],
            'explain' => $stockData['explain'],
            'fee' => $stockData['fee'],
            'quantity' => $stockData['quantity'],
            'imagePath' => $stockData['imagePath'],
            'modelPath' => $stockData['modelPath'],
        ]);

            // タグを関連付ける
            foreach ($stockData['tags'] as $tagName) {
                $stock->tags()->attach($tags[$tagName]->id);
            }
        }
    }
}