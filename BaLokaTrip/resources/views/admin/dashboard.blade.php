<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <!-- Background Utama dengan Gambar -->
    <div class="relative min-h-[90vh] flex items-center justify-center" style="background-image: url('{{ asset('images/bglogin.jpg') }}'); background-size: cover; background-position: center;">
        <!-- Overlay Gelap -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Konten Utama -->
        <div class="container mx-auto px-6 py-12 text-center relative z-10">
            <!-- Heading -->
            <h1 class="text-white text-4xl font-bold uppercase tracking-wider">
                Manage <span class="text-yellow-400">Content</span>
            </h1>
            <p class="text-white text-lg mt-4">
                Administer data, update listings to enhance the experience of BaLoka visitors.
            </p>

            <!-- Icon Menu -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-8 mt-12 justify-items-center">
                <!-- Ticket -->
                <a href="{{ route('admin.ticket') }}" class="flex flex-col items-center space-y-3 group">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md transition duration-300 transform group-hover:scale-110">
                        <!-- Ikon Ticket -->
                        <i class="fas fa-ticket-alt text-gray-700 text-3xl"></i>
                    </div>
                    <p class="text-white font-medium group-hover:text-yellow-400">Ticket</p>
                </a>

                <!-- Product -->
                <a href="{{ route('admin.product') }}" class="flex flex-col items-center space-y-3 group">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md transition duration-300 transform group-hover:scale-110">
                        <!-- Ikon Keranjang Belanja -->
                        <i class="fas fa-shopping-cart text-gray-700 text-3xl"></i>
                    </div>
                    <p class="text-white font-medium group-hover:text-yellow-400">Product</p>
                </a>

                <!-- FAQ -->
                <a href="{{ route('admin.faq') }}" class="flex flex-col items-center space-y-3 group">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md transition duration-300 transform group-hover:scale-110">
                        <!-- Ikon Tanda Tanya (FAQ) -->
                        <i class="fas fa-question-circle text-gray-700 text-3xl"></i>
                    </div>
                    <p class="text-white font-medium group-hover:text-yellow-400">FAQ</p>
                </a>

                <!-- Article -->
                <a href="{{ route('admin.article') }}" class="flex flex-col items-center space-y-3 group">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md transition duration-300 transform group-hover:scale-110">
                        <!-- Ikon Artikel -->
                        <i class="fas fa-file-alt text-gray-700 text-3xl"></i>
                    </div>
                    <p class="text-white font-medium group-hover:text-yellow-400">Article</p>
                </a>

                <!-- Discount -->
                <a href="" class="flex flex-col items-center space-y-3 group">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md transition duration-300 transform group-hover:scale-110">
                        <!-- Ikon Diskon -->
                        <i class="fas fa-percent text-gray-700 text-3xl"></i>
                    </div>
                    <p class="text-white font-medium group-hover:text-yellow-400">Discount</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
