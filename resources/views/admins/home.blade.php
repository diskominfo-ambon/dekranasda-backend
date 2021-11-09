@extends('layouts.dashboard')

@section('content')
 <div class="nk-block-head">
    <div class="nk-block-between-md g-4">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title fw-bold">Beranda</h4>
            <div class="nk-block-des">
                <p>Hai Azman Abdullah, selamat datan kembali.</p>
            </div>
        </div>
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
<div class="nk-block nk-block-lg">
    <div class="nk-block-head-sm">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title title">Beberapa produk yang sering dilihat bulan ini</h5>
        </div>
    </div>
    <div class="row dashboard__product">
        <div class="col-sm-12 col-md-6 col-lg-12">
            @forelse ( $products as $product)
            <div class="card p-2 m-0">
                <div class="nk-wgw">
                    <div class="nk-wgw-inner p-0">
                        <div class="nk-wgw-balance p-0">
                            <h6 class="amount" style="line-height: 2.3rem !important; font-size: 1.3rem;">{{ str($product->title)->title()->limit(70) }}<span class="currency currency-eur">#Oleh {{ $product->user->name }}</span></h6>
                            <div class="amount-sm mt-1 d-flex align-items-center">
                                <span><em class="icon ni ni-calendar"></em> Ditambahkan pada {{ $product->created_at->isoFormat('LL') }}</span>
                                <span class="mx-1">•</span>
                                <span class="position-relative" style="top: .1rem;">
                                    <em class="icon ni ni-eye"></em> Dilihat sebanyak {{ $product->views()->count() }} kali
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="nk-wgw-more dropdown">
                        <a href="#" class="btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                            <ul class="link-list-plain sm">
                                <li><a href="#"><em class="icon ni ni-user"></em> Lihat pengguna</a></li>
                                <li><a href="#"><em class="icon ni ni-wallet"></em> Lihat produk</a></li>
                                <li><a href="#"><em class="icon ni ni-eye-off"></em> Nonaktifkan produk</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- .card -->
            @empty
            <h4 class="text-center text-gray">Tidak tersedia untuk bulan ini.</h4>
            @endforelse
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .nk-block -->
@endsection
