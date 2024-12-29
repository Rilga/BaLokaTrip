<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>
    <br>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-6">

                        <!-- Product Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Product Name') }}</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                            <textarea name="description" id="description" rows="4" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('description', $product->description) }}</textarea>
                        </div>

                        <!-- Product Image -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">{{ __('Product Image') }}</label>
                            <input type="file" name="image" id="image" class="mt-2 w-full text-sm text-gray-700 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Current Image Display -->
                        @if ($product->image)
                            <div class="mt-4">
                                <p class="text-sm text-gray-600">{{ __('Current Image') }}</p>
                                <img src="{{ asset('storage/images/product/' . basename($product->image)) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-md shadow-sm">
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-6">
                            <button type="submit" style="background-color: #22a41b;" class="text-white px-6 py-3 rounded-md shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200 ease-in-out">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
