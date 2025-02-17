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
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Stock::create($request->all());

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
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
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