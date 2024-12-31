<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <!-- Background biru -->
    <div class="py-12 bg-blue-700 min-h-screen">
        <br><br><br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight border-b-2 border-gray-300 pb-2">
                        {{ __('Daftar Ticket') }}
                    </h2>
                    <br>    
                    <div class="mb-4 flex items-center justify-between">
                        <!-- Form pencarian tiket -->
                        <form method="GET" action="{{ route('admin.ticket') }}" class="flex items-center flex-grow">
                            <input 
                                type="text" 
                                name="search" 
                                placeholder="Cari tiket..." 
                                class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none w-2/3 md:w-2/3 text-base"
                                value="{{ request('search') }}"
                            >
                            <button 
                                type="submit" 
                                class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600">
                                Cari
                            </button>
                        </form>
                    
                        <!-- Tombol tambah tiket -->
                        <a href="{{ route('admin.tickets.create') }}" 
                            class="ml-4 inline-flex items-center px-4 py-2 rounded-md shadow-md text-white bg-purple-600 hover:bg-purple-700 transition-transform transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            {{ __('Tambah Tiket') }}
                        </a>
                    </div>
                    

                    <!-- Table to display tickets -->
                    @if ($tickets->count())
                        <div class="overflow-x-auto sm:rounded-lg">
                            <table class="min-w-full table-auto bg-white rounded-lg shadow-md border border-gray-200 animate-fadeIn">
                                <thead class="bg-gray-200 text-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Nama Tiket') }}</th>
                                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Wisata') }}</th>
                                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Harga') }}</th>
                                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Stok') }}</th>
                                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Aksi') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm text-gray-700 divide-y divide-gray-200">
                                    @foreach ($tickets as $ticket)
                                        <tr class="{{ $loop->even ? 'bg-gray-100' : '' }} hover:bg-gray-200 transition duration-300 ease-in-out">
                                            <td class="px-6 py-4">{{ $ticket->name }}</td>
                                            <td class="px-6 py-4">{{ optional($ticket->product)->name ?? 'No product' }}</td>
                                            <td class="px-6 py-4">Rp{{ number_format($ticket->price, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4">
                                                @if ($ticket->stock > 10)
                                                    <span class="inline-block px-3 py-1 bg-green-200 text-green-700 text-xs font-semibold rounded-md">Cukup</span>
                                                @elseif ($ticket->stock > 0 && $ticket->stock <= 10)
                                                    <span class="inline-block px-3 py-1 bg-yellow-200 text-yellow-700 text-xs font-semibold rounded-md">Hampir Habis</span>
                                                @else
                                                    <span class="inline-block px-3 py-1 bg-red-200 text-red-700 text-xs font-semibold rounded-md">Habis</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 flex justify-start space-x-4">
                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.tickets.edit', $ticket->id) }}" 
                                                    class="inline-flex items-center px-4 py-2 text-white rounded-md shadow-md bg-green-500 hover:bg-green-600 transition-transform transform hover:scale-105"
                                                    title="Edit Tiket">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a4.5 4.5 0 11-6.364 6.364A5.002 5.002 0 005 12v5a1 1 0 001 1h4a1 1 0 001-1v-2h2v2a1 1 0 001 1h4a1 1 0 001-1v-5a5.002 5.002 0 00-4.868-5.232z" />
                                                    </svg>
                                                    {{ __('Edit') }}
                                                </a>
                                                <!-- Delete Button -->
                                                <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus tiket ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md shadow-md hover:bg-red-700 transition-transform transform hover:scale-105"
                                                            title="Hapus Tiket">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                
                    @else
                        <p class="text-gray-500">{{ __('No tickets found.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
