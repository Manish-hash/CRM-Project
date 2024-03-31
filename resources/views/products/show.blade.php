<!-- resources/views/users/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Products Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
                        <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">Back to Products</a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">

                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" height="100" width="100">
                            
                        </div>
                        <div class="mb-4">
                            <h2 class="text-lg font-semibold mb-2">Name</h2>
                            <p>{{ $product->name }}</p>
                        </div>
                        <div class="mb-4">
                            <h2 class="text-lg font-semibold mb-2">Qantity</h2>
                            <p>{{ $product->quantity }}</p>
                        </div>
                        <div class="mb-4">
                            <h2 class="text-lg font-semibold mb-2">Manufacturing Price</h2>
                            <p>{{ $product->manufacturing_price }}</p>
                        </div>
                        <div class="mb-4">
                            <h2 class="text-lg font-semibold mb-2">Selling Price</h2>
                            <p>{{ $product->selling_price }}</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
