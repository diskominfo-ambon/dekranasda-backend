@extends('layouts.dashboard')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title fw-bold">Konfirmasi produk</h4>
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
                            <h6 class="nk-block-title">Semua produk pending</h6>
                        </div>
                        <ul class="nk-block-tools gx-3">
                            <li>
                                <a href="#" class="search-toggle toggle-search btn btn-icon btn-trigger" data-target="search"><em class="icon ni ni-search"></em></a>
                            </li>
                        </ul><!-- .nk-block-tools -->
                    </div>
                    <div class="search-wrap search-wrap-extend" data-search="search">
                        <div class="search-content">
                            <form>
                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                <input value="{{ $keyword }}" type="text" class="form-control form-control-sm border-transparent form-focus-none" name="keyword" placeholder="Telesuri produk">
                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                            </form>
                        </div>
                    </div><!-- .search-wrap -->
                </div><!-- .nk-block-head -->
                <div class="tranx-list tranx-list-stretch card card-bordered">
                    @forelse ( $products as $product )
                    <div class="tranx-item">
                        <div class="tranx-col">
                            <div class="tranx-info">

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
                                        <form method="post" action="{{ route('admins.products.confirmation.update', $product->id) }}">
                                            @method('PUT')
                                            @csrf
                                            <button onclick="return confirm('yakin ingin konfirmasi produk ini?')" class="d-flex align-items-center btn btn-sm btn-secondary text-success mr-1">
                                                <span class="mr-1"><em class="icon ni ni-check"></em></span>
                                                Konfirmasi
                                            </button>
                                        </form>
                                    </div>
                                    <button data-toggle="modal" data-target="#modalProductRejected" data-action-url="{{ route('admins.products.confirmation.destroy', $product->id) }}" type="button" class="btn-rejected btn bg-white text-primary btn-sm d-flex align-items-center">
                                        <span class="mr-1"><em class="icon ni ni-cross"></em></span>
                                        Batalkan
                                    </button>

                            </div>
                        </div>
                    </div><!-- .nk-tranx-item -->
                    @empty
                    <div class="text-center p-2">
                        <h4>Produk belum tersedia</h4>
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


{{-- modal product rejected --}}
<div class="modal fade" tabindex="-1" id="modalProductRejected">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title text-primary">Batalkan produk</h5>
                </div>
                <div class="modal-body">
                    <form id="modal__form" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <label for="content">Masukan catatan bagi pengguna <em>(Opsional)</em></label>
                            <textarea class="form-control no-resize" name="content"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light text-left">
                    <button class="btn btn-primary" id="modal__btn-submit">Simpan & batalkan produk</button>
                    <button class="btn" data-dismiss="modal" aria-label="Close">Kembali</button>
                </div>
            </div>
    </div>
</div>
{{-- end --}}
@endsection

@section('script')
<script>
$(document).ready(main);

function main() {
    $('#modal__btn-submit').click(() => {
        $('#modal__form').submit();
    });

    $('.btn-rejected').click(function () {
        const action = $(this).data().actionUrl;
        $('#modal__form').attr('action', action);
    });
}
</script>
@endsection
