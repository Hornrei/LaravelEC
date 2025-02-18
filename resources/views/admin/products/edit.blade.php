<x-app-layout>
    <div class="p-6 mx-auto max-w-7xl">
        <h1 class="mb-4 text-xl font-bold">商品編集</h1>

        <form action="{{ route('admin.products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="block font-bold">商品名</label>
                <input type="text" name="name" value="{{ $product->name }}" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-3">
                <label class="block font-bold">価格</label>
                <input type="number" name="fee" value="{{ $product->fee }}" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-3">
                <label class="block font-bold">在庫</label>
                <input type="number" name="quantity" value="{{ $product->quantity }}" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-3">
                <label class="block font-bold">説明</label>
                <textarea name="explain" class="w-full p-2 border rounded">{{ $product->explain }}</textarea>
            </div>
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">更新</button>
        </form>
    </div>
</x-app-layout>