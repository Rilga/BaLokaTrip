<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <!-- Background biru -->
    <div class="py-12 bg-blue-700 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <br><br><br>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight border-b-2 border-gray-300 pb-2">
                    {{ __('Create Product') }}
                </h2>
                <br>

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-6">

                        <!-- Product Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Product Name') }}</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none" 
                                required>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                            <textarea 
                                name="description" 
                                id="description" 
                                rows="4" 
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none" 
                                required>
                            </textarea>
                        </div>

                        <!-- Product Image -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">{{ __('Product Image') }}</label>
                            <input 
                                type="file" 
                                name="image" 
                                id="image" 
                                class="mt-2 w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none" 
                                required>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-6">
                            <button 
                                type="submit" 
                                class="px-6 py-3 bg-purple-600 text-white rounded-md shadow-md hover:bg-purple-700 transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                {{ __('Save') }}
                            </button>
                        </div>

                        <!-- Validation Errors -->
                        @if ($errors->any())
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md mt-6">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
