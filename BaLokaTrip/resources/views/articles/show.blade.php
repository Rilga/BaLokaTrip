<x-app-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 nightowl-daylight">
                @if ($article->gambar)
                    <img src="{{ asset('storage/' . $article->gambar) }}" 
                        alt="{{ $article->judul }}" 
                        class="img-fluid rounded shadow"
                        style="max-width: 100%; height: auto;">
                @endif
                <a href="{{ route('article.download', $article->id) }}" class="btn btn-primary mt-3">
                    Download PDF
                </a>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5" style="height: auto; overflow: visible;">
                <br>
                <h1 style="font-size: 2rem;">{{ $article->judul }}</h1>
                <br><br>
                <p class="text-muted" style="text-align: justify; white-space: normal; word-wrap: break-word;">
                    {{ $article->konten }}
                </p>
        
            </div>
        </div>
    </div>
</x-app-layout>
