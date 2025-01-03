{{-- Tampilan Awal sebelum login --}}
@extends('layouts.front')

@section('meta')
<meta name="description" content="about your website">
@endsection

@section('title')
    <title>Home Page</title>
@endsection

@section('style')
    <style>
    .carousel-caption {
        position: absolute;
        top: 30%; /* Jarak vertikal dari atas */
        left: 5%; /* Jarak horizontal dari sisi kiri */
        transform: none; /* Nonaktifkan transformasi jika ada konflik */
        color: #000000;
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
        height: 90vh; /* Tinggi gambar pada carousel */
        object-fit: cover;
        width: 100%;
    }

    .featurette-divider {
        margin: 4rem 0; /* Spasi antar featurette */
    }

    .featurette-heading {
        font-weight: bold;
        font-size: 2rem;
    }

    .featurette img {
        height: 400px;
        object-fit: cover;
        width: 100%;
    }
    .image-container img {
        border: 1px solid #0b0b0c; /* Border halus */
        border-radius: 10px; /* Sudut melengkung */
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Transisi halus */
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Bayangan halus */
    }

    /* Efek hover untuk gambar */
    .image-container img:hover {
        transform: scale(1.05); /* Membesarkan gambar sedikit saat di-hover */
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2); /* Bayangan lebih kuat saat di-hover */
    }

    /* Efek caption dengan overlay */
    .image-container figcaption {
        background-color: rgba(0, 0, 0, 0.5); /* Latar belakang semi transparan */
        color: #fff; /* Teks berwarna putih */
        padding: 10px;
        border-radius: 0 0 10px 10px; /* Sudut melengkung pada bawah */
        text-align: center;
        position: absolute;
        bottom: 0;
        width: 100%;
        display: none; /* Sembunyikan caption secara default */
    }

    /* Menampilkan caption saat gambar di-hover */
    .image-container:hover figcaption {
        display: block; /* Tampilkan caption saat gambar di-hover */
    }

    /* Membuat container lebih responsif */
    .image-container {
        position: relative;
        overflow: hidden;
    }
    </style>
@endsection

@section('content')

<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide nightowl-daylight" data-bs-ride="carousel" >
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/ca1.jpeg') }}" class="d-block w-100" alt="First Slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Your world of joy</h5>
                <p>Wisata domestik sampai ujung Bandung, temukan semua aktivitas yang bisa membuat bahagia</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/ca5.jpeg') }}" class="d-block w-100" alt="Second Slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Your world of joy</h5>
                <p>Wisata domestik sampai ujung Bandung, temukan semua aktivitas yang bisa membuat bahagia</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/ca3.jpeg') }}" class="d-block w-100" alt="Third Slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Your world of joy</h5>
                <p>Wisata domestik sampai ujung Bandung, temukan semua aktivitas yang bisa membuat bahagia</p>
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

<br><br><br><br>

    <!-- Three columns of text below the carousel -->
    <div style="max-width: 1200px; margin: 0 auto; padding: 40px; text-align: center; font-family: 'Poppins', sans-serif;">
        <h2 style="font-size: 42px; font-weight: 600; color: #333; margin-bottom: 50px; text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.15);">
            Keuntungan Menggunakan BaLoka
        </h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
            <!-- Card 1 -->
            <div style="background: #ffffff; border-radius: 16px; padding: 25px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); transform: perspective(800px) rotateX(0deg); transition: transform 0.3s, box-shadow 0.3s; cursor: pointer;"
                onmouseover="this.style.transform='perspective(800px) rotateX(-3deg) translateY(-10px)'; this.style.boxShadow='0 12px 18px rgba(0, 0, 0, 0.2)';"
                onmouseout="this.style.transform='perspective(800px) rotateX(0deg)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.1)';">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(99, 164, 255, 0.1); margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;" class="nightowl-daylight">
                    <img src="{{ asset('images/plane.png') }}" alt="Ikon 1" style="width: 50px; height: 50px;">
                </div>
                <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 10px; color: #222;">Temukan Kegembiraan</h3>
                <p style="font-size: 14px; color: #555;">Tersedia sekitar lima ratus ribu destinasi wisata yang menarik bagimu.</p>
            </div>
            <!-- Card 2 -->
            <div style="background: #ffffff; border-radius: 16px; padding: 25px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); transform: perspective(800px) rotateX(0deg); transition: transform 0.3s, box-shadow 0.3s; cursor: pointer;"
                onmouseover="this.style.transform='perspective(800px) rotateX(-3deg) translateY(-10px)'; this.style.boxShadow='0 12px 18px rgba(0, 0, 0, 0.2)';"
                onmouseout="this.style.transform='perspective(800px) rotateX(0deg)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.1)';">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(255, 193, 7, 0.1); margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;" class="nightowl-daylight">
                    <img src="{{ asset('images/car.png') }}" alt="Ikon 2" style="width: 50px; height: 50px;">
                </div>
                <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 10px; color: #222;">Nikmati Diskon</h3>
                <p style="font-size: 14px; color: #555;">Aktivitas berkualitas, harga terbaik, plus, BaLoCash untuk hemat lebih banyak.</p>
            </div>
            <!-- Card 3 -->
            <div style="background: #ffffff; border-radius: 16px; padding: 25px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); transform: perspective(800px) rotateX(0deg); transition: transform 0.3s, box-shadow 0.3s; cursor: pointer;"
                onmouseover="this.style.transform='perspective(800px) rotateX(-3deg) translateY(-10px)'; this.style.boxShadow='0 12px 18px rgba(0, 0, 0, 0.2)';"
                onmouseout="this.style.transform='perspective(800px) rotateX(0deg)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.1)';">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(76, 175, 80, 0.1); margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;" class="nightowl-daylight">
                    <img src="{{ asset('images/motor.png') }}" alt="Ikon 3" style="width: 50px; height: 50px;">
                </div>
                <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 10px; color: #222;">Eksplor Lebih Mudah</h3>
                <p style="font-size: 14px; color: #555;">Pesan last minute, akses antrean khusus, dan pembatalan gratis.</p>
            </div>
            <!-- Card 4 -->
            <div style="background: #ffffff; border-radius: 16px; padding: 25px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); transform: perspective(800px) rotateX(0deg); transition: transform 0.3s, box-shadow 0.3s; cursor: pointer;"
                onmouseover="this.style.transform='perspective(800px) rotateX(-3deg) translateY(-10px)'; this.style.boxShadow='0 12px 18px rgba(0, 0, 0, 0.2)';"
                onmouseout="this.style.transform='perspective(800px) rotateX(0deg)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.1)';">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(156, 39, 176, 0.1); margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;" class="nightowl-daylight">
                    <img src="{{ asset('images/ship.png') }}" alt="Ikon 4" style="width: 50px; height: 50px;">
                </div>
                <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 10px; color: #222;">Dapat Dipercaya</h3>
                <p style="font-size: 14px; color: #555;">Baca ulasan terpercaya dan layanan pelanggan yang selalu siap membantu.</p>
            </div>
        </div>
    </div>
    
    
<svg width="100%" height="100%" id="svg" viewBox="0 0 1440 490" xmlns="http://www.w3.org/2000/svg"
    class="transition duration-300 ease-in-out delay-150">
    <path
        d="M 0,500 C 0,500 0,125 0,125 C 42.0908430040445,120.22951968066828 84.181686008089,115.45903936133655 128,128 C 171.818313991911,140.54096063866345 217.3640989716884,170.39336223532212 268,166 C 318.6359010283116,161.60663776467788 374.36191810515743,122.96751169737503 432,113 C 489.63808189484257,103.03248830262497 549.188228607682,121.73659097517778 593,119 C 636.811771392318,116.26340902482222 664.8851674641148,92.08612440191388 702,85 C 739.1148325358852,77.91387559808612 785.2711015358589,87.91891141716671 838,101 C 890.7288984641411,114.08108858283329 950.0304263924502,130.23822992941925 1006,132 C 1061.9695736075498,133.76177007058075 1114.6071928943404,121.12816886515634 1167,129 C 1219.3928071056596,136.87183113484366 1271.5408020301884,165.24909460995534 1317,168 C 1362.4591979698116,170.75090539004466 1401.2295989849058,147.87545269502232 1440,125 C 1440,125 1440,500 1440,500 Z"
        stroke="none" stroke-width="0" fill="#0d47a1" fill-opacity="0.4"
        class="transition-all duration-300 ease-in-out delay-150 path-0"></path>
    <path
        d="M 0,500 C 0,500 0,250 0,250 C 39.19044912633164,235.8437838695181 78.38089825266329,221.68756773903618 135,211 C 191.6191017473367,200.31243226096382 265.66685611567846,193.09351291337336 312,208 C 358.33314388432154,222.90648708662664 376.951677284623,259.93838060747044 415,277 C 453.048322715377,294.06161939252956 510.5264347458299,291.1529646567448 566,286 C 621.4735652541701,280.8470353432552 674.9425837320575,273.44976076555025 726,273 C 777.0574162679425,272.55023923444975 825.7032303259402,279.0479922810542 874,269 C 922.2967696740598,258.9520077189458 970.2444949641811,232.35827011023295 1017,239 C 1063.755505035819,245.64172988976705 1109.3187898173358,285.5189272780142 1149,291 C 1188.6812101826642,296.4810727219858 1222.4803457664755,267.5660207777102 1270,255 C 1317.5196542335245,242.4339792222898 1378.7598271167622,246.2169896111449 1440,250 C 1440,250 1440,500 1440,500 Z"
        stroke="none" stroke-width="0" fill="#0d47a1" fill-opacity="0.53"
        class="transition-all duration-300 ease-in-out delay-150 path-1"></path>
</svg>
<br><br><br>
<!-- Features Section -->
<section style="background-color: #517BBB; margin-top: -72px; margin-bottom: -72px; ">
    <br><br><br>
    <div class="rond" style="background-color: rgba(255, 255, 255, 1); border-radius: 50px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); width: 75%; margin: 0 auto; padding: 20px;">
        <div class="container " >
            <br>
            <h2 style="font-size: 3rem; text-align: center; font-weight: bold; text-shadow: 2px 2px 5px rgba(0,0,0,0.2); ">Unveiling the Best Travel Spots in Bandung</h2>
            <hr class="featurette-divider">

            <div class="row featurette align-items-center">
                <div class="col-md-7">
                    <h2 class="featurette-heading">
                        Riung Gunung: A Scenic Paradise Awaits! <span class="text">Nature's beauty that will leave you breathless.</span>
                    </h2>
                    <p class="lead">"Nikmati keindahan alam Riung Gunung, tempat di mana Anda dapat melarikan diri dari hiruk pikuk kota dan merasakan ketenangan yang sesungguhnya."</p>
                    <br> <p><b>- @sitinurhayati</b></p>
                </div>
                <div class="col-md-5">
                    <figure class="image-container nightowl-daylight">
                        <img src="{{ asset('images/s1.jpg') }}" class="featurette-image img-fluid mx-auto rounded" alt="Feature 1" style="box-shadow: 0px 4px 10px rgba(0,0,0,0.2);">
                        <figcaption class="text-center mt-2">Riung Gunung</figcaption>
                    </figure>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette align-items-center">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">
                        Tebing Keraton: Panorama dari Atas Awan <span class="text">Jelajahi dan Nikmati Keajaibannya.</span>
                    </h2>
                    <p class="lead">"Dikelilingi oleh pepohonan hijau dan udara segar, Tebing Keraton menjadi pilihan sempurna untuk pecinta alam dan pemburu ketenangan."</p>
                    <br> <p><b>- @Gilangmuh</b></p>
                </div>
                <div class="col-md-5 order-md-1">
                    <figure class="image-container nightowl-daylight">
                        <img src="{{ asset('images/s2.jpg') }}" class="featurette-image img-fluid mx-auto rounded" alt="Feature 2" style="box-shadow: 0px 4px 10px rgba(0,0,0,0.2);">
                        <figcaption class="text-center mt-2">Tebing Keraton</figcaption>
                    </figure>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette align-items-center">
                <div class="col-md-7">
                    <h2 class="featurette-heading">
                        Cikahuripan: Surga Tersembunyi di Lembang <span class="text">Biarkan Alam Membuktikan Keindahannya.</span>
                    </h2>
                    <p class="lead">"Cikahuripan di Lembang menawarkan pengalaman tak terlupakan dengan sungai berair jernih yang dikelilingi oleh tebing alami. Tempat yang sempurna untuk menyegarkan pikiran."</p>
                    <br> <p><b>- @asephida</b></p>
                </div>
                <div class="col-md-5">
                    <figure class="image-container nightowl-daylight">
                        <img src="{{ asset('images/s3.jpg') }}" class="featurette-image img-fluid mx-auto rounded" alt="Feature 3" style="box-shadow: 0px 4px 10px rgba(0,0,0,0.2); ">
                        <figcaption class="text-center mt-2">Cikahuripan Lembang</figcaption>
                    </figure>
                </div>
            </div>

            <hr class="featurette-divider">
        </div>
    </div>
    <br><br><br><br>
</section>
<br><br><br>
<svg width="100%" height="100%" id="svg" viewBox="0 0 1440 490" xmlns="http://www.w3.org/2000/svg"
    class="transition duration-300 ease-in-out delay-150">
    <path
        d="M 0,500 C 0,500 0,125 0,125 C 47.383951465806675,121.76800867059663 94.76790293161335,118.53601734119327 144,110 C 193.23209706838665,101.46398265880673 244.31233973935338,87.62393930582357 287,83 C 329.6876602606466,78.37606069417643 363.98273811097306,82.96822543551244 410,101 C 456.01726188902694,119.03177456448756 513.7567078167543,150.50315895212668 575,145 C 636.2432921832457,139.49684104787332 700.9904306220096,97.01913875598086 742,89 C 783.0095693779904,80.98086124401914 800.2815696952072,107.42028602394987 839,114 C 877.7184303047928,120.57971397605013 937.883290597161,107.29971714821963 990,100 C 1042.116709402839,92.70028285178037 1086.1852679161489,91.38084538317163 1131,92 C 1175.8147320838511,92.61915461682837 1221.375637738243,95.17690131909382 1273,101 C 1324.624362261757,106.82309868090618 1382.3121811308783,115.91154934045309 1440,125 C 1440,125 1440,500 1440,500 Z"
        stroke="none" stroke-width="0" fill="#0d47a1" fill-opacity="0.4"
        class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 250)"></path>
    <path
        d="M 0,500 C 0,500 0,250 0,250 C 58.1485236194454,260.90693647730575 116.2970472388908,271.81387295461155 158,278 C 199.7029527611092,284.18612704538845 224.96033466388224,285.6514446588596 272,289 C 319.03966533611776,292.3485553411404 387.8616141055804,297.58034840995003 448,294 C 508.1383858944196,290.41965159004997 559.5932089137963,278.0271617013402 597,260 C 634.4067910862037,241.97283829865975 657.7655502392345,218.311004784689 707,206 C 756.2344497607655,193.688995215311 831.344590129266,192.72881915990376 890,216 C 948.655409870734,239.27118084009624 990.856089243702,286.7737185756959 1034,293 C 1077.143910756298,299.2262814243041 1121.2310528959265,264.1763065373126 1171,259 C 1220.7689471040735,253.82369346268737 1276.2196991725925,278.5210552750535 1322,282 C 1367.7803008274075,285.4789447249465 1403.8901504137039,267.73947236247324 1440,250 C 1440,250 1440,500 1440,500 Z"
        stroke="none" stroke-width="0" fill="#0d47a1" fill-opacity="0.53"
        class="transition-all duration-300 ease-in-out delay-150 path-1" transform="rotate(-180 720 250)"></path>
 
</svg>

<br><br><br>

<h2 style="font-size: 3rem; text-align: center; font-weight: bold;">All Destination in Bandung!</h2>
<div class="nightowl-daylight" id="map" style="height: 300px; margin: 50px auto; width: 70%; border-radius: 15px;"></div>


@endsection

@section('script')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var map = L.map('map', { attributionControl: false }).setView([-6.914744, 107.609810], 12); // Lokasi default: Bandung
        

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        // Marker contoh
        var places = [
            {name: "Farmhouse Lembang", lat: -6.832561, lng: 107.604637},
            {name: "Tangkuban Perahu", lat: -6.759776, lng: 107.609161},
            {name: "Trans Studio Bandung", lat: -6.926582, lng: 107.634110},
            {name: "De Ranch Lembang", lat: -6.811263, lng: 107.617296},
            {name: "Situ Patenggang", lat: -7.162762, lng: 107.356754},
            {name: "Ranca Upas", lat: -7.164370, lng: 107.380091},
            {name: "Saung Angklung Udjo", lat: -6.901203, lng: 107.654051},
            {name: "Curug Cimahi", lat: -6.817732, lng: 107.556849},
            {name: "Tebing Keraton", lat: -6.841330, lng: 107.654910},
            {name: "Cikole Jayagiri", lat: -6.796116, lng: 107.618263},
            {name: "Curug Dago", lat: -6.872788, lng: 107.612182},
            {name: "Alun-Alun Bandung", lat: -6.921947, lng: 107.606924},
            {name: "Gedung Sate", lat: -6.902471, lng: 107.618752},
            {name: "Curug Malela", lat: -7.025400, lng: 107.362280},
            {name: "Floating Market Lembang", lat: -6.817548, lng: 107.616694},
            {name: "Kampung Gajah Wonderland", lat: -6.818169, lng: 107.565662},
            {name: "Dago Dreampark", lat: -6.835054, lng: 107.635286},
            {name: "Curug Tilu Leuwi Opat", lat: -6.802476, lng: 107.518528},
            {name: "Bukit Moko", lat: -6.836645, lng: 107.693011},
            {name: "Lembang Park & Zoo", lat: -6.809647, lng: 107.590957},
            {name: "Ciwidey Valley Resort", lat: -7.157884, lng: 107.403423},
            {name: "Barusen Hills", lat: -7.146062, lng: 107.481762},
            {name: "Kampung Daun", lat: -6.825494, lng: 107.589655},
            {name: "Rabbit Town", lat: -6.868161, lng: 107.614289},
            {name: "Taman Hutan Raya Djuanda", lat: -6.859035, lng: 107.627866},
            {name: "Puncak Bintang", lat: -6.835184, lng: 107.693635},
            {name: "Bukit Jamur Rancabolang", lat: -7.167736, lng: 107.455448},
            {name: "Sunrise Point Cukul", lat: -7.195835, lng: 107.464166},
            {name: "Stone Garden Citatah", lat: -6.831937, lng: 107.469944},
            {name: "Curug Bugbrug", lat: -6.813579, lng: 107.556776},
            {name: "Glamping Lakeside Rancabali", lat: -7.157471, lng: 107.354196},
            {name: "Gunung Batu", lat: -6.825977, lng: 107.586887},
            {name: "Pemandian Air Panas Cibolang", lat: -7.126630, lng: 107.506869},
            {name: "Curug Omas", lat: -6.821204, lng: 107.635762},
            {name: "Curug Cilengkrang", lat: -6.917257, lng: 107.713738},
            {name: "Wot Batu", lat: -6.871095, lng: 107.624223},
            {name: "Sanghyang Heuleut", lat: -6.800092, lng: 107.493125},
            {name: "Cihampelas Walk", lat: -6.896520, lng: 107.604905},
            {name: "Paris Van Java", lat: -6.883167, lng: 107.595679},
            {name: "Maribaya Hot Spring Resort", lat: -6.806765, lng: 107.644554},
            {name: "Taman Film", lat: -6.894494, lng: 107.610894},
            {name: "Taman Sejarah Bandung", lat: -6.906331, lng: 107.618332},
            {name: "Museum Geologi Bandung", lat: -6.900778, lng: 107.616991},
            {name: "Bosscha Observatory", lat: -6.822866, lng: 107.616645},
            {name: "Curug Pelangi", lat: -6.822355, lng: 107.563563},
            {name: "Taman Lalu Lintas Ade Irma Suryani", lat: -6.913989, lng: 107.615482},
            {name: "Taman Superhero", lat: -6.915032, lng: 107.630743},
            {name: "Taman Balaikota", lat: -6.910164, lng: 107.616441},
            {name: "Masjid Raya Bandung", lat: -6.921855, lng: 107.606875},
            {name: "Curug Maribaya", lat: -6.816176, lng: 107.642736},
            {name: "Peta Park", lat: -6.935112, lng: 107.609210},
            {name: "NuArt Sculpture Park", lat: -6.871463, lng: 107.577120},
            {name: "Kebun Teh Rancabali", lat: -7.163186, lng: 107.363906},
            {name: "Bandung Zoo", lat: -6.889920, lng: 107.609900},
            {name: "Grand Canyon Pangandaran", lat: -7.709611, lng: 108.513192},
            {name: "Hutan Kota Babakan Siliwangi", lat: -6.889073, lng: 107.609450},
            {name: "Curug Cinulang", lat: -7.055222, lng: 107.788165},
            {name: "Taman Lansia", lat: -6.901157, lng: 107.620372},
            {name: "Curug Panganten", lat: -6.812984, lng: 107.535301},
            {name: "Curug Cibareubeuy", lat: -6.782973, lng: 107.622688},
            {name: "Taman Tematik Balai Kota", lat: -6.910058, lng: 107.616280},
            {name: "Amazing Art World", lat: -6.853234, lng: 107.592518},
            {name: "Selasar Sunaryo Art Space", lat: -6.870295, lng: 107.625751},
            {name: "Kampung Batu Malakasari", lat: -7.010729, lng: 107.632155},
            {name: "Ciater Hot Spring", lat: -6.770469, lng: 107.643732},
            {name: "Orchid Forest Cikole", lat: -6.795784, lng: 107.619622},
            {name: "Dusun Bambu", lat: -6.798678, lng: 107.567782},
            {name: "Kawah Putih", lat: -7.166609, lng: 107.402635},
            {name: "The Lodge Maribaya", lat: -6.789355, lng: 107.662613},
            {name: "Riung Gunung", lat: -6.8045, lng: 107.6396},
            {name: "Tebing Keraton", lat: -6.8413, lng: 107.6549},
            {name: "Cikahuripan", lat: -6.8226, lng: 107.6465}
        ];

        places.forEach(function(place) {
            L.marker([place.lat, place.lng])
                .addTo(map)
                .bindPopup(`<b>${place.name}</b>`);
        });
    });
</script>
@endsection
