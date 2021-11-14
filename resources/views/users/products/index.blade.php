@extends('layouts.dashboard')


@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Produk</h3>
            <div class="nk-block-des text-soft">
                <p>Kamu memiliki {{ humanize_sum($products->count()) }} jumlah produk yang tersedia.</p>
            </div>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li><a href="#" class="btn btn-white btn-dim btn-outline-light"><em class="icon ni ni-download"></em><span>Download</span></a></li>
                        <li class="nk-block-tools-opt">
                            <a href="{{ route('products.create') }}" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="card card-bordered card-stretch">
        <div class="card-inner-group">
            <div class="card-inner">
                <div class="card-title-group">
                    <div class="card-title">

                        <h5 class="title">
                            @if ($keyword || $status)
                            Pencarian produk {{ $keyword }} {{ $status ? ' status '. $productStatus[$status]: '' }}
                            @else
                            Semua produk
                            @endif
                        </h5>
                    </div>
                    <div class="card-tools mr-n1">
                        <ul class="btn-toolbar gx-1">
                            <li>
                                <a href="#" class="search-toggle border toggle-search btn btn-icon" data-target="search"><em class="icon ni ni-search"></em></a>
                            </li><!-- li -->
                            <li class="btn-toolbar-sep"></li>
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="border btn btn-icon dropdown-toggle" data-toggle="dropdown">
                                        @if ($status)
                                        <div class="dot dot-primary"></div>
                                        @endif
                                        <em class="icon ni ni-filter-alt"></em>
                                    </a>
                                    <div class="filter-wg dropdown-menu dropdown-menu-md dropdown-menu-right">
                                        <div class="dropdown-head">
                                            <span class="sub-title dropdown-title">Filter status produk</span>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-icon">
                                                    <em class="icon ni ni-cross"></em>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="dropdown-body dropdown-body-rg">
                                            <div class="row gx-6 gy-3">
                                                <div class="col-12">
                                                    <select name="status" class="form-select">
                                                        @foreach ($productStatus as $key => $val)
                                                            @if ($status === $key)
                                                            <option value="{{ $key }}" selected>{{ ucfirst($val) }}</option>
                                                            @continue
                                                            @endif
                                                            <option value="{{ $key }}">{{ ucfirst($val) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .filter-wg -->
                                </div><!-- .dropdown -->
                            </li>
                        </ul><!-- .btn-toolbar -->
                    </div><!-- .card-tools -->
                    <form method="GET" class="card-search search-wrap" data-search="search">
                        <div class="search-content d-flex align-items-center">
                            <a href="#" class="mr-2 search-back border btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                            <input autocomplete="off" type="text" name="keyword" class="form-control border-transparent form-focus-none" placeholder="Telusuri nama produk yang ingin kamu cari. Contoh: Kain batik" value="{{ $keyword }}">

                            <button class="ml-2 border btn-white btn"><em class="icon ni ni-search"></em> Telusuri</button>

                        </div>
                    </form>
                </div><!-- .card-title-group -->
            </div><!-- .card-inner -->
            <div class="card-inner p-0">
                @if ($products->count() <= 0)
                <h4 class="text-center py-5">Produk tidak tersedia</h4>
                @else
                <div class="nk-tb-list nk-tb-tnx">
                    <div class="nk-tb-item nk-tb-head">
                        <div class="nk-tb-col"><span>Nama produk</span></div>
                        <div class="nk-tb-col tb-col-lg"><span>Pengguna</span></div>
                        <div class="nk-tb-col text-right"><span>Harga</span></div>
                        <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-none d-md-block">Status</span></div>
                        <div class="nk-tb-col nk-tb-col-tools"></div>
                    </div><!-- .nk-tb-item -->
                    @foreach ($products as $product)
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <div class="nk-tnx-type">
                                <div class="nk-tnx-type-icon bg-gray-dim {{ $product->isPublished ? 'text-success' : 'text-warning' }}">
                                    <em class="icon ni ni-wallet-fill"></em>
                                </div>
                                <div class="nk-tnx-type-text">
                                    <span class="tb-lead">
                                        {{ str($product->title)->limit(40) }}
                                    </span>
                                    <span class="tb-date">
                                        Ditambahkan pada {{ $product->created_at->isoFormat('LL') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-amount">{{ $product->user->name }}</span>
                            <span class="tb-amount-sm">{{ $product->user->email }}</span>
                        </div>
                        <div class="nk-tb-col text-right tb-col-sm">
                            @if ($product->isDiscount)
                            <span class="tb-amount">
                                <div class="badge badge-primary mr-2">30%</div>{{ rupiah($product->price) }}
                            </span>
                            @endif
                            <span class="tb-amount{{ $product->isDiscount ? '-sm' : '' }}">{{ rupiah($product->price) }}</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-status">
                            @if ($product->isPublished)
                            <span class="badge badge-sm badge-dim badge-outline-success d-none d-md-inline-flex">Telah dipublikasi</span>
                            @else
                            <span class="badge badge-sm badge-dim badge-outline-warning d-none d-md-inline-flex">Tidak dipublikasi</span>
                            @endif
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-2">
                                <li class="nk-tb-action-hidden">
                                    <a href="{{ route('products.show', $product->id) }}" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" title="Lihat produk"><em class="icon ni ni-eye-fill"></em></a>
                                </li>
                                <li>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle bg-white btn btn-sm btn-outline-light btn-icon" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt">
                                                <li><a href="{{ route('products.edit', $product->id) }}"><em class="icon ni ni-edit"></em><span>Ubah produk</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-eye-off"></em><span>Nonaktifkan produk</span></a></li>
                                                <li>
                                                    <form class="d-block" method="POST" action="{{ route('products.destroy', $product->id) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="text-danger btn btn-white btn-block fw-normal fs-13px justify-content-start">
                                                            <em class="icon ni ni-trash"></em><span>Hapus produk</span></button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-tb-item -->
                    @endforeach
                </div><!-- .nk-tb-list -->
                @endif
            </div><!-- .card-inner -->
            <div class="card-inner">
                {{ $products->links('pagination::bootstrap-4') }}
            </div><!-- .card-inner -->
        </div><!-- .card-inner-group -->
    </div><!-- .card -->
</div><!-- .nk-block -->
@endsection
