<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserStock extends Model
{
    use HasFactory;
    protected $table = 'users_stocks';
    protected $guarded = [
        'id'
      ];

    public function showMyCart()
    {
      $userId = Auth::id();
      return $this->where('userId',$userId)->with('stock')->get();
    }
    
    public function stock()
    {
        return $this->belongsTo('\App\Models\Stock','stockId');
    }

    public function addMyCart($stockId, $quantity)
    {
        $user = Auth::user();
        $cart = $this->where('userId', $user->id)->where('stockId', $stockId)->first();

        if ($cart) {
            // 既存のカートにアイテムがある場合、個数を加算
            $cart->quantity += $quantity;
            $cart->save();
            return 'カートのアイテムの個数を更新しました！';
        } else {
            // 新しいアイテムをカートに追加
            $this->create([
                'userId' => $user->id,
                'stockId' => $stockId,
                'quantity' => $quantity,
            ]);
            return 'カートにアイテムを追加しました！';
        }
    }

    public function updateMyCartStock($stockId, $quantity)
    {
        $userId = Auth::id();
        $updateStockCount = $this->where('userId', $userId)->where('stockId', $stockId)->update(['quantity' => $quantity]);
        
        if ($updateStockCount > 0) {
            $message = 'カートのアイテムの個数を更新しました';
        } else {
            $message = '更新に失敗しました';
        }
        return $message;
    }

    public function deleteMyCartStock($stockId)
    {
        $userId = Auth::id(); 
        $deleteStockCount = $this->where('userId', $userId)->where('stockId', $stockId)->delete();
        
        if ($deleteStockCount > 0) {
            $message = 'カートから一つの商品を削除しました';
        } else {
            $message = '削除に失敗しました';
        }
        return $message;
    }

    


}

