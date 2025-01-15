<x-app-layout>
    <div class="container-fluid">
        <div class="mx-auto" style="max-width:1200px">
            <h1 class="py-6 text-xl font-bold text-center text-gray-800">
                {{ Auth::user()->name }}さんのカートの中身
            </h1>
            
            <!-- メッセージ表示 -->
            <p class="mb-4 font-semibold text-center text-green-600">{{ $message ?? '' }}</p>

            <!-- カート内商品リスト -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($myCartStocks as $cart)
                    <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-lg">
                        <!-- 商品名と価格 -->
                        <h2 class="mb-2 text-lg font-semibold text-gray-800">{{ $cart->stock->name }}</h2>
                        <p class="mb-2 text-xl font-bold text-gray-800">{{ number_format($cart->stock->fee) }}円</p>
                        
                        <!-- 商品画像 -->
                        <div class="flex justify-center mb-4">
                            <img src="/image/{{ $cart->stock->imagePath }}" alt="{{ $cart->stock->name }}" class="h-auto rounded-lg shadow-md w-80">
                        </div>

                        <!-- 個数表示と更新フォーム -->
                        <form action="/updateMyCartStock" method="post" class="w-full mb-4">
                            @csrf
                            <input type="hidden" name="stockId" value="{{ $cart->stock->id }}">
                            <label for="quantity-{{ $cart->stock->id }}" class="block mb-2 text-sm font-bold text-gray-700">個数:</label>
                            <input 
                                type="number" 
                                id="quantity-{{ $cart->stock->id }}" 
                                name="quantity" 
                                value="{{ $cart->quantity }}" 
                                min="1" 
                                class="w-full px-3 py-1 text-center border border-gray-300 rounded">
                            <button type="submit" class="w-full px-4 py-2 mt-2 font-bold text-white bg-green-500 rounded-lg hover:bg-green-700 focus:outline-none">
                                個数を更新
                            </button>
                        </form>

                        <!-- カートから削除するフォーム -->
                        <form action="/deleteMyCartStock" method="post" class="w-full">
                            @csrf
                            <input type="hidden" name="stockId" value="{{ $cart->stock->id }}">
                            <button type="submit" class="w-full px-4 py-2 font-bold text-white bg-red-500 rounded-lg hover:bg-red-700 focus:outline-none">
                                カートから削除する
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <!-- カートが空の場合のメッセージ -->
            @if($myCartStocks->isEmpty())
                <p class="mt-6 text-center text-gray-500">カートはからっぽです。</p>
            @endif

            <!-- 合計金額 -->
            @if(!$myCartStocks->isEmpty())
                <div class="mt-8 text-center">
                    <h2 class="text-xl font-bold text-gray-800">
                        合計金額: 
                        <span class="text-green-600">{{ number_format($myCartStocks->sum(fn($cart) => $cart->stock->fee * $cart->quantity)) }}円</span>
                    </h2>
                    <form action="/checkout" method="post" class="mt-4">
                        @csrf
                        <button type="submit" class="px-6 py-2 font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none">
                            購入手続きへ進む
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
