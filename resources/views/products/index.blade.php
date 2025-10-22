<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-amber-800 leading-tight">
                Danh sách sản phẩm của bạn
            </h2>

            <a href="{{ route('auth.products.create') }}" 
               class="bg-amber-600 text-white px-4 py-2 rounded hover:bg-amber-700 transition">
                + Thêm sản phẩm
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 text-green-600 font-semibold">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full table-auto border border-gray-200">
                    <thead class="bg-amber-100 text-amber-800">
                        <tr>
                            <th class="px-4 py-2 text-left">Tên sản phẩm</th>
                            <th class="px-4 py-2">Mô tả</th>
                            <th class="px-4 py-2">Giá</th>
                            <th class="px-4 py-2">Ngày tạo</th>
                            <th class="px-4 py-2">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr class="border-t hover:bg-gray-50 transition">
                                <td class="px-4 py-2 font-semibold text-gray-800">{{ $product->name }}</td>
                                <td class="px-4 py-2 text-gray-600">{{ $product->description ?? 'Không có mô tả' }}</td>
                                <td class="px-4 py-2 text-red-600 font-bold">
                                    {{ number_format($product->price, 0, ',', '.') }} đ
                                </td>
                                <td class="px-4 py-2 text-gray-500">
                                    {{ $product->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-2 space-x-3">
                                    <a href="{{ route('admin.products.show', $product->id) }}" 
                                       class="text-blue-600 hover:underline">Xem</a>

                                    <a href="{{ route('admin.products.edit', $product->id) }}" 
                                       class="text-yellow-600 hover:underline">Sửa</a>

                                    <form action="{{ route('auth.products.destroy', $product->id) }}" 
                                          method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')"
                                                class="text-red-600 hover:underline">
                                            Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                                    Chưa có sản phẩm nào.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
