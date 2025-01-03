<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="py-12 min-h-screen" style="background-color: #cee2ec;">
        <br><br>
        <h3 class="fw-bold text-center mb-4" style="font-size: 2rem;">Info Kegiatan Acara Bandung</h3>
        <br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($events as $event)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="nightowl-daylight">
                        @if ($event->image)
                            <img src="{{ asset('storage/events/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                        @endif
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-lg">{{ $event->title }}</h3>
                            <p class="text-gray-600 text-sm">{{ Str::limit($event->description, 100) }}</p>
                            <p class="mt-2 text-gray-800 font-medium">
                                <strong>Lokasi:</strong> {{ $event->location }}
                            </p>
                            <p class="text-gray-800 font-medium">
                                <strong>Tanggal:</strong> {{ $event->event_date }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($events->isEmpty())
                <p class="text-center text-white mt-8">Belum ada event yang tersedia.</p>
            @endif
        </div>
    </div>
</x-app-layout>
