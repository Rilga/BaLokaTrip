<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Ticket') }}
        </h2>
    </x-slot>
    <br>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Button to add new ticket -->
                    <div class="mb-6 text-right">
                        <a href="{{ route('admin.tickets.create') }}" class="px-4 py-2 rounded-md shadow-md text-white" style="padding-right: 20px; background-color: #3717aa;">
                            {{ __('Tambah Tiket') }}
                        </a>
                    </div>

                    <!-- Table to display tickets -->
                    @if ($tickets->count())
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto bg-white rounded-lg shadow-md border-separate border-spacing-0">
                                <thead class="bg-gray-200 text-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Nama Tiket') }}</th>
                                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Wisata') }}</th>
                                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Harga') }}</th>
                                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Stok') }}</th>
                                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider">{{ __('Aksi') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm text-gray-700">
                                    @foreach ($tickets as $ticket)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="px-6 py-4">{{ $ticket->name }}</td>
                                            
                                            <td class="px-6 py-4">{{ $ticket->product ? $ticket->product->name : 'No product' }}</td>
                                            <td class="px-6 py-4">Rp{{ number_format($ticket->price, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4">{{ $ticket->stock }}</td>
                                            <td class="px-6 py-4 flex justify-start space-x-4">
                                                <!-- Edit Button with Style -->
                                                <a href="{{ route('admin.tickets.edit', $ticket->id) }}" style="background-color: rgb(36, 151, 36)" class="inline-flex items-center px-4 py-2 text-white rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a4.5 4.5 0 11-6.364 6.364A5.002 5.002 0 005 12v5a1 1 0 001 1h4a1 1 0 001-1v-2h2v2a1 1 0 001 1h4a1 1 0 001-1v-5a5.002 5.002 0 00-4.868-5.232z" />
                                                    </svg>
                                                    {{ __('Edit') }}
                                                </a>

                                                <!-- Delete Button with Style -->
                                                <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus tiket ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
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
