<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-amber-800 leading-tight">
                 LoQu Coffee
            </h2>

            <a href="/order" 
               class="bg-amber-600 text-white px-5 py-2 rounded-lg hover:bg-amber-700 transition shadow-md">
                Đặt hàng ngay
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[url('/images/coffee-bg.jpg')] bg-cover bg-center">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/85 backdrop-blur-md overflow-hidden shadow-2xl sm:rounded-2xl">
                <div class="p-8 text-gray-900">
                    
                    <h3 class="text-2xl font-bold mb-6 text-amber-800 text-center">
                        Menu hôm nay
                    </h3>

                    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @forelse($products as $product)
                            <li class="p-5 bg-amber-100 rounded-xl shadow hover:scale-105 transition">
                                <h4 class="font-semibold text-lg text-amber-800">{{ $product->name }}</h4>
                                <p class="text-sm text-gray-700">{{ $product->description }}</p>
                                <p class="font-bold mt-3 text-amber-700">{{ number_format($product->price) }}₫</p>
                            </li>
                        @empty
                            <li class="col-span-3 text-center text-gray-600">
                                Chưa có sản phẩm nào trong menu hôm nay.
                            </li>
                        @endforelse
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
