<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Discount') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen" style="background-color: #cee2ec;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <br><br><br>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight border-b-2 border-gray-300 pb-2">
                    {{ __('Update Discount') }}
                </h2>
                <br>

                <form action="{{ route('admin.discount.update', $discount->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="code" class="block text-sm font-medium text-gray-700">Discount Code</label>
                        <input type="text" name="code" id="code" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" 
                                value="{{ $discount->code }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="percentage" class="block text-sm font-medium text-gray-700">Percentage</label>
                        <input type="number" name="percentage" id="percentage" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" 
                                value="{{ $discount->percentage }}" min="0" max="100">
                    </div>
                    <div class="mb-4">
                        <label for="fixed_amount" class="block text-sm font-medium text-gray-700">Fixed Amount</label>
                        <input type="number" name="fixed_amount" id="fixed_amount" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" 
                                value="{{ $discount->fixed_amount }}" min="0">
                    </div>
                    <div class="mb-4">
                        <label for="valid_from" class="block text-sm font-medium text-gray-700">Valid From</label>
                        <input type="date" name="valid_from" id="valid_from" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" 
                                value="{{ $discount->valid_from }}">
                    </div>
                    <div class="mb-4">
                        <label for="valid_until" class="block text-sm font-medium text-gray-700">Valid Until</label>
                        <input type="date" name="valid_until" id="valid_until" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" 
                                value="{{ $discount->valid_until }}">
                    </div>
                    <div class="text-right">
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md shadow-md hover:bg-green-700 transition-transform transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            {{ __('Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <br><br><br>
    </div>
</x-app-layout>