<x-app-layout>
    <x-slot name="header"></x-slot>
    <div style="background: linear-gradient(135deg, #e6f7ff, #f0e6ff); min-height: 100vh; padding: 50px 0;">
        <div class="container py-2">
            <div class="text-center mb-4">
                <h3 class="fw-bold text-center mb-4" style="font-size: 2.5rem; color: #343a40;">
                    Explore Our Amazing Tickets with Destinations
                </h3>
                <p style="color: #6c757d; font-size: 1rem;">Discover exciting adventures with exclusive offers!</p>
            </div>

            <!-- Ticket List -->
            <div class="row justify-content-center g-4">
                @foreach ($ticketsWithProductDetails as $ticket)
                    <div class="col-12" style="max-width: 800px;">
                        <div class="card h-100 border-0 shadow d-flex flex-row align-items-stretch" 
                            style="border-radius: 15px; overflow: hidden; background-color: #ffffff;">
                            
                            <!-- Product Image -->
                            <div class="d-flex align-items-center" style="background-color: #f8f9fa; padding: 10px;">
                                <div class="nightowl-daylight">
                                @if($ticket->product_image)
                                    <img src="{{ asset('storage/images/product/' . basename($ticket->product_image)) }}" 
                                        alt="{{ $ticket->product_name }}" 
                                        style="width: 180px; height: auto; border-radius: 10px; object-fit: cover;">
                                    </div>                                        
                                @else
                                
                                    <img src="{{ asset('storage/images/default-product.jpg') }}" 
                                        alt="No image" 
                                        style="width: 180px; height: auto; border-radius: 10px; object-fit: cover;">
                                @endif
                            </div>

                            <!-- Card Body -->
                            <div class="card-body d-flex flex-column justify-content-between" style="padding: 20px;">
                                <!-- Ticket details -->
                                <div>
                                    <h5 class="card-title" style="margin-bottom: 15px; font-size: 1.25rem; color: #2c3e50;">
                                        {{ $ticket->ticket_name }}
                                    </h5>
                                    <p class="text-success mb-2" style="font-size: 0.95rem;">
                                        <i class="bi bi-shield-fill-check"></i> 100% Refundable with Insurance
                                    </p>
                                    <p class="text-muted" style="font-size: 0.85rem;">
                                        Insurance available at an additional cost
                                    </p>
                                </div>

                                <!-- Ticket price and button -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="text-danger fw-bold" style="margin: 0;">
                                            IDR {{ number_format($ticket->ticket_price, 0, ',', '.') }}
                                        </h5>
                                        <span style="background-color: #ff5e5e; color: #ffffff; padding: 5px 10px; border-radius: 5px; font-size: 0.85rem;">
                                            <i class="bi bi-star-fill"></i> Year-End Holideals
                                        </span>
                                    </div>
                                    <a href="{{ route('checkout.show', $ticket->id) }}" 
                                        class="btn btn-primary" 
                                        style="padding: 10px 20px; font-size: 0.9rem; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
                                        <i class="bi bi-cart-plus"></i> Buy Ticket
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
