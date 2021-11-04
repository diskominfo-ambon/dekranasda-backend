@extends('layouts.dashboard')

@section('content')
 <div class="nk-block-head">
    <div class="nk-block-between-md g-4">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title fw-bold">Beranda</h4>
            <div class="nk-block-des">
                <p>Here is the list of your assets / wallets!</p>
            </div>
        </div>
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
<div class="nk-block nk-block-lg">
    <div class="nk-block-head-sm">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title title">Produk yang sering dilihat</h5>
        </div>
    </div>
    <div class="row g-gs">
        <div class="col-md-6 col-lg-4">
            <div class="card card-bordered">
                <div class="nk-wgw">
                    <div class="nk-wgw-inner">
                        <a class="nk-wgw-name" href="html/crypto/wallet-bitcoin.html">
                            <div class="nk-wgw-icon is-default">
                                <em class="icon ni ni-sign-usd"></em>
                            </div>
                            <h5 class="nk-wgw-title title">USD Account</h5>
                        </a>
                        <div class="nk-wgw-balance">
                            <div class="amount">12,495.90<span class="currency currency-usd">USD</span></div>
                            <div class="amount-sm">12,495.90<span class="currency currency-usd">USD</span></div>
                        </div>
                    </div>
                    <div class="nk-wgw-actions">
                        <ul>
                            <li><a href="#"><em class="icon ni ni-arrow-up-right"></em> <span>Send</span></a></li>
                            <li><a href="#"><em class="icon ni ni-arrow-down-left"></em><span>Receive</span></a></li>
                            <li><a href="#"><em class="icon ni ni-arrow-to-right"></em><span>Withdraw</span></a></li>
                        </ul>
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
        <div class="col-md-6 col-lg-4">
            <div class="card card-bordered">
                <div class="nk-wgw">
                    <div class="nk-wgw-inner">
                        <a class="nk-wgw-name" href="html/crypto/wallet-bitcoin.html">
                            <div class="nk-wgw-icon">
                                <em class="icon ni ni-sign-eur"></em>
                            </div>
                            <h5 class="nk-wgw-title title">EUR Account</h5>
                        </a>
                        <div class="nk-wgw-balance">
                            <div class="amount">12,495.90<span class="currency currency-eur">EUR</span></div>
                            <div class="amount-sm">12,495.90<span class="currency currency-usd">USD</span></div>
                        </div>
                    </div>
                    <div class="nk-wgw-actions">
                        <ul>
                            <li><a href="#"><em class="icon ni ni-arrow-up-right"></em> <span>Send</span></a></li>
                            <li><a href="#"><em class="icon ni ni-arrow-down-left"></em><span>Receive</span></a></li>
                            <li><a href="#"><em class="icon ni ni-arrow-to-right"></em><span>Withdraw</span></a></li>
                        </ul>
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
    </div><!-- .row -->
</div><!-- .nk-block -->
<div class="nk-block nk-block-lg">
    <div class="nk-block-head-sm">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title title">Postingan yang belum diterbikan</h5>
        </div>
    </div>
    <div class="row g-gs">
        <div class="col-md-6 col-lg-4">
            <div class="card card-bordered">
                <div class="nk-wgw">
                    <div class="nk-wgw-inner">
                        <a class="nk-wgw-name" href="html/crypto/wallet-bitcoin.html">
                            <div class="nk-wgw-icon is-default">
                                <em class="icon ni ni-sign-usd"></em>
                            </div>
                            <h5 class="nk-wgw-title title">USD Account</h5>
                        </a>
                        <div class="nk-wgw-balance">
                            <div class="amount">12,495.90<span class="currency currency-usd">USD</span></div>
                            <div class="amount-sm">12,495.90<span class="currency currency-usd">USD</span></div>
                        </div>
                    </div>
                    <div class="nk-wgw-actions">
                        <ul>
                            <li><a href="#"><em class="icon ni ni-arrow-up-right"></em> <span>Send</span></a></li>
                            <li><a href="#"><em class="icon ni ni-arrow-down-left"></em><span>Receive</span></a></li>
                            <li><a href="#"><em class="icon ni ni-arrow-to-right"></em><span>Withdraw</span></a></li>
                        </ul>
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
        <div class="col-md-6 col-lg-4">
            <div class="card card-bordered">
                <div class="nk-wgw">
                    <div class="nk-wgw-inner">
                        <a class="nk-wgw-name" href="html/crypto/wallet-bitcoin.html">
                            <div class="nk-wgw-icon">
                                <em class="icon ni ni-sign-eur"></em>
                            </div>
                            <h5 class="nk-wgw-title title">EUR Account</h5>
                        </a>
                        <div class="nk-wgw-balance">
                            <div class="amount">12,495.90<span class="currency currency-eur">EUR</span></div>
                            <div class="amount-sm">12,495.90<span class="currency currency-usd">USD</span></div>
                        </div>
                    </div>
                    <div class="nk-wgw-actions">
                        <ul>
                            <li><a href="#"><em class="icon ni ni-arrow-up-right"></em> <span>Send</span></a></li>
                            <li><a href="#"><em class="icon ni ni-arrow-down-left"></em><span>Receive</span></a></li>
                            <li><a href="#"><em class="icon ni ni-arrow-to-right"></em><span>Withdraw</span></a></li>
                        </ul>
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
    </div><!-- .row -->
</div><!-- .nk-block -->
@endsection
