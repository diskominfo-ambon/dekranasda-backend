@extends('layouts.dashboard')


@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Kegiatan & berita</h3>
            <div class="nk-block-des text-soft">
                <p>Kamu memiliki {{ $posts->count() }} jumlah postingan yang tersedia.</p>
            </div>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li class="nk-block-tools-opt">
                            <a href="{{ route('admins.post.create') }}" class="btn btn-primary"><em class="icon ni ni-plus mr-1"></em> Tambahkan</a>
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
                            {{
                                str($keyword)->trim()->isNotEmpty()
                                    ? "Pencarian untuk '{$keyword}'"
                                    : 'Semua postingan'
                             }}
                        </h5>
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
                            <input type="text" class="form-control border-transparent form-focus-none" placeholder="Telusuri postingan yang ingin kamu cari" name="keyword" value="{{ $keyword }}">
                            <button class="search-submit border btn-white btn"><em class="icon ni ni-search mr-1"></em> Telusuri</button>
                        </div>
                    </form><!-- .card-search -->
                </div><!-- .card-title-group -->
            </div><!-- .card-inner -->
            <div class="card-inner p-0">
                <div class="nk-tb-list nk-tb-tnx">
                    <div class="nk-tb-item nk-tb-head">
                        <div class="nk-tb-col"><span>Judul</span></div>
                        <div class="nk-tb-col tb-col-lg"><span>Ditambahkan</span></div>
                        <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-none d-md-block">Status</span></div>
                        <div class="nk-tb-col nk-tb-col-tools"></div>
                    </div><!-- .nk-tb-item -->
                    @foreach ($posts as $post)
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <div class="nk-tnx-type">
                                <div class="nk-tnx-type-text">
                                    <span class="tb-lead">
                                        {{ str($post->title)->limit(50) }}
                                    </span>
                                    <span class="tb-date">
                                        Memiliki {{ views($post)->count() }} jumlah pengunjung
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-amount">
                                {{ $post->created_at->isoFormat('LL') }}
                            </span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-status">
                            @if ($post->isPublished)
                            <span class="badge badge-sm badge-dim badge-outline-success d-none d-md-inline-flex">Telah dipublikasi</span>
                            @else
                            <span class="badge badge-sm badge-dim badge-outline-warning d-none d-md-inline-flex">Belum dipublikasi</span>
                            @endif
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-2">
                                <li class="nk-tb-action-hidden">
                                    <a href="#tranxDetails" data-toggle="modal" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" title="Details"><em class="icon ni ni-eye"></em></a>
                                </li>
                                <li>
                                    <div class="dropdown">
                                        <a href="{{ route('admins.post.show', $post->id) }}" class="dropdown-toggle bg-white btn btn-sm btn-outline-light btn-icon" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt">
                                                <li><a href="{{ route('admins.post.edit', $post->id) }}"><em class="icon ni ni-edit"></em><span>Ubah postingan</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-cross-round"></em><span>Nonaktifkan postingan</span></a></li>
                                                <li>
                                                    <form method="post" action="{{ route('admins.post.destroy', $post->id) }}">
                                                        @csrf
                                                        @method('delete')

                                                        <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-white text-danger font-weight-normal btn-block"><em class="icon ni ni-eye"></em><span>Hapus postingan</span></button>
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
                {{ $posts->links('pagination::bootstrap-4') }}
            </div><!-- .card-inner -->
        </div><!-- .card-inner-group -->
    </div><!-- .card -->
</div><!-- .nk-block -->
@endsection
