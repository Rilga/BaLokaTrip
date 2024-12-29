<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit FAQ') }}
        </h2>
    </x-slot>

    <br>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <!-- Form untuk mengedit FAQ -->
                <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-6">

                        <!-- Pertanyaan -->
                        <div>
                            <label for="question" class="block text-sm font-medium text-gray-700">{{ __('Pertanyaan') }}</label>
                            <input type="text" name="question" id="question" value="{{ old('question', $faq->question) }}" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                            @error('question')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Jawaban -->
                        <div>
                            <label for="answer" class="block text-sm font-medium text-gray-700">{{ __('Jawaban') }}</label>
                            <textarea name="answer" id="answer" rows="4" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('answer', $faq->answer) }}</textarea>
                            @error('answer')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol Update -->
                        <div class="flex justify-end mt-6">
                            <button type="submit" style="background-color: #22a41b;" class="text-white px-6 py-3 rounded-md shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200 ease-in-out">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Menampilkan Error jika ada -->
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Kembali ke Daftar FAQ -->
                <div class="mt-4">
                    <a href="{{ route('admin.faq') }}" class="text-sm text-indigo-600 hover:text-indigo-900">
                        {{ __('Kembali ke Daftar FAQ') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
