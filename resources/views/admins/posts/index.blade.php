@extends('layouts.dashboard')


@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Kegiatan & berita</h3>
            <div class="nk-block-des text-soft">
                <p>Kamu memiliki 00 jumlah postingan yang tersedia.</p>
            </div>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li class="nk-block-tools-opt">
                            <a href="#" class="btn btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus mr-1"></em> Tambahkan</a>
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
                        <h5 class="title">All Orders</h5>
                    </div>
                    <div class="card-tools mr-n1">
                        <ul class="btn-toolbar gx-1">
                            <li>
                                <a href="#" class="search-toggle border toggle-search btn btn-icon" data-target="search"><em class="icon ni ni-search"></em></a>
                            </li><!-- li -->
                            <li class="btn-toolbar-sep"></li><!-- li -->
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="btn border btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                        <em class="icon ni ni-filter-alt"></em>
                                    </a>
                                    <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                        <div class="dropdown-head">
                                            <span class="sub-title dropdown-title">Advance Filter</span>
                                            <div class="dropdown">
                                                <a href="#" class="link link-light">
                                                    <em class="icon ni ni-more-h"></em>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="dropdown-body dropdown-body-rg">
                                            <div class="row gx-6 gy-4">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="overline-title overline-title-alt">Type</label>
                                                        <select class="form-select form-select-sm">
                                                            <option value="any">Any Type</option>
                                                            <option value="deposit">Deposit</option>
                                                            <option value="buy">Buy Coin</option>
                                                            <option value="sell">Sell Coin</option>
                                                            <option value="transfer">Transfer</option>
                                                            <option value="withdraw">Withdraw</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="overline-title overline-title-alt">Status</label>
                                                        <select class="form-select form-select-sm">
                                                            <option value="any">Any Status</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="cancel">Cancel</option>
                                                            <option value="process">Process</option>
                                                            <option value="completed">Completed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="overline-title overline-title-alt">Pay Currency</label>
                                                        <select class="form-select form-select-sm">
                                                            <option value="any">Any Coin</option>
                                                            <option value="bitcoin">Bitcoin</option>
                                                            <option value="ethereum">Ethereum</option>
                                                            <option value="litecoin">Litecoin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="overline-title overline-title-alt">Method</label>
                                                        <select class="form-select form-select-sm">
                                                            <option value="any">Any Method</option>
                                                            <option value="paypal">PayPal</option>
                                                            <option value="bank">Bank</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="includeDel">
                                                            <label class="custom-control-label" for="includeDel"> Including Deleted</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-secondary">Filter</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-foot between">
                                            <a class="clickable" href="#">Reset Filter</a>
                                            <a href="#savedFilter" data-toggle="modal">Save Filter</a>
                                        </div>
                                    </div><!-- .filter-wg -->
                                </div><!-- .dropdown -->
                            </li><!-- li -->
                        </ul><!-- .btn-toolbar -->
                    </div><!-- .card-tools -->
                    <div class="card-search search-wrap" data-search="search">
                        <div class="search-content">
                            <a href="#" class="search-back border btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                            <input type="text" class="form-control border-transparent form-focus-none" placeholder="Quick search by transaction">
                            <button class="search-submit border btn-white btn"><em class="icon ni ni-search mr-1"></em> Telusuri</button>
                        </div>
                    </div><!-- .card-search -->
                </div><!-- .card-title-group -->
            </div><!-- .card-inner -->
            <div class="card-inner p-0">
                <div class="nk-tb-list nk-tb-tnx">
                    <div class="nk-tb-item nk-tb-head">
                        <div class="nk-tb-col"><span>Nama produk</span></div>
                        <div class="nk-tb-col tb-col-lg"><span>Pengguna</span></div>
                        <div class="nk-tb-col text-right"><span>Harga</span></div>
                        <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-none d-md-block">Status</span></div>
                        <div class="nk-tb-col nk-tb-col-tools"></div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <div class="nk-tnx-type">
                                <div class="nk-tnx-type-icon bg-success-dim text-success">
                                    <em class="icon ni ni-arrow-up-right"></em>
                                </div>
                                <div class="nk-tnx-type-text">
                                    <span class="tb-lead">Deposited Funds</span>
                                    <span class="tb-date">18/10/2019 12:04 PM</span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-xxl">
                            <span class="tb-lead-sub">Using PayPal Account</span>
                            <span class="tb-sub">mypay*****com</span>
                        </div>
                        <div class="nk-tb-col text-right">
                            <span class="tb-amount">+ 0.010201 <span>BTC</span></span>
                            <span class="tb-amount-sm">1290.49 USD</span>
                        </div>
                        <div class="nk-tb-col text-right tb-col-sm">
                            <span class="tb-amount">1.30910201 <span>BTC</span></span>
                            <span class="tb-amount-sm">101290.49 USD</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-status">
                            <div class="dot dot-success d-md-none"></div>
                            <span class="badge badge-sm badge-dim badge-outline-success d-none d-md-inline-flex">Completed</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-2">
                                <li class="nk-tb-action-hidden">
                                    <a href="#" class="bg-white btn btn-sm btn-outline-light btn-icon" data-toggle="tooltip" data-placement="top" title="Approve"><em class="icon ni ni-done"></em></a>
                                </li>
                                <li class="nk-tb-action-hidden">
                                    <a href="#tranxDetails" data-toggle="modal" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" title="Details"><em class="icon ni ni-eye"></em></a>
                                </li>
                                <li>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle bg-white btn btn-sm btn-outline-light btn-icon" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt">
                                                <li><a href="#"><em class="icon ni ni-done"></em><span>Approve</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-cross-round"></em><span>Reject</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-repeat"></em><span>Check</span></a></li>
                                                <li><a href="#tranxDetails" data-toggle="modal"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-tb-item -->
                </div><!-- .nk-tb-list -->
            </div><!-- .card-inner -->
            <div class="card-inner">
                <ul class="pagination justify-content-center justify-content-md-start">
                    <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </div><!-- .card-inner -->
        </div><!-- .card-inner-group -->
    </div><!-- .card -->
</div><!-- .nk-block -->
@endsection
