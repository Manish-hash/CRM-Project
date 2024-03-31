<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h1 class="text-2xl font-bold">Update PRODUCTS</h1>
                        <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">Back to Products</a>
                    </div>
               
                    <form method="POST" action="{{ route('products.update', ['id' =>$product->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Logo -->
                        <div class="mb-4">
                            <label for="logo" class="block text-gray-700">Logo:</label>
                            <div class="flex items-center">
                                <img id="file-preview" width="100" height="100" src="{{ asset('images/no-image-available.png') }}" class="mr-4">
                                <input id="logo" type="file" name="logo" class="form-control mt-4" accept="image/*" onchange="readImage(this)">
                            </div>
                            @error('logo')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Name:</label>
                            <input type="text" id="name" name="name" value="{{ old('name') ?? $product->name }}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                            @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Quantity -->
                        <div class="mb-4">
                            <label for="quantity" class="block text-gray-700">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" value="{{ old('quantity') ?? $product->quantity }}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                            @error('quantity')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Manufacturing Price -->
                        <div class="mb-4">
                            <label for="manufacturing_price" class="block text-gray-700">Manufacturing Price(NRs):</label>
                            <input type="number" id="manufacturing_price" name="manufacturing_price" value="{{ old('manufacturing_price') ?? $product->manufacturing_price }}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                            @error('manufacturing_price')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Selling Price -->
                        <div class="mb-4">
                            <label for="selling_price" class="block text-gray-700">Selling Price(NRs):</label>
                            <input type="number" id="selling_price" name="selling_price" value="{{ old('selling_price') ?? $product->selling_price }}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                            @error('selling_price')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function readImage(input) {
            const preview = document.getElementById('file-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "{{ asset('images/no-image-available.png') }}";
            }
        }
    </script>
</x-app-layout>
