<div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-body" data-simplebar>
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-widget d-none d-xl-block">
                    <div class="user-account-actions">
                        <ul class="g-2 d-block">
                            <li class="w-100">
                                <a href="{{ route('admins.produk.create') }}" class="btn btn-lg btn-primary">
                                    <span><em class="icon ni ni-wallet-saving position-relative" style="top: 2px;"></em> Produk</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- .nk-sidebar-widget -->
                <div class="nk-sidebar-widget nk-sidebar-widget-full d-xl-none pt-0">
                    <a class="nk-profile-toggle toggle-expand" data-target="sidebarProfile" href="#">
                        <div class="user-card-wrap">
                            <div class="user-card">
                                <div class="user-avatar">
                                    <em class="icon ni ni-user-fill"></em>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text">Abu Bin Ishtiyak</span>
                                    <span class="sub-text">info@softnio.com</span>
                                </div>
                                <div class="user-action">
                                    <em class="icon ni ni-caret-down-fill"></em>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="nk-profile-content toggle-expand-content" data-content="sidebarProfile">
                        <div class="user-account-info between-center">
                            <div class="user-account-main">
                                <h6 class="overline-title-alt">Available Balance</h6>
                                <div class="user-balance">2.014095 <small class="currency currency-btc">BTC</small></div>
                                <div class="user-balance-alt">18,934.84 <span class="currency currency-btc">BTC</span></div>
                            </div>

                        </div>
                        <ul class="user-account-data">
                            <li>
                                <div class="user-account-label">
                                    <span class="sub-text">Profits (7d)</span>
                                </div>
                                <div class="user-account-value">
                                    <span class="lead-text">+ 0.0526 <span class="currency currency-btc">BTC</span></span>
                                    <span class="text-success ml-2">3.1% <em class="icon ni ni-arrow-long-up"></em></span>
                                </div>
                            </li>
                            <li>
                                <div class="user-account-label">
                                    <span class="sub-text">Deposit in orders</span>
                                </div>
                                <div class="user-account-value">
                                    <span class="sub-text text-base">0.005400 <span class="currency currency-btc">BTC</span></span>
                                </div>
                            </li>
                        </ul>
                        <ul class="link-list">
                            <li><a href="html/crypto/profile-security.html"><em class="icon ni ni-setting-alt"></em><span>Pengaturan akun</span></a></li>
                        </ul>
                        <ul class="link-list">
                            <li><a href="#"><em class="icon ni ni-signout"></em><span>Keluar</span></a></li>
                        </ul>
                    </div>
                </div><!-- .nk-sidebar-widget -->
                <div class="nk-sidebar-menu pt-0 mt-4">
                    <!-- Menu -->
                    <ul class="nk-menu">
                        <li class="nk-menu-heading">
                            <h6 class="overline-title">Menu</h6>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('admins.home') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                <span class="nk-menu-text">Beranda</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('admins.produk.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-todo-fill"></em></span>
                                <span class="nk-menu-text">Produk</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('admins.produk.konfirmasi') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-check-fill-c"></em></span>
                                <span class="nk-menu-text">Konfirmasi Produk</span>
                            </a>
                        </li>

                        <li class="nk-menu-item">
                            <a href="{{ route('admins.post.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-fill"></em></span>
                                <span class="nk-menu-text">Kegiatan & Berita</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('admins.users.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-fill-c"></em></span>
                                <span class="nk-menu-text">Pengguna</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('admins.categories.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-tags-fill"></em></span>
                                <span class="nk-menu-text">Kategori</span>
                            </a>
                        </li>
                    </ul><!-- .nk-menu -->
                </div><!-- .nk-sidebar-menu -->
                <div class="nk-sidebar-footer">
                    <ul class="nk-menu nk-menu-footer">
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link">
                                <span class="nk-menu-icon text-primary"><em class="icon ni ni-help-alt"></em></span>
                                <span class="nk-menu-text ml-1">Butuh bantuan? hubungi Tim Developer.</span>
                            </a>
                        </li>
                    </ul><!-- .nk-footer-menu -->
                </div><!-- .nk-sidebar-footer -->
            </div><!-- .nk-sidebar-content -->
        </div><!-- .nk-sidebar-body -->
    </div><!-- .nk-sidebar-element -->
</div>
