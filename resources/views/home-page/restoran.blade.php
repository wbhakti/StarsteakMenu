<!-- resources/views/home.blade.php -->
@extends('home-page.layouts.app-home')

@section('content')

<style>
    .kategori-select {
        border: 2px solid #033800;
        border-radius: 5px;
        padding: 10px;
        font-size: 1.2rem;
        color: #033800;
        background-color: #f8f9fa;
    }

    .kategori-select:focus {
        border-color: #033800;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
</style>

<div class="d-flex flex-wrap justify-content-center" style="gap: 1rem;">
    <div class="card" style="min-width: 150px;">
        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Favorit</div>
        <img class="card-img-top" src="{{ url('/starsteakmenu/public/img/menu_fav.jpg') }}" alt="name" />
    </div>
</div>

<section class="py-4">
    <div class="container px-4 px-lg-5 mt-0">

        <!-- Pilihan Kategori -->
        <div class="text-center mb-4">
            <h4 class="fw-bolder">Kategori Menu</h4>
        </div>
        <div class="form-group">
            <select class="form-select form-select-lg kategori-select" id="kategoriSelect">
                <option value="all" data-kategori="all" selected>SEMUA MENU</option>
                @foreach ($kategori as $item)
                    <option value="{{ $item['id'] }}" data-kategori="{{ $item['nama'] }}" {{ request()->query('kategori') == $item['nama'] ? 'selected' : '' }}>
                        {{ $item['nama'] }}
                    </option>
                @endforeach
            </select>            
        </div>
        
        <!-- List makanan -->
        <div class="text-center">
            <h4 class="fw-bolder mt-5 mb-4">Pilihan Menu</h4>
        </div>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @if(!empty($produk['data']))
                @foreach ($produk['data'] as $item)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Baru</div> -->
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ $item['image_url'] }}" alt="..." onerror="this.onerror=null;this.src='{{ asset('img/default-img.jpeg') }}';" style="width: 100%; height: 150px; object-fit: cover;"/>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name with modal trigger-->
                                <h5 class="fw-bolder" style="font-size: 14px;" data-bs-toggle="modal" data-bs-target="#modal{{ $item['id'] }}">{{ $item['nama'] }}</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                @currency($item['harga'])
                            </div>
                        </div>
                        <!-- Product actions-->
                        <!-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-outline-dark mt-auto btn-add-to-cart" href="javascript:void(0)" 
                                data-id="{{ $item['id'] }}" 
                                data-name="{{ $item['nama'] }}" 
                                data-price="{{ $item['harga'] }}"
                                data-img="{{ $item['image_url'] }}">
                                Add to cart
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal{{ $item['id'] }}" tabindex="-1" aria-labelledby="modalLabel{{ $item['id'] }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel{{ $item['id'] }}">{{ $item['nama'] }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Harga:</strong> Rp {{ $item['harga'] }}</p>
                                <img src="{{ $item['image_url'] }}" alt="{{ $item['nama'] }}" class="img-fluid" onerror="this.onerror=null;this.src='{{ asset('img/default-img.jpeg') }}';"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>

        
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const kategoriSelect = document.getElementById('kategoriSelect');
        kategoriSelect.addEventListener('change', function () {
            const kategori = this.options[this.selectedIndex].getAttribute('data-kategori');
            if (kategori) {
                window.location.href = `?kategori=${encodeURIComponent(kategori)}`;
            }
        });
    });
</script>