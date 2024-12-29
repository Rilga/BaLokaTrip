<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Artikel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-700">{{ __('Perbarui Artikel') }}</h3>

                    <!-- Form to update an article -->
                    <form action="{{ route('admin.article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Set HTTP method to PUT -->

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="judul" class="block text-sm font-medium text-gray-700">{{ __('Judul') }}</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $article->judul) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                required>
                            @error('judul')
                                <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="mb-4">
                            <label for="konten" class="block text-sm font-medium text-gray-700">{{ __('Konten') }}</label>
                            <textarea name="konten" id="konten" rows="5" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    required>{{ old('konten', $article->konten) }}</textarea>
                            @error('konten')
                                <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label for="gambar" class="block text-sm font-medium text-gray-700">{{ __('Gambar') }}</label>
                            <input type="file" name="gambar" id="gambar"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <p class="text-sm text-gray-500 mt-2">{{ __('Biarkan kosong jika tidak ingin mengubah gambar.') }}</p>
                            @if ($article->gambar)
                                <div class="mt-4">
                                    <img src="{{ asset('storage/' . $article->gambar) }}" alt="Gambar Artikel" class="w-32 h-32 object-cover">
                                </div>
                            @endif
                            @error('gambar')
                                <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-600 rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                {{ __('Simpan Perubahan') }}
                            </button>
                            <a href="{{ route('admin.article') }}" 
                                class="ml-4 px-4 py-2 bg-gray-600 rounded-md shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                                {{ __('Batal') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
