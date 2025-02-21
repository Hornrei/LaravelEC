<x-app-layout>
    <div class="p-6 mx-auto max-w-7xl">
        <h1 class="mb-4 text-xl font-bold">商品編集</h1>

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- 商品名 -->
            <div class="mb-3">
                <label class="block font-bold">商品名</label>
                <input type="text" name="name" value="{{ $product->name }}" class="w-full p-2 border rounded" required>
            </div>
            
            <!-- 価格 -->
            <div class="mb-3">
                <label class="block font-bold">価格</label>
                <input type="number" name="fee" value="{{ $product->fee }}" class="w-full p-2 border rounded" required>
            </div>
            
            <!-- 在庫 -->
            <div class="mb-3">
                <label class="block font-bold">在庫</label>
                <input type="number" name="quantity" value="{{ $product->quantity }}" class="w-full p-2 border rounded" required>
            </div>
            
            <!-- 説明 -->
            <div class="mb-3">
                <label class="block font-bold">説明</label>
                <textarea name="explain" class="w-full p-2 border rounded">{{ $product->explain }}</textarea>
            </div>
            
            <!-- タグ選択 -->
            <div class="mb-3">
                <label class="block font-bold">タグ</label>
                <select name="tag" class="w-full p-2 border rounded" required>
                    <option value="">タグを選択</option>
                    <option value="石" {{ $product->tags->contains('name', '石') ? 'selected' : '' }}>石</option>
                    <option value="鉱石" {{ $product->tags->contains('name', '鉱石') ? 'selected' : '' }}>鉱石</option>
                    <option value="木材" {{ $product->tags->contains('name', '木材') ? 'selected' : '' }}>木材</option>
                    <option value="その他" {{ $product->tags->contains('name', 'その他') ? 'selected' : '' }}>その他</option>
                </select>
            </div>
            
            <!-- 商品画像 -->
            <div class="mb-3">
                <label class="block font-bold">商品画像</label>
                <input type="file" name="image" class="w-full p-2 border rounded">
                @if($product->imagePath)
                    <p class="mt-2 text-sm text-gray-500">現在の画像:</p>
                    <img src="{{ asset('image/' . $product->imagePath) }}" alt="Product Image" class="w-32 h-32 object-cover mt-2">
                @endif
            </div>
            
            <!-- 商品モデル (glbファイル) -->
            <div class="mb-3">
                <label class="block font-bold">商品モデル (glbファイル)</label>
                <input type="file" name="model" class="w-full p-2 border rounded" accept=".glb">
                @if($product->modelPath)
                    <p class="mt-2 text-sm text-gray-500">現在のモデル:</p>
                    <p class="mt-2 text-sm text-gray-500">{{ $product->modelPath }}</p>
                @endif
            </div>
            
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">更新</button>
        </form>
    </div>
</x-app-layout>
