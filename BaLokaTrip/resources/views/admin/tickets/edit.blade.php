<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <!-- Background biru -->
    <div class="py-12 min-h-screen" style="background-color: #cee2ec;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <br><br><br>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight border-b-2 border-gray-300 pb-2">
                    {{ __('Edit Ticket') }}
                </h2>
                <br>
                <form action="{{ route('admin.tickets.update', $ticket->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-6">

                        <!-- Ticket Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Ticket Name') }}</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                value="{{ old('name', $ticket->name) }}" 
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none" 
                                required>
                        </div>

                        <!-- Price -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">{{ __('Price') }}</label>
                            <input 
                                type="number" 
                                name="price" 
                                id="price" 
                                value="{{ old('price', $ticket->price) }}" 
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none" 
                                required>
                        </div>

                        <!-- Stock -->
                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700">{{ __('Stock') }}</label>
                            <input 
                                type="number" 
                                name="stock" 
                                id="stock" 
                                value="{{ old('stock', $ticket->stock) }}" 
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none" 
                                required>
                        </div>

                        <!-- Tourist Attraction (Wisata) -->
                        <div>
                            <label for="product_id" class="block text-sm font-medium text-gray-700">{{ __('Tourist Attraction') }}</label>
                            <select 
                                name="product_id" 
                                id="product_id" 
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none" 
                                required>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ $product->id == $ticket->product_id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-6">
                            <button 
                                type="submit" 
                                class="px-6 py-3 bg-purple-600 text-white rounded-md shadow-md hover:bg-purple-700 transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                {{ __('Update Ticket') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
