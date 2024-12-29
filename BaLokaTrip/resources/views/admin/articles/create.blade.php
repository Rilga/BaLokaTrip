<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Artikel') }}
        </h2>
    </x-slot>
    <br>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Form Tambah Artikel -->
                    <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Input Judul -->
                        <div class="mb-6">
                            <label for="judul" class="block text-sm font-medium text-gray-700">{{ __('Judul Artikel') }}</label>
                            <input type="text" name="judul" id="judul" class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-300 @error('judul') border-red-500 @enderror" value="{{ old('judul') }}" required>
                            @error('judul')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input Konten -->
                        <div class="mb-6">
                            <label for="konten" class="block text-sm font-medium text-gray-700">{{ __('Konten Artikel') }}</label>
                            <textarea name="konten" id="konten" rows="6" class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-300 @error('konten') border-red-500 @enderror" required>{{ old('konten') }}</textarea>
                            @error('konten')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input Gambar -->
                        <div class="mb-6">
                            <label for="gambar" class="block text-sm font-medium text-gray-700">{{ __('Upload Gambar') }}</label>
                            <input type="file" name="gambar" id="gambar" class="mt-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:border-indigo-300 @error('gambar') border-red-500 @enderror">
                            @error('gambar')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div class="text-right">
                            <a href="{{ route('admin.article') }}" class="inline-block px-4 py-2 text-sm bg-gray-600 rounded-md shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50">
                                {{ __('Batal') }}
                            </a>
                            <button type="submit" class="inline-block px-4 py-2 bg-indigo-600 rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-50">
                                {{ __('Simpan Artikel') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
