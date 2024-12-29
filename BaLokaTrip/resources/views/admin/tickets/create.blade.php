<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Ticket') }}
        </h2>
    </x-slot>
    <br>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <form action="{{ route('admin.tickets.store') }}" method="POST">
                    @csrf
                    <div class="space-y-6">

                        <!-- Ticket Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Ticket Name') }}</label>
                            <input type="text" name="name" id="name" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Product (Wisata) -->
                        <div>
                            <label for="product_id" class="block text-sm font-medium text-gray-700">{{ __('Select Tourist Attraction') }}</label>
                            <select name="product_id" id="product_id" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                                <option value="" disabled selected>{{ __('Select a Product') }}</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">{{ __('Ticket Price') }}</label>
                            <input type="number" name="price" id="price" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required min="0" step="0.01">
                        </div>

                        <!-- Stock -->
                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700">{{ __('Stock Quantity') }}</label>
                            <input type="number" name="stock" id="stock" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required min="0">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-6">
                            <button type="submit" style="background-color: #3717aa;" class="text-white px-6 py-3 rounded-md shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200 ease-in-out">
                                {{ __('Save') }}
                            </button>
                        </div>

                        <!-- Validation Errors -->
                        @if ($errors->any())
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4">
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
