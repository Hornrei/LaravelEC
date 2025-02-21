<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * 商品一覧を表示
     */
    public function index()
    {
        $products = Stock::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * 商品登録フォームを表示
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * 新規商品を登録
     */
    public function store(Request $request)
    {
        // バリデーションの前に画像とモデルがアップロードされているかを確認
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $imageName);
        } else {
            return redirect()->back()->withErrors(['image' => '画像がアップロードされていません']);
        }
    
        // モデルファイルのアップロード処理
        if ($request->hasFile('model')) {
            $modelFile = $request->file('model');
            $modelName = time() . '_' . $modelFile->getClientOriginalName();
            $modelFile->move(public_path('models'), $modelName); // public/models に保存
        } else {
            $modelName = null; // モデルがない場合
        }
    
        // 商品を登録
        $stock = Stock::create([
            'name' => $request->name,
            'fee' => $request->fee,
            'quantity' => $request->quantity,
            'explain' => $request->explain,
            'imagePath' => $imageName,  // DBには画像の相対パスを保存
            'modelPath' => $modelName,  // DBにはモデルの相対パスを保存
        ]);
    
        // タグが選択されている場合は、タグを関連付ける
        if ($request->has('tag') && $request->input('tag') !== '') {
            // タグ名からタグIDを取得
            $tag = Tag::where('name', $request->input('tag'))->first();
            
            // タグが存在する場合、関連付ける
            if ($tag) {
                $stock->tags()->attach($tag->id);
            }
        }
    
        return redirect()->route('admin.products.index')->with('success', '商品を登録しました');
    }
    





    /**
     * 商品詳細ページ（省略可能）
     */
    public function show(Stock $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * 商品編集フォームを表示
     */
    public function edit(Stock $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * 商品情報を更新
     */
    public function update(Request $request, Stock $product)
    {
        // 画像の更新処理
        if ($request->hasFile('image')) {
            // 古い画像を削除
            if (File::exists(public_path('image/' . $product->imagePath))) {
                File::delete(public_path('image/' . $product->imagePath));
            }

            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $imageName);
        } else {
            $imageName = $product->imagePath; // 画像が更新されない場合は元のまま
        }

        // モデルファイルの更新処理
        if ($request->hasFile('model')) {
            // 古いモデルを削除
            if (File::exists(public_path('models/' . $product->modelPath))) {
                File::delete(public_path('models/' . $product->modelPath));
            }

            $modelFile = $request->file('model');
            $modelName = time() . '_' . $modelFile->getClientOriginalName();
            $modelFile->move(public_path('models'), $modelName);
        } else {
            $modelName = $product->modelPath; // モデルが更新されない場合は元のまま
        }

        // 商品を更新
        $product->update([
            'name' => $request->name,
            'fee' => $request->fee,
            'quantity' => $request->quantity,
            'explain' => $request->explain,
            'imagePath' => $imageName,  // 更新された画像のパスを保存
            'modelPath' => $modelName,  // 更新されたモデルのパスを保存
        ]);

        // タグが選択されている場合は、タグを関連付ける
        if ($request->has('tag') && $request->input('tag') !== '') {
            // タグ名からタグIDを取得
            $tag = Tag::where('name', $request->input('tag'))->first();

            // タグが存在する場合、関連付ける
            if ($tag) {
                $product->tags()->sync([$tag->id]);  // タグの更新 (attach -> sync)
            }
        }

        return redirect()->route('admin.products.index')->with('success', '商品情報を更新しました');
    }

    /**
     * 商品を削除
     */
    public function destroy(Stock $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', '商品を削除しました');
    }
}