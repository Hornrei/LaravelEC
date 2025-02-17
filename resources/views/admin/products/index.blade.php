<x-app-layout>
    <div class="p-6 mx-auto max-w-7xl">
        <h1 class="mb-4 text-xl font-bold">商品一覧</h1>
        <a href="{{ route('admin.products.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded">新規登録</a>

        @if (session('success'))
            <p class="mt-2 text-green-500">{{ session('success') }}</p>
        @endif

        <table class="w-full mt-4 border border-collapse border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">商品名</th>
                    <th class="px-4 py-2 border">価格</th>
                    <th class="px-4 py-2 border">在庫</th>
                    <th class="px-4 py-2 border">アクション</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td class="px-4 py-2 border">{{ $product->id }}</td>
                    <td class="px-4 py-2 border">{{ $product->name }}</td>
                    <td class="px-4 py-2 border">{{ $product->price }}円</td>
                    <td class="px-4 py-2 border">{{ $product->stock }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-500">編集</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-2 text-red-500">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
