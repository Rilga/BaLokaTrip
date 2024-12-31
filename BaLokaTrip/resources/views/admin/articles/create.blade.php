<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <!-- Background biru -->
    <div class="py-12 bg-blue-700 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <br><br><br>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight border-b-2 border-gray-300 pb-2">
                    {{ __('Tambah Artikel') }}
                </h2>
                <br>

                <!-- Form Tambah Artikel -->
                <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Input Judul -->
                    <div class="mb-6">
                        <label for="judul" class="block text-sm font-medium text-gray-700">{{ __('Judul Artikel') }}</label>
                        <input 
                            type="text" 
                            name="judul" 
                            id="judul" 
                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none @error('judul') border-red-500 @enderror" 
                            value="{{ old('judul') }}" 
                            required>
                        @error('judul')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Konten -->
                    <div class="mb-6">
                        <label for="konten" class="block text-sm font-medium text-gray-700">{{ __('Konten Artikel') }}</label>
                        <textarea 
                            name="konten" 
                            id="konten" 
                            rows="6" 
                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none @error('konten') border-red-500 @enderror" 
                            required>{{ old('konten') }}</textarea>
                        @error('konten')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Gambar -->
                    <div class="mb-6">
                        <label for="gambar" class="block text-sm font-medium text-gray-700">{{ __('Upload Gambar') }}</label>
                        <input 
                            type="file" 
                            name="gambar" 
                            id="gambar" 
                            class="mt-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none @error('gambar') border-red-500 @enderror">
                        @error('gambar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex justify-end mt-6 space-x-4">
                        <a href="{{ route('admin.article') }}" 
                            class="px-6 py-3 bg-gray-600 text-white rounded-md shadow-md hover:bg-gray-700 transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-400">
                            {{ __('Batal') }}
                        </a>
                        <button 
                            type="submit" 
                            class="px-6 py-3 bg-purple-600 text-white rounded-md shadow-md hover:bg-purple-700 transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500">
                            {{ __('Simpan Artikel') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
