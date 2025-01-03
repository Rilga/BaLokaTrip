<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <!-- Background biru -->
    <div class="py-12 min-h-screen" style="background-color: #cee2ec;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <br><br><br>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight border-b-2 border-gray-300 pb-2">
                    {{ __('Daftar FAQ') }}
                </h2>
                <br>

                <!-- Tombol Tambah FAQ -->
                <div class="mb-6 text-right nightowl-daylight">
                    <a href="{{ route('admin.faq.create') }}" 
                        class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-md shadow-md hover:bg-purple-700 transition-transform transform hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        {{ __('Tambah FAQ') }}
                    </a>
                </div>

                <!-- Tabel FAQ -->
                @if ($faqs->count())
                    <div class="overflow-x-auto sm:rounded-lg">
                        <table class="min-w-full table-auto bg-white rounded-lg shadow-md border border-gray-200">
                            <thead class="bg-gray-200 text-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('No') }}</th>
                                    <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Pertanyaan') }}</th>
                                    <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Jawaban') }}</th>
                                    <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm text-gray-700 divide-y divide-gray-200">
                                @foreach ($faqs as $faq)
                                    <tr class="hover:bg-gray-100 transition duration-300 ease-in-out">
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">{{ $faq->question }}</td>
                                        <td class="px-6 py-4">{{ Str::limit($faq->answer, 50) }}</td>
                                        <td class="px-6 py-4 flex space-x-4">
                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.faq.edit', $faq->id) }}" 
                                                class="nightowl-daylight inline-flex items-center px-4 py-2 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600 transition-transform transform hover:scale-105">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a4.5 4.5 0 11-6.364 6.364A5.002 5.002 0 005 12v5a1 1 0 001 1h4a1 1 0 001-1v-2h2v2a1 1 0 001 1h4a1 1 0 001-1v-5a5.002 5.002 0 00-4.868-5.232z" />
                                                </svg>
                                                {{ __('Edit') }}
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus FAQ ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="nightowl-daylight inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md shadow-md hover:bg-red-700 transition-transform transform hover:scale-105">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
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
                    <p class="text-gray-500 mt-4">{{ __('Tidak ada FAQ yang ditemukan.') }}</p>
                @endif
            </div>
        </div>
        <br><br><br>
    </div>
</x-app-layout>
