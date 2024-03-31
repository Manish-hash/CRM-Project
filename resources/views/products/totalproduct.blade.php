<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex items-center justify-between mb-4">
                        <h1 class="text-2xl font-bold">Total Products</h1>
                       
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-800">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="px-4 py-2 text-center">ID</th>
                                    <th class="px-4 py-2 text-center">LOgo</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Quantity</th>
                                    <th class="px-4 py-2">Manufacturing Price</th>
                                    <th class="px-4 py-2">Selling Price</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="border px-4 py-2 text-center">{{ $product->id }}</td>
                                        <td><img src="{{ asset('storage/'. $product->logo) }}" alt="Product Image" height="100" width="100"></td>
                                        <td class="border px-4 py-2">{{ $product->name }}</td>
                                        <td class="border px-4 py-2">{{ $product->quantity }}</td>
                                        <td class="border px-4 py-2">{{ $product->manufacturing_price }}</td>
                                        <td class="border px-4 py-2">{{ $product->selling_price }}</td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="border px-4 py-2 text-center">Oops! Nothing to show.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                     </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
