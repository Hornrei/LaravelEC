<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\UserStock;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index(Request $request){
        $query = Stock::query();
        if($request->tag){
            
            $query->whereHas('tags',function($query) use ($request){
                $query->where('name',$request->tag);
            });
        }
            // 1ページ6個の在庫情報を取得
        $stocks = $query->simplePaginate(8);
        $tags = Tag::all();
        return view('stocks',compact('stocks','tags'));
    }

    public function myCart(UserStock $userStock)
    {
        $myCartStocks = $userStock->showMyCart();
        // dd($myCartStocks[0]->stock->name);
        return view('myCart',compact('myCartStocks'));
    }

    public function addMycart(Request $request, UserStock $userStock)
    {
        // カートに追加の処理
        $stockId = $request->stockId;
        $quantity = $request->quantity; // 個数をリクエストから取得
        $message = $userStock->addMyCart($stockId, $quantity); // 個数を渡す

        // 追加後の情報を取得
        $myCartStocks = $userStock->showMyCart();

        return view('myCart', compact('myCartStocks', 'message'));
    }

    public function updateMyCartStock(Request $request, UserStock $userStock)
    {
        // カートの更新処理
        $stockId = $request->stockId;
        $quantity = $request->quantity;
        $message = $userStock->updateMyCartStock($stockId, $quantity);

        // 更新後の情報を取得
        $myCartStocks = $userStock->showMyCart();

        return view('myCart', compact('myCartStocks', 'message'));
    }

    public function deleteMyCartStock(Request $request,UserStock $userStock)
    {

        //カートから削除の処理
        $stockId=$request->stockId;
        $message = $userStock->deleteMyCartStock($stockId);

        //追加後の情報を取得
        $myCartStocks = $userStock->showMyCart();

        return view('myCart',compact('myCartStocks' , 'message'));

    }

    public function checkout(Request $request)
    {
        return view('checkout');
    }




}