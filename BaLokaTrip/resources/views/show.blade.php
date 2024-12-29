{{-- Detail Wisata (User) --}}
<x-app-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/images/product/' . basename($product->image)) }}" 
                    alt="{{ $product->name }}" 
                    class="img-fluid rounded shadow">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <br>
                <h1 style="font-size: 2rem;">{{ $product->name }}</h1>
                <br><br>
                <p class="text-muted" style="text-align: justify;">{{ $product->description }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
