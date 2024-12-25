@include('/includes.header')

{{-- Here is the content --}}
@php
     use App\Models\products;
     $products = products::all(); // Fetch all products directly in the view
@endphp

<h1 class="text-center my-4">Welcome to the Shop</h1>

<div class="row g-4">
    @foreach($products as $product)
        <div class="col-md-4">
            <div class="product-card">
                <!-- Use asset() to correctly reference the image stored in public storage -->
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}" style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                @else
                    <img src="{{ asset('storage/default-image.jpg') }}" alt="Default Image" style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                @endif

                <div class="details mt-3">
                    <h5>{{ $product->product_name }}</h5>
                    <p>Price: ${{ number_format($product->price, 2) }}</p>
                    {{-- Optionally, you can add a cart feature if needed --}}
                    {{-- <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-kiosk">Add to Cart</button>
                    </form> --}}
                </div>
            </div>
        </div>
    @endforeach
</div>

@include('/includes.footer')
