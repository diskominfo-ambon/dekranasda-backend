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
            <h5 class="nk-block-title title">Beberapa produk yang belum dikonfirmasi</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-4 mb-2">
            <div class="card card-bordered dashed h-100">
                <div class="nk-wgw-add">
                    <div class="nk-wgw-inner">
                        <a href="{{ route('products.create') }}">
                            <div class="add-icon">
                                <em class="icon ni ni-plus"></em>
                            </div>
                            <h6 class="title">Tambahkan produk baru</h6>
                        </a>
                        <span class="sub-text">
                            Yuk publikasikan produkmu bersama dekranasda
                        </span>
                    </div>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        @forelse ( $products as $product)
        <div class="col-sm-12 col-md-4 mb-2">
            <div class="card card-bordered">
                <div class="nk-wgw">
                    <div class="nk-wgw-inner">
                        <a class="nk-wgw-name" href="html/crypto/wallet-bitcoin.html">
                            <div class="nk-wgw-icon bg-light">
                                <em class="icon ni ni-todo-fill text-warning"></em>
                            </div>
                            <h5 class="nk-wgw-title text-secondary fw-bold">PENDING</h5>
                        </a>
                        <div class="nk-wgw-balance">
                            <a href="{{ route('products.show', $product->id) }}" class="amount" style="font-size: 1rem; line-height: 1.5; color: #454545 !important;">
                                {{ str($product->title)->limit(50) }}
                            </a>
                            <div class="amount-smm mt-2">
                                {{ $product->created_at->isoFormat('LL') }}
                            </div>
                        </div>
                    </div>
                    <div class="nk-wgw-more dropdown">
                        <a href="#" class="btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                            <ul class="link-list-plain sm">
                                <li><a href="#">Details</a></li>
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                                <li><a href="#">Make Default</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        @empty
        <h4 class="text-center text-gray">Tidak tersedia untuk bulan ini.</h4>
        @endforelse
    </div><!-- .row -->
    <div class="row">
        <div class="col-12">
            <a href="{{ route('products.index')  }}?status=pending" class="text-primary fw-bold">Lihat produk lainnya &rarr;</a>
        </div>
    </div>
</div><!-- .nk-block -->
@endsection
