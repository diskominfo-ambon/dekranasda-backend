@extends('layouts.dashboard')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title fw-bold">Konfirmasi produk</h3>
                        <div class="nk-block-des">
                            <p>Konfirmasi dan terbikan produk dari peranjin.</p>
                        </div>
                    </div>
                </div>
            </div><!-- .nk-block-head -->

            <div class="nk-block nk-block-sm">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h6 class="nk-block-title">Semua produk</h6>
                        </div>
                        <ul class="nk-block-tools gx-3">
                            <li>
                                <a href="#" class="search-toggle toggle-search btn btn-icon btn-trigger" data-target="search"><em class="icon ni ni-search"></em></a>
                            </li>
                        </ul><!-- .nk-block-tools -->
                    </div>
                    <div class="search-wrap search-wrap-extend" data-search="search">
                        <div class="search-content">
                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                            <input type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search by user">
                            <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                        </div>
                    </div><!-- .search-wrap -->
                </div><!-- .nk-block-head -->
                <div class="tranx-list tranx-list-stretch card card-bordered">
                    @forelse ( $products as $product )
                    <div class="tranx-item">
                        <div class="tranx-col">
                            <div class="tranx-info">
                                <div class="tranx-badge">
                                    <span class="tranx-icon text-warning">
                                        <em class="icon ni ni-wallet-fill"></em></a>
                                    </span>
                                </div>
                                <div class="tranx-data">
                                    <div class="tranx-label">
                                        <a href="#" class="text-dark">
                                            {{ str($product->title)->limit(100) }}
                                        </a>
                                    </div>
                                    <div class="tranx-date">
                                        Ditambahkan oleh {{ $product->user->name }} • {{ $product->created_at->isoFormat('LL') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tranx-col">
                            <div class="d-flex">
                                    <div>
                                        <form method="post" action="{{ route('admins.produk.update', $product->id) }}">
                                            @method('PUT')
                                            @csrf
                                            <button class="btn text-success">Konfirmasi</button>
                                        </form>
                                    </div>
                                    <div>
                                        <form method="post" action="{{ route('admins.produk.destroy', $product->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn text-primary">Batalkan</button>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div><!-- .nk-tranx-item -->
                    @empty
                    <div class="text-center">
                        <h3>Produk belum tersedia</h3>
                    </div>
                    @endforelse
                </div><!-- .card -->

                <div class="mt-2">
                    {{ $products->links('pagination::simple-bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
