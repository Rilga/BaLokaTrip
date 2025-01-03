<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <!-- Background biru -->
    <div class="py-12 min-h-screen" style="background-color: #cee2ec;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <br><br><br>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight border-b-2 border-gray-300 pb-2">
                    {{ __('Tambah FAQ') }}
                </h2>
                <br>

                <!-- Form Tambah FAQ -->
                <form action="{{ route('admin.faq.store') }}" method="POST">
                    @csrf
                    <div class="space-y-6">
                        <!-- Input Pertanyaan -->
                        <div>
                            <label for="question" class="block text-sm font-medium text-gray-700">{{ __('Pertanyaan') }}</label>
                            <input 
                                type="text" 
                                name="question" 
                                id="question" 
                                value="{{ old('question') }}" 
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none @error('question') border-red-500 @enderror" 
                                required>
                            @error('question')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input Jawaban -->
                        <div>
                            <label for="answer" class="block text-sm font-medium text-gray-700">{{ __('Jawaban') }}</label>
                            <textarea 
                                name="answer" 
                                id="answer" 
                                rows="4" 
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300 focus:outline-none @error('answer') border-red-500 @enderror" 
                                required>{{ old('answer') }}</textarea>
                            @error('answer')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="flex justify-end mt-6 space-x-4">
                            <a href="{{ route('admin.faq') }}" 
                               class="px-6 py-3 bg-gray-600 text-white rounded-md shadow-md hover:bg-gray-700 transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-400">
                                {{ __('Batal') }}
                            </a>
                            <button 
                                type="submit" 
                                class="px-6 py-3 bg-purple-600 text-white rounded-md shadow-md hover:bg-purple-700 transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                {{ __('Simpan') }}
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
    </div>
</x-app-layout>
