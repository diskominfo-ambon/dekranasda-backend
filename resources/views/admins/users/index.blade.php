@extends('layouts.dashboard')


@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Pengguna</h3>
            <div class="nk-block-des text-soft">
                <p>Kamu memiliki {{ $users->count() }} jumlah pengguna yang terdaftar.</p>
            </div>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li><a href="#" class="btn btn-white btn-dim btn-outline-light"><em class="icon ni ni-download"></em><span>Download</span></a></li>
                        <li class="nk-block-tools-opt">
                            <a href="{{ route('admins.pengguna.create') }}" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
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
                        <h5 class="title">Semua pengguna</h5>
                    </div>
                    <div class="card-tools mr-n1">
                        <ul class="btn-toolbar gx-1">
                            <li>
                                <a href="#" class="search-toggle border toggle-search btn btn-icon" data-target="search"><em class="icon ni ni-search"></em></a>
                            </li><!-- li -->
                        </ul><!-- .btn-toolbar -->
                    </div><!-- .card-tools -->
                    <form class="card-search search-wrap" data-search="search">
                        <div class="search-content">
                            <a href="#" class="search-back border btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                            <input autocomplete="off" value="{{ $keyword }}" type="text" class="form-control border-transparent form-focus-none" placeholder="Telusuri nama pengguna yang ingin kamu cari">
                            <button class="search-submit border btn-white btn"><em class="icon ni ni-search mr-1"></em> Telusuri</button>
                        </div>
                    </form><!-- .card-search -->
                </div><!-- .card-title-group -->
            </div><!-- .card-inner -->
            <div class="card-inner p-0">
                <div class="nk-tb-list nk-tb-tnx">
                    <div class="nk-tb-item nk-tb-head">
                        <div class="nk-tb-col"><span>Nama</span></div>
                        <div class="nk-tb-col tb-col-lg"><span>Terdaftar pada</span></div>
                        <div class="nk-tb-col text-right"><span>Nomor telepon</span></div>
                        <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-none d-md-block">Status pengguna</span></div>
                        <div class="nk-tb-col nk-tb-col-tools"></div>
                    </div><!-- .nk-tb-item -->
                    @foreach($users as $user)
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <div class="nk-tnx-type">
                                <div class="nk-tnx-type-icon bg-secondary-dim">
                                    <em class="icon ni ni-user-fill"></em>
                                </div>
                                <div class="nk-tnx-type-text">
                                    <span class="tb-lead">{{ $user->name }}</span>
                                    <span class="tb-date">
                                        {{ $user->email }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-amount">{{ $user->created_at->isoFormat('LL') }}</span>
                        </div>
                        <div class="nk-tb-col text-right tb-col-sm">
                            <span class="tb-amount">{{ $user->phone_number ?? 'Tidak tersedia' }}</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-status">
                            @if ($user->hasRole('admin'))
                            <span class="badge badge-sm badge-dim badge-info d-none d-md-inline-flex">ADMIN</span>
                            @else
                            <span class="badge badge-sm badge-dim badge-secondary d-none d-md-inline-flex">PENGGUNA</span>
                            @endif
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-2">
                                <li class="nk-tb-action-hidden">
                                    <a href="{{ route('admins.pengguna.edit', $user->id) }}" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" title="Ubah pengguna"><em class="icon ni ni-edit"></em></a>
                                </li>
                                <li>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle bg-white btn btn-sm btn-outline-light btn-icon" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt">
                                                <li><a href="{{ route('admins.pengguna.edit', $user->id) }}"><em class="icon ni ni-edit"></em><span>Ubah pengguna</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-cross-round"></em><span>Nonaktifkan pengguna</span></a></li>
                                                <li>
                                                    <form method="post" action="{{ route('admins.pengguna.destroy', $user->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-white btn-block font-weight-normal text-danger" onclick="return confirm('Yakin ingin menghapus?')"><em class="icon ni ni-trash"></em><span>Hapus pengguna</span></button>
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
            </div><!-- .card-inner -->
            <div class="card-inner">
                {{ $users->links('pagination::bootstrap-4') }}
            </div><!-- .card-inner -->
        </div><!-- .card-inner-group -->
    </div><!-- .card -->
</div><!-- .nk-block -->
@endsection
