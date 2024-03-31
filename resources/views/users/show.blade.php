<!-- resources/views/users/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                        <a href="{{ route('users.index') }}" class="text-blue-500 hover:underline">Back to Users</a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <h2 class="text-lg font-semibold mb-2">Email</h2>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="mb-4">
                            <h2 class="text-lg font-semibold mb-2">Role</h2>
                            <p>{{ $user->role }}</p>
                        </div>
                        <div class="mb-4">
                            <h2 class="text-lg font-semibold mb-2">Status</h2>
                            <p>{{ $user->status }}</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
