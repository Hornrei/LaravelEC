<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;
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
        // バリデーションの前に画像がアップロードされているかを確認
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            
            // ユニークなファイル名を生成
            $imageName = time() . '_' . $file->getClientOriginalName();

            // 画像を public/image フォルダに保存
            $file->move(public_path('image'), $imageName);

            // 商品を登録   
            Stock::create([
                'name' => $request->name,
                'fee' => $request->fee,
                'quantity' => $request->quantity,
                'explain' => $request->explain,
                'imagePath' => $imageName,  // DBには画像の相対パスを保存
            ]);
            
            return redirect()->route('admin.products.index')->with('success', '商品を登録しました');
        } else {
            return redirect()->back()->withErrors(['image' => '画像がアップロードされていません']);
        }
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
        $request->validate([
            'name' => 'required|string|max:255',
            'fee' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'explain' => 'nullable|string',
        ]);

        $product->update($request->all());

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