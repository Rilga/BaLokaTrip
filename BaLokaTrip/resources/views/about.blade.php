@extends('layouts.front')

@section('content')
    <!-- About Section -->
    <div style="background-color: #f5f9fc; padding: 50px 0; min-height: 100vh;">
        <div class="container" style="max-width: 900px; margin: auto;">
            <!-- Section Title -->
            <div class="text-center mb-5">
                <h1 style="font-size: 2.5rem; color: #2c3e50; font-weight: bold;">About Us</h1>
                <p style="font-size: 1.1rem; color: #6c757d;">Kelompok 5 - Tugas Besar Website Application Development</p>
            </div>

            <!-- About Content -->
            <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
                <!-- Image Section -->
                <div style="flex: 1; min-width: 280px; text-align: center;">
                    <img src="{{ asset('images/pp.jpeg') }}" 
                        alt="Our Team" 
                        style="width: 100%; max-width: 300px; border-radius: 15px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
                </div>

                <!-- Text Section -->
                <div style="flex: 2; min-width: 280px;">
                    <h3 style="color: #2c3e50; font-size: 1.8rem; margin-bottom: 15px;">Who We Are</h3>
                    <p style="font-size: 1rem; color: #6c757d; line-height: 1.6; text-align: justify;">
                        Kami adalah mahasiswa Telkom University angkatan 2022 yang sedang menempuh mata kuliah Website Application Development (WAD). 
                        Dalam mata kuliah ini, kami membuat sebuah aplikasi berbasis web sebagai salah satu media pembelajaran. 
                        Melalui kerja sama tim, kreativitas, dan pembelajaran teknologi, kami berkomitmen untuk menghadirkan solusi yang tidak hanya fungsional 
                        tetapi juga memberikan nilai tambah bagi para pengguna.
                    </p>
                    <h3 style="color: #2c3e50; font-size: 1.8rem; margin-top: 20px; margin-bottom: 15px;">Our Vision</h3>
                    <p style="font-size: 1rem; color: #6c757d; line-height: 1.6; text-align: justify;">
                        Visi kami adalah menciptakan platform yang menghubungkan masyarakat dengan keindahan kota Bandung melalui sebuah website interaktif. 
                        Kami bertujuan untuk menyediakan informasi lengkap tentang destinasi wisata di kota Bandung serta memberikan kemudahan dalam proses 
                        pembelian tiket secara online. Dengan cara ini, kami ingin membantu pengguna merencanakan perjalanan yang menyenangkan dan 
                        tanpa hambatan, sekaligus mempromosikan keindahan wisata lokal Bandung ke masyarakat luas.
                    </p>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-5">
                <a href="/contact" 
                    style="display: inline-block; background-color: #007bff; color: #ffffff; text-decoration: none; 
                        padding: 10px 20px; font-size: 1rem; font-weight: bold; border-radius: 5px;">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
@endsection
