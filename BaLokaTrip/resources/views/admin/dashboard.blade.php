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

            .video-section {
                max-width: 1510px;
                margin: 0 auto;
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            .video-container {
                width: 100%;
                max-width: 75%;
                position: relative;
                padding-top: 40%;
                overflow: hidden;
            }

            .video-container iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border: 0;
            }

            .text-container {
                width: 100%;
                max-width: 20%;
                padding: 2rem;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            
        </style>
    </x-slot>
    <!-- Background Utama dengan Gambar -->
    <div class="nightowl-daylight relative min-h-[90vh] flex items-center justify-center" style="background-image: url('{{ asset('images/bglogin.jpg') }}'); background-size: cover; background-position: center;">
        <!-- Overlay Gelap -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="nightowl-daylight carousel slide" data-bs-ride="carousel">
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

    <div style="background-color: #cee2ec;">
    {{-- Promo --}}
    <div class="container ">
        <br><br><br>
        <h3 class="fw-bold text-center mb-4" style="font-size: 2rem;">Promo Menarik untuk Anda</h3>
        <br>
    
        <!-- Carousel Wrapper -->
        <div id="discountCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Looping Diskon -->
                @foreach ($discounts->chunk(3) as $chunkIndex => $chunk) <!-- Bagi data diskon per 3 -->
                    <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                        <div class="row justify-content-center">
                            @foreach ($chunk as $discount)
                                <div class="col-md-4">
                                    <div class="card" 
                                        style="border: 1px solid #FFD5B8; background-color: #FFF8F5; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); height: 170px; font-size: 14px; position: relative; overflow: hidden; padding: 10px;">
                                        
                                        <!-- Header Diskon -->
                                        <div style="background-color: #FFF2E5; padding: 10px; border-bottom: 1px dashed #FFD5B8; text-align: center;">
                                            <h6 style="margin: 0; font-size: 14px; color: #FF6F61; font-weight: bold;">
                                                {{ $discount->percentage ? 'Diskon ' . $discount->percentage . '%' : 'Diskon' }}
                                            </h6>
                                            <p style="margin: 0; font-size: 12px; color: #333;">Hingga Rp{{ number_format($discount->max_discount, 0, ',', '.') }}</p>
                                        </div>
                
                                        <!-- Konten Tengah -->
                                        <div style="padding: 10px;">
                                            <p style="margin: 0; font-size: 12px; color: #666;">Kode promo: <strong>{{ $discount->code }}</strong></p>
                                            <p style="margin: 5px 0 0 0; font-size: 12px; color: #999;">Min. pembelian: Rp{{ number_format($discount->min_purchase, 0, ',', '.') }}</p>
                                            
                                            <!-- Badge dan Tombol -->
                                            <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 5px;">
                                                <!-- Badge -->
                                                <span style="background-color: #FFD5B8; color: #FF6F61; padding: 5px 10px; font-size: 11px; border-radius: 15px;">
                                                    {{ $discount->description ?? 'Khusus Pesanan Pertama' }}
                                                </span>
                                                
                                                <!-- Tombol -->
                                                <a href="{{ route('user.ticket') }}" 
                                                    style="background-color: #FF6F61; color: white; padding: 6px 20px; font-size: 12px; border-radius: 20px; text-decoration: none; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                                    Tukarkan
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
    
            <!-- Carousel Controls -->
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#discountCarousel" data-bs-slide="prev" 
            style="width: 50px; height: 50px; background-color: rgba(0,0,0,0.5); border-radius: 50%; display: flex; align-items: center; justify-content: center; top: 50%; transform: translateY(-50%); position: absolute; left: -25px;">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #ffffff; border-radius: 50%;"></span>
            <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#discountCarousel" data-bs-slide="next" 
            style="width: 50px; height: 50px; background-color: rgba(0,0,0,0.5); border-radius: 50%; display: flex; align-items: center; justify-content: center; top: 50%; transform: translateY(-50%); position: absolute; right: -25px;">
            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #ffffff; border-radius: 50%;"></span>
            <span class="visually-hidden">Next</span>
            </button>


        </div>
    </div>
    

    <br><br><br>

    <div class="text-center mb-4">
        <h3 class="fw-bold text-center mb-4" style="font-size: 2rem;">Destinasi Wisata Menarik</h3>
        <p class="text-muted">Explore our amazing Destination</p>
    </div>


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

        <!-- Product List -->
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <a href="{{ route('show', $product->id) }}" class="text-decoration-none">
                        <div class="card h-100">
                            <div class="nightowl-daylight">
                            <img src="{{ asset('storage/images/product/' . basename($product->image)) }}" 
                                alt="{{ $product->name }}" 
                                class="product-image rounded-md shadow-sm">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <br><br><br>

    <h1 class="fw-bold text-center mb-4" style="font-size: 2rem;">Apa Kata Mereka ???</h1>
    <br>
    <div class="video-section">
        <div class="video-container nightowl-daylight">
            <iframe 
                src="https://drive.google.com/file/d/1baiIBgNJK0BHbuDUPRXsmfYoIB61eiQi/preview" 
                allow="autoplay">
            </iframe>
        </div>

        <div class="text-container">
            <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">Dusun Bambu, Dijamin Susah Move-on!</h2>
            <p style="color: #4a5568; margin-bottom: 1rem;">
                Ikut TOW yang ke-4 kalinya, pastinya happy banget. Ini jadi pengalaman pertama kali lagi
                untuk keluar dari rumah dengan protokol kesehatan dan segala adaptasi kenormalan baru. 
                Tapi di lain sisi juga sedih karena lihat anjloknya pariwisata Indonesia.
            </p>

            <!-- Icon Menu -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-8 mt-12 justify-items-center">
                <!-- Ticket -->
                <a href="{{ route('admin.ticket') }}" class="nightowl-daylight flex flex-col items-center space-y-3 group">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md transition duration-300 transform group-hover:scale-110">
                        <!-- Ikon Ticket -->
                        <i class="fas fa-ticket-alt text-gray-700 text-3xl"></i>
                    </div>
                    <p class="text-white font-medium group-hover:text-yellow-400">Ticket</p>
                </a>

                <!-- Product -->
                <a href="{{ route('admin.product') }}" class="nightowl-daylight flex flex-col items-center space-y-3 group">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md transition duration-300 transform group-hover:scale-110">
                        <!-- Ikon Keranjang Belanja -->
                        <i class="fas fa-shopping-cart text-gray-700 text-3xl"></i>
                    </div>
                    <p class="text-white font-medium group-hover:text-yellow-400">Product</p>
                </a>

                <!-- FAQ -->
                <a href="{{ route('admin.faq') }}" class="nightowl-daylight flex flex-col items-center space-y-3 group">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md transition duration-300 transform group-hover:scale-110">
                        <!-- Ikon Tanda Tanya (FAQ) -->
                        <i class="fas fa-question-circle text-gray-700 text-3xl"></i>
                    </div>
                    <p class="text-white font-medium group-hover:text-yellow-400">FAQ</p>
                </a>

                <!-- Article -->
                <a href="{{ route('admin.article') }}" class="nightowl-daylight flex flex-col items-center space-y-3 group">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md transition duration-300 transform group-hover:scale-110">
                        <!-- Ikon Artikel -->
                        <i class="fas fa-file-alt text-gray-700 text-3xl"></i>
                    </div>
                    <p class="text-white font-medium group-hover:text-yellow-400">Article</p>
                </a>

                <!-- Discount -->
                <a href="{{ route('admin.discount') }}" class="nightowl-daylight flex flex-col items-center space-y-3 group">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md transition duration-300 transform group-hover:scale-110">
                        <!-- Ikon Diskon -->
                        <i class="fas fa-percent text-gray-700 text-3xl"></i>
                    </div>
                    <p class="text-white font-medium group-hover:text-yellow-400">Discount</p>
                </a>
            </div>
        </div>
    </div>
    <br><br><br><br>
</div>
</x-app-layout>