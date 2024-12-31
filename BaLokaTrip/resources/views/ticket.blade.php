<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">Our Tickets</h1>
            <p class="text-muted">Explore our amazing tickets with products</p>
        </div>

        <!-- Ticket List -->
        <div class="row justify-content-center g-4">
            @foreach ($ticketsWithProductDetails as $ticket)
                <div class="col-12" style="max-width: 800px;">
                    <div class="card h-100 border-0 shadow-sm d-flex flex-row" style="border-radius: 10px; overflow: hidden;">
                        <!-- Display product image -->
                        @if($ticket->product_image)
                            <img src="{{ asset('storage/images/product/' . basename($ticket->product_image)) }}" 
                                alt="{{ $ticket->product_name }}" 
                                style="width: 200px; height: auto; object-fit: cover;">
                        @else
                            <img src="{{ asset('storage/images/default-product.jpg') }}" 
                                alt="No image" 
                                style="width: 200px; height: auto; object-fit: cover;">
                        @endif

                        <div class="card-body d-flex flex-column justify-content-between" style="padding: 15px;">
                            <!-- Ticket details -->
                            <div>
                                <h6 class="card-title" style="margin-bottom: 10px;">{{ $ticket->ticket_name }}</h6>
                                <p style="color: #28a745; margin-bottom: 5px; font-size: 0.9rem;">
                                    <i class="bi bi-check-circle-fill"></i> Bisa 100% Refund dengan asuransi
                                </p>
                                <p style="color: #6c757d; font-size: 0.85rem;">Asuransi tersedia dengan biaya tambahan</p>
                            </div>

                            <!-- Ticket price and button -->
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 style="font-weight: bold; margin: 0;">IDR {{ number_format($ticket->ticket_price, 0, ',', '.') }}</h5>
                                    <span style="background-color: #dc3545; color: #fff; padding: 5px 10px; border-radius: 5px; font-size: 0.85rem;">Year-End Holideals</span>
                                </div>
                                <a href="{{ route('ticket.show', $ticket->id) }}" 
                                    class="btn btn-primary" 
                                    style="padding: 8px 15px; font-size: 0.9rem;">Beli tiket</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
