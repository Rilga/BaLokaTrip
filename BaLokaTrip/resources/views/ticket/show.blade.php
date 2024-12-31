<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="container py-5">
        <div class="row">
            <!-- Display product details -->
            <div class="col-md-6">
                <img src="{{ asset('storage/images/product/' . basename($product->image)) }}" alt="{{ $product->name }}" class="img-fluid rounded-md shadow-sm">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p><strong>Price:</strong> ${{ $product->price }}</p>
                <p><strong>Available Stock:</strong> {{ $product->stock }}</p>
                
                <!-- Add a 'Buy Now' button -->
                <a href="#" class="btn btn-primary">Buy Now</a>
            </div>
        </div>
    </div>
</x-app-layout>
