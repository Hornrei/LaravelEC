<x-app-layout>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

    <div class="container-fluid">
        <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
            <div class="">
            <div class="mb-4">
                <form method="GET" action="{{ route('stock.index') }}">
                    <select name="tag" onchange="this.form.submit()" class="border rounded p-2">
                        <option value="">すべてのタグ</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->name }}" {{ request('tag') == $tag->name ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

                <div class="grid flex-wrap grid-cols-4 gap-4">
                    @foreach($stocks as $stock)
                        <div class="p-6 text-sm text-center bg-white rounded shadow-lg mycart_box">
                            {{$stock->name}} <br>
                            {{$stock->fee}}円<br>
                            <img src="/image/{{$stock->imagePath}}" alt="" class="incart w-4/5 m-auto">
                            <br>
                            {{$stock->explain}} <br>
                            タグ:
                            @foreach ($stock->tags as $tag)
                                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded">{{ $tag->name }}</span>
                            @endforeach

                            <!-- 詳細を見るボタン -->
                            <button 
                                class="px-4 py-2 m-2 font-bold text-white bg-blue-400 rounded hover:bg-blue-700" 
                                onclick="openModal('modal-{{$stock->id}}')">
                                詳細を見る
                            </button>
                        </div>

                        <!-- モーダル -->
                        <div id="modal-{{$stock->id}}" class="fixed inset-0 flex items-center justify-center hidden bg-gray-600 bg-opacity-50">
                            <div class="bg-white rounded-lg shadow-lg w-[80%] max-w-sm max-h-[70vh] overflow-y-auto p-4 relative">
                                <!-- 閉じるボタン -->
                                <button 
                                    class="absolute text-gray-500 top-3 right-3 hover:text-gray-700 focus:outline-none"
                                    onclick="closeModal('modal-{{$stock->id}}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                
                                <!-- モーダルコンテンツ -->
                                <h2 class="mb-4 text-lg font-bold text-center">{{$stock->name}}</h2>
                                <model-viewer 
                                    src="/models/{{$stock->modelPath}}" 
                                    alt="{{$stock->name}}" 
                                    auto-rotate 
                                    rotation-per-second="60deg"
                                    camera-controls  
                                    class="w-full h-64">    
                                </model-viewer>

                                <p class="mb-4 text-gray-700">{{$stock->explain}}</p>
                                <p class="mb-4 font-bold text-center text-gray-800">{{$stock->fee}}円</p>
                                タグ:
                                @foreach ($stock->tags as $tag)
                                    <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded">{{ $tag->name }}</span>
                                @endforeach
                                <!-- カートに入れるフォーム -->
                                <form action="addMyCart" method="post">
                                    @csrf
                                    <input type="hidden" name="stockId" value="{{ $stock->id }}">

                                    <!-- 個数選択 -->
                                    <div class="mb-4">
                                        <label for="quantity-{{$stock->id}}" class="block mb-2 text-sm font-bold text-gray-700">個数を選択:</label>
                                        <input 
                                            type="number" 
                                            id="quantity-{{$stock->id}}" 
                                            name="quantity" 
                                            value="1" 
                                            min="1" 
                                            class="w-full px-3 py-1 text-center border border-gray-300 rounded">
                                    </div>

                                    <button class="w-full px-4 py-2 font-bold text-white bg-blue-400 rounded hover:bg-blue-700">
                                        カートに入れる
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center" style="width: 200px; margin: 20px auto;">
                    {{ $stocks->links() }} 
                </div>
            </div>
        </div>
    </div>

    <script>
        // モーダルを開く
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }
        // モーダルを閉じる
        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
</x-app-layout>
