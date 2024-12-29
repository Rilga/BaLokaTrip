<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Artikel') }}
        </h2>
    </x-slot>
    <br>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Tombol untuk menambah artikel -->
                    <div class="mb-6 text-right">
                    <a href="{{ route('admin.article.create') }}" class="px-4 py-2 rounded-md shadow-md text-white" style="background-color: #3717aa;">
                    {{ __("Tambah Artikel") }}
                    </a>
                </div>
            
                <!-- Tabel Artikel -->
                @if ($articles->count())
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto bg-white rounded-lg shadow-md border-separate border-spacing-0">
                                <thead class="bg-gray-200 text-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('No') }}</th>
                                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Judul') }}</th>
                                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Konten') }}</th>
                                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Gambar') }}</th>
                                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Aksi') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm text-gray-700">
                                    @foreach ($articles as $article)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                            <td class="px-6 py-4">{{ $article->judul }}</td>
                                            <td class="px-6 py-4">{{ Str::limit($article->konten, 50) }}</td>
                                            <td class="px-6 py-4">
                                                <img src="{{ asset('storage/' . $article->gambar) }}" alt="Gambar Artikel" width="50">
                                            </td>
                                            <td class="px-6 py-4 flex justify-start space-x-4">
                                                <!-- Tombol Edit -->
                                                <a href="{{ route('admin.article.edit', $article->id) }}" class="inline-flex items-center px-4 py-2 bg-green-600 rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                                    {{ __('Edit') }}
                                                </a>
                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('admin.article.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                                        {{ __('Hapus') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500">{{ __('Tidak ada artikel yang ditemukan.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>