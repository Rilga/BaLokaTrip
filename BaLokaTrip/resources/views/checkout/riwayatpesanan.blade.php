<x-app-layout>
    <div style="background-color: #cee2ec; min-height: 100vh; padding-top: 50px;">
        <div class="container-sm py-5 shadow-lg rounded bg-white">
            <h3 class="fw-bold text-center mb-4" style="font-size: 2.5rem; color: #2c3e50;">Riwayat Pesanan Anda</h3>

            @if ($orders->isEmpty())
                <div class="alert alert-info text-center p-4" style="font-size: 1.2rem;">
                    Belum ada pesanan yang dilakukan.
                </div>
            @else

                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                <th style="width: 15%;">Gambar Produk</th>
                                <th style="width: 25%;">Nama Tiket</th>
                                <th style="width: 10%;">Jumlah</th>
                                <th style="width: 15%;">Total Harga</th>
                                <th style="width: 15%;">Voucher</th>
                                <th style="width: 10%;">Diskon</th>
                                <th style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <div class="nightowl-daylight">
                                        @if ($order->ticket->product->image)
                                            <img src="{{ asset('storage/images/product/' . basename($order->ticket->product->image)) }}" 
                                                alt="{{ $order->ticket->product->name }}" 
                                                class="img-thumbnail shadow-sm" style="width: 80px; height: auto;">
                                        @else
                                        </div>
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->ticket->product->name ?? 'Nama tiket tidak diketahui' }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td>{{ $order->voucher_code ?? 'Tidak menggunakan voucher' }}</td>
                                    <td>Rp {{ number_format($order->discount, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('tiket.download', $order->id) }}" 
                                            class="btn btn-danger btn-sm">CETAK TIKET</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <br><br><br><br>
    </div>
</x-app-layout>
