<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <!-- Background biru -->
    <div class="py-12 min-h-screen" style="background-color: #cee2ec;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <br><br><br>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight border-b-2 border-gray-300 pb-2">
                    {{ __('Edit Event') }}
                </h2>
                <br>

                <!-- Form Edit Event -->
                <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-6">
                        <!-- Input Judul -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Judul') }}</label>
                            <input 
                                type="text" 
                                name="title" 
                                id="title" 
                                value="{{ old('title', $event->title) }}" 
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none @error('title') border-red-500 @enderror" 
                                required>
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input Deskripsi -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Deskripsi') }}</label>
                            <textarea 
                                name="description" 
                                id="description" 
                                rows="4" 
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none @error('description') border-red-500 @enderror" 
                                required>{{ old('description', $event->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input Lokasi -->
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700">{{ __('Lokasi') }}</label>
                            <input 
                                type="text" 
                                name="location" 
                                id="location" 
                                value="{{ old('location', $event->location) }}" 
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none @error('location') border-red-500 @enderror" 
                                required>
                            @error('location')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input Tanggal -->
                        <div>
                            <label for="event_date" class="block text-sm font-medium text-gray-700">{{ __('Tanggal Event') }}</label>
                            <input 
                                type="date" 
                                name="event_date" 
                                id="event_date" 
                                value="{{ old('event_date', $event->event_date) }}" 
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none @error('event_date') border-red-500 @enderror" 
                                required>
                            @error('event_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input Gambar -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">{{ __('Gambar') }}</label>
                            <input 
                                type="file" 
                                name="image" 
                                id="image" 
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none @error('image') border-red-500 @enderror">
                            @if ($event->image)
                                <img src="{{ asset('storage/events/' . $event->image) }}" alt="{{ $event->title }}" class="rounded mt-4" width="150">
                            @endif
                            @error('image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tombol Update -->
                        <div class="flex justify-end mt-6 space-x-4">
                            <a href="{{ route('admin.event') }}" 
                                class="px-6 py-3 bg-gray-600 text-white rounded-md shadow-md hover:bg-gray-700 transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-400">
                                {{ __('Batal') }}
                            </a>
                            <button 
                                type="submit" 
                                class="px-6 py-3 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600 transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Error Validasi -->
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md mt-6">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <br><br><br><br>
    </div>
</x-app-layout>
