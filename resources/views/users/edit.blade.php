<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex items-center justify-between mb-4">
                        <h1 class="text-2xl font-bold">UPDATE USERS</h1>
                        <a href="{{ route('users.index') }}" class="text-blue-500 hover:underline">Back to Users</a>
                    </div>
               
                    <form method="POST" action="{{route('users.update',['id' =>$user->id])}}">
                    @csrf
                    @method('PUT')
                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Name:</label>
                            <input type="text" id="name" name="name" value="{{$user->name}}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                            @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email:</label>
                            <input type="email" id="email" name="email" value="{{$user->email}}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                            @error('email')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                       
                        <!-- Role -->
                         <!-- <div class="mb-4">
                            <label for="role" class="block text-gray-700">Role:</label>
                            <select id="role" name="role"  class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                            </select>
                            @error('role')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>  -->

                        <!-- Status -->
                         <div class="mb-4">
                            <label for="status" class="block text-gray-700">Status:</label>
                            <select id="status" name="status" value="{{$user->status}}" class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                                <option value="active"{{ $user->status === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive"{{ $user->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div> 

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
