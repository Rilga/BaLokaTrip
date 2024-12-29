<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-xl mb-4 font-bold">Daftar Artikel</h1>
                    <hr>

                    @if ($articles->count())
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($articles as $article)
                                <div class="article-card border-b border-gray-200 pb-4">
                                    <h2 class="text-lg font-semibold">{{ $article->judul }}</h2>
                                    
                                    @if ($article->gambar)
                                        <img src="{{ asset('storage/' . $article->gambar) }}" alt="Gambar Artikel" class="article-image mt-2">
                                    @endif

                                    <p class="text-gray-700 mt-2">{{ Str::limit($article->konten, 35) }}</p>
                                    <a href="{{ route('articles.show', $article->id) }}" 
                                        class="text-blue-600 font-semibold hover:text-blue-700 hover:underline mt-2 inline-block">
                                        Baca Selengkapnya &rarr;
                                    </a>

                                </div>
                            @endforeach
                        </div>

                        {{-- Pagination --}}
                        @if (method_exists($articles, 'links'))
                            <div class="mt-6">
                                {{ $articles->links() }}
                            </div>
                        @endif
                    @else
                        <p class="text-gray-700">Belum ada artikel yang tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        /* CSS untuk mengatur ukuran gambar artikel */
        .article-image {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 8px;
        }

        /* CSS untuk card artikel */
        .article-card {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
    </style>
</x-app-layout>
