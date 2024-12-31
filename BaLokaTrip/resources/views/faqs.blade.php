{{-- Faq (User) --}}
<x-app-layout>
    <x-slot name="header"></x-slot>
    <div class="con" style="background: {{ asset('images/bannerfaq.png') }} no-repeat center center; background-size: cover;">
        <img src="{{ asset('images/bannerfaq.png') }}">
    </div>

    <div class="py-12" style="background-color: #3351DC; padding: 0px;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-xl mb-4"><b>Pertanyaan populer</b></h1>
                    <hr>
                    <div class="space-y-4">
                        @foreach($faqs as $faq)
                            <div x-data="{ open: false }" class="border-b border-gray-200">
                                <button @click="open = !open" class="w-full text-left py-4 px-4 focus:outline-none flex justify-between items-center">
                                    <span class="font-semibold text-lg">{{ $faq->question }}</span>
                                    <svg x-bind:class="{ 'rotate-180': open }" class="h-5 w-5 transform transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div x-show="open" class="p-4 text-gray-700">
                                    {!! nl2br(e($faq->answer)) !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
    </div>
</x-app-layout>
