<div class="nk-header nk-header-fluid nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-news d-none d-xl-block">
                <div class="nk-news-list">
                    <a class="nk-news-item" href="#">
                        <div class="nk-news-icon text-primary">
                            <em class="icon ni ni-info text-primary"></em>
                        </div>
                        <div class="nk-news-text">
                            <p>
                               Butuh bantuan? hubungi layanan bantuan dekranasda
                            </p>
                            <em class="icon ni ni-external"></em>
                        </div>
                    </a>
                </div>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar bg-primary sm">
                                    <em class="icon ni ni-user-fill"></em>
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status user-status-unverified">
                                        {{ strtoupper(auth()->user()->roles()->first()->name) }}
                                    </div>
                                    <div class="user-name dropdown-indicator">
                                        {{ auth()->user()->name }}
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar bg-primary">
                                        <em class="icon ni ni-user-fill"></em>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">
                                            {{ auth()->user()->name }}
                                        </span>
                                        <span class="sub-text">
                                            {{ auth()->user()->email }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @can('user')
                            <div class="dropdown-inner user-account-info">
                                <h6 class="overline-title-alt">Jumlah produk kamu</h6>
                                <div class="user-balance">12.395769</div>

                                <a href="#" class="link"><span>Tambahkan produk</span> <em class="icon ni ni-wallet-out"></em></a>
                            </div>
                            @endcan
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="#"><em class="icon ni ni-setting-alt"></em><span>Pengaturan Akun</span></a></li>
                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Mode Gelap</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="btn btn-block"><em class="icon ni ni-signout"></em><span>Keluar</span></a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown notification-dropdown mr-n1">
                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                            <div class="{{ auth()->user()->unreadNotifications->count()
                            ? 'icon-status icon-status-danger'
                            : 'icon-status'  }}"><em class="icon ni ni-bell-fill"></em></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-body">
                                <div class="nk-notification">
                                    @forelse (auth()->user()->unreadNotifications as $notification)
                                        <div class="nk-notification-item dropdown-inner">
                                            <div class="nk-notification-content">
                                                <div class="nk-notification-text">
                                                    <a class="text-secondary fw-bold" href="{{ $notification['route'] }}">
                                                        {{ $notification->data['message'] }}
                                                    </a>
                                                    @if ( array_key_exists('content', $notification->data) )
                                                    <p class="m-0 mt-1">
                                                        {{
                                                            $notification->data['content']
                                                        }}
                                                    </p>
                                                    @endif
                                                </div>
                                                <div class="nk-notification-time mt-1">
                                                    Ditambahkan pada {{ $notification->created_at->isoFormat('LL') }}
                                                </div>
                                            </div>
                                        </div><!-- .dropdown-inner -->
                                    @empty
                                        <div class="d-flex flex-column justify-content-center align-items-center py-5">
                                            <span class="fs-22px"><em class="icon ni ni-bell"></em></span>
                                            <p class="fs-15px text-gray">Pemberitahuan baru belum tersedia</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div><!-- .nk-dropdown-body -->
                            {{-- <div class="dropdown-foot center">
                                <a href="#">View All</a>
                            </div> --}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
