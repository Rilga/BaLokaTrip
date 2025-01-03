<x-app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-dark text-center p-4" style="background-color: #cee2ec;">
                        <h3 class="mb-0">{{ $ticket->name }}</h3>
                        <p class="mt-2">
                            <i class="bi bi-ticket-fill"></i> Harga Tiket:
                            <span class="fw-bold fs-4">Rp {{ number_format($ticket->price, 0, ',', '.') }}</span>
                        </p>
                    </div>
                    <div class="card-body p-4">
                        <!-- Informasi Diskon -->
                        <div class="text-center mb-4">
                            @if (session('discountedPrice'))
                                <p class="text-success fs-5">
                                    <i class="bi bi-check-circle-fill"></i> Harga setelah diskon: 
                                    <span class="fw-bold">Rp {{ number_format(session('discountedPrice'), 0, ',', '.') }}</span>
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="bi bi-x-circle-fill"></i> Belum ada diskon yang diterapkan.
                                </p>
                            @endif
                        </div>

                        <!-- Form Promo -->
                        <form action="{{ route('checkout.apply-discount') }}" method="POST" class="mb-4">
                            @csrf
                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-gift"></i>
                                </span>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Masukkan kode promo" value="{{ old('code', session('code')) }}">
                                <button class="btn text-dark" type="submit" style="background-color: #cee2ec;">Gunakan Promo</button>
                            </div>
                            @error('code')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </form>

                        <!-- Form Pemesanan -->
                        <form action="{{ route('checkout.process') }}" method="POST" id="checkoutForm">
                            @csrf
                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="{{ $ticket->stock }}" placeholder="Jumlah Tiket" required>
                                <label for="quantity"><i class="bi bi-cart"></i> Jumlah Tiket</label>
                                @error('quantity')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                                <label for="name"><i class="bi bi-person"></i> Nama Lengkap</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="No. Telepon" required>
                                <label for="phone"><i class="bi bi-telephone"></i> No. Telepon</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                <label for="email"><i class="bi bi-envelope"></i> Email</label>
                            </div>

                            <!-- Tombol Checkout -->
                            <div class="d-grid mt-4">
                                <button class="btn text-dark btn-lg" type="submit" style="background-color: #cee2ec;">
                                    <i class="bi bi-arrow-right-circle"></i> Pesan Tiket Sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Footer Informasi -->
                <div class="mt-4 text-center">
                    <small class="text-muted">
                        <i class="bi bi-info-circle"></i> Stok tersedia: {{ $ticket->stock }} tiket
                    </small>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
