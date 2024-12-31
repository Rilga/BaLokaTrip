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
                    <h1 class="text-3xl mb-4 font-bold text-center">Find Your Artikel !!!</h1>
                    <hr>

                    @if ($articles->count())
                        <!-- Grid Centering Artikel -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 justify-items-center">
                            @foreach ($articles as $article)
                                <div class="article-card border-b border-gray-200 pb-4 text-center">
                                    <h2 class="text-md font-semibold">{{ $article->judul }}</h2>
                                    
                                    @if ($article->gambar)
                                        <img src="{{ asset('storage/' . $article->gambar) }}" alt="Gambar Artikel" class="article-image mt-2">
                                    @endif

                                    <p class="text-gray-700 mt-2 text-sm">{{ Str::limit($article->konten, 35) }}</p>
                                    <a href="{{ route('articles.show', $article->id) }}" 
                                        class="text-blue-600 font-semibold hover:text-blue-700 hover:underline mt-2 inline-block">
                                        Baca Selengkapnya &rarr;
                                    </a>

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
                        <p class="text-gray-700">Belum ada artikel yang tersedia.</p>
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
            height: auto;
            object-fit: cover;
            border-radius: 8px;
            max-height: 250px;
            transition: transform 0.3s ease;
        }

        /* Zoom efek pada gambar saat hover */
        .article-image:hover {
            transform: scale(1.05);
        }

        /* CSS untuk card artikel */
        .article-card {
            display: flex;
            flex-direction: column;
            align-items: center; /* Menyusun konten artikel di tengah */
            justify-content: center;
            padding: 15px;  
            border-radius: 8px;
            max-width: 300px;
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Transisi */
        }

        /* Hover efek pada artikel card */
        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); /* Shadow lebih besar saat hover */
        }

        /* Mengatur ukuran teks judul dan konten */
        .article-card h2 {
            font-size: 1rem;
        }

        .article-card p {
            font-size: 0.875rem;
        }

        /* Kategori / Tag */
        .article-card span {
            font-size: 0.875rem;
            background-color: #f3f4f6;
            padding: 2px 8px;
            border-radius: 12px;
        }

        /* Responsif untuk tampilan lebih baik di perangkat mobile */
        @media (max-width: 768px) {
            .article-card {
                max-width: 100%;
                padding: 20px;
            }

            .article-card h2 {
                font-size: 1rem;
            }

            .article-card p {
                font-size: 0.75rem;
            }
        }
    </style>
</x-app-layout>
