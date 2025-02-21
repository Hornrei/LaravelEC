<x-app-layout>
    <div class="p-6 mx-auto max-w-7xl">
        <h1 class="mb-4 text-xl font-bold">商品登録</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="block font-bold">商品名</label>
                <input type="text" name="name" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-3">
                <label class="block font-bold">価格</label>
                <input type="number" name="fee" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-3">
                <label class="block font-bold">在庫</label>
                <input type="number" name="quantity" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-3">
                <label class="block font-bold">説明</label>
                <textarea name="explain" class="w-full p-2 border rounded"></textarea>
            </div>  
            <div class="mb-3">
                <label class="block font-bold">商品画像</label>
                <input type="file" name="image" class="w-full p-2 border rounded">
            </div>
            <div class="mb-3">
                <label class="block font-bold">商品モデル (glbファイル)</label>
                <input type="file" name="model" class="w-full p-2 border rounded" accept=".glb">
            </div>
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">登録</button>
        </form>
    </div>
</x-app-layout>
