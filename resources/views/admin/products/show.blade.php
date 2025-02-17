<x-app-layout>
    <div class="p-6 mx-auto max-w-7xl">
        <h1 class="mb-4 text-xl font-bold">{{ $product->name }}</h1>
        <p><strong>価格:</strong> {{ $product->price }}円</p>
        <p><strong>在庫:</strong> {{ $product->stock }}</p>
        <p><strong>説明:</strong> {{ $product->description }}</p>
        <a href="{{ route('admin.products.index') }}" class="inline-block mt-4 text-blue-500">← 戻る</a>
    </div>
</x-app-layout>