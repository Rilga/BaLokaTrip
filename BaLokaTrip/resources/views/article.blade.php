<x-app-layout>
    <x-slot name="header"></x-slot>
    <!-- Banner Section -->
    <div class="con relative bg-cover bg-center" style="background: url('{{ asset('images/bannerarticle.png') }}') no-repeat center center; background-size: cover; height: 300px;">
        <div class="absolute inset-0 flex items-center justify-center">
        </div>
    </div>

    <!-- Artikel Section -->
    <div class="py-12" style="background-color: #3351DC; padding: 0px;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl mb-6 font-bold text-center">Find Your Artikel !!!</h1>

                    @if ($articles->count())
                        <!-- Grid Centering Artikel -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach ($articles as $article)
                                <div class="article-card bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                                    <div class="nightowl-daylight">
                                    @if ($article->gambar)
                                        <img src="{{ asset('storage/' . $article->gambar) }}" alt="Gambar Artikel" class="article-image">
                                    @endif
                                    </div>
                                    <div class="p-4 text-center">
                                        <h2 class="text-lg font-semibold text-gray-800">{{ $article->judul }}</h2>
                                        <p class="text-gray-600 mt-2 text-sm">{{ Str::limit($article->konten, 50) }}</p>
                                        <a href="{{ route('articles.show', $article->id) }}" 
                                            class="text-blue-600 font-semibold hover:text-blue-700 hover:underline mt-4 inline-block">
                                            Baca Selengkapnya &rarr;
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Pagination --}}
                        @if (method_exists($articles, 'links'))
                            <div class="mt-6 text-center">
                                {{ $articles->links() }}
                            </div>
                        @endif
                    @else
                        <p class="text-gray-700 text-center">Belum ada artikel yang tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
        <br><br><br>
    </div>

    <style>
        /* CSS untuk mengatur ukuran gambar artikel */
        .article-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        /* Hover efek pada gambar */
        .article-image:hover {
            transform: scale(1.1);
        }

        /* Card Artikel */
        .article-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        /* Responsive Grid */
        @media (max-width: 768px) {
            .article-image {
                height: 150px;
            }
        }
    </style>
</x-app-layout>
