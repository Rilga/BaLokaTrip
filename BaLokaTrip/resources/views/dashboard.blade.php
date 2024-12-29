{{-- Tampilan Home (User) --}}
<x-app-layout>
    <x-slot name="header">
        <style>
            /* Menghapus margin dan padding pada body dan html */
            .carousel-caption {
                position: absolute;
                top: 30%; /* Jarak vertikal dari atas */
                left: 13%; /* Jarak horizontal dari sisi kiri */
                transform: none; /* Nonaktifkan transformasi jika ada konflik */
                color: rgb(15, 13, 13);
                text-align: left; /* Pastikan teks rata kiri */
                z-index: 10;
                max-width: 20%; /* Membatasi lebar teks agar tidak terlalu panjang */
            }

            .carousel-caption h5 {
                font-size: 2.5rem;
                font-weight: bold;
                margin-bottom: 10px;
            }

            .carousel-caption p {
                font-size: 1.2rem;
                margin: 0;
            }

            .carousel-item {
                transition: none !important;
            }

            /* Tambahkan animasi flash */
            @keyframes flash {
                0%, 100% { opacity: 1; }
                20% { opacity: 0; }
            }

            .carousel-item {
                animation: flash 0.5s ease-in-out;
            }

            .carousel-item img {
                height: 50vh; /* Tinggi gambar pada carousel */
                object-fit: cover;
                width: 100%;
            }
            .product-image {
                width: 100%; /* Lebar penuh sesuai dengan card */
                height: 200px; /* Tinggi tetap */
                object-fit: cover; /* Memastikan gambar sesuai ukuran tanpa distorsi */
            }

        </style>
    </x-slot>

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/c11.png') }}" class="d-block w-100" alt="First Slide">
                <div class="carousel-caption d-none d-md-block">
                    {{-- <h5>Your world of joy</h5>
                    <p>Wisata domestik sampai ujung Bandung, temukan semua aktivitas yang bisa membuat bahagia</p> --}}
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/c22.png') }}" class="d-block w-100" alt="Second Slide">
                <div class="carousel-caption d-none d-md-block">
                    {{-- <h5>Your world of joy</h5>
                    <p>Wisata domestik sampai ujung Bandung, temukan semua aktivitas yang bisa membuat bahagia</p> --}}
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/c33.png') }}" class="d-block w-100" alt="Third Slide">
                <div class="carousel-caption d-none d-md-block">
                    {{-- <h5>Your world of joy</h5>
                    <p>Wisata domestik sampai ujung Bandung, temukan semua aktivitas yang bisa membuat bahagia</p> --}}
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <br><br><br>

    <!-- Search Form -->
    <form method="GET" action="{{ route('dashboard') }}" class="d-flex align-items-center">
        <div class="input-group w-50 mx-auto">
            <!-- Icon Pencarian -->
            <span class="input-group-text" id="search-icon">
                <i class="bi bi-search"></i> <!-- Ikon pencarian dari Bootstrap Icons -->
            </span>
            <input type="text" name="search" class="form-control" placeholder="Cari Destinasi Wisata anda..." value="{{ $search ?? '' }}" aria-describedby="search-icon">
            <button type="submit" class="btn btn-primary">
                Cari
            </button>
        </div>
    </form>
    
    {{-- tampilan wisata --}}
    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">Our Destination</h1>
            <p class="text-muted">Explore our amazing Destination</p>
        </div>


        <!-- Product List -->
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <a href="{{ route('show', $product->id) }}" class="text-decoration-none">
                        <div class="card h-100">
                            <img src="{{ asset('storage/images/product/' . basename($product->image)) }}" 
                                alt="{{ $product->name }}" 
                                class="product-image rounded-md shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


</x-app-layout>
