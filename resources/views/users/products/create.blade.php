@extends('layouts.dashboard')



@section('content')
<div class="buysell wide-xs m-auto">
    <div class="buysell-title text-center">
        <h4 class="title">Buat produk kamu menarik!<span class="text-primary d-block mt-1">#perajinindonesia.</span></h4>
    </div><!-- .buysell-title -->
    <div class="buysell-block">
        <form action="{{ route('produk.store') }}" class="buysell-form" method="POST">
            @csrf
            @method('POST')
            {{-- nama produk --}}
            <div class="buysell-field form-group">
                <div class="form-label-group">
                    <label class="form-label" for="product-title">Nama produk</label>
                </div>
                <div class="form-control-group">
                    <input type="text" class="form-control form-control-lg form-control-number" id="product-title" name="title" placeholder="Contoh: Kain batik tual" value="{{ old('title') }}">
                </div>
                <div class="form-note-group">
                    <span class="buysell-min form-note-alt">
                        Pastikan kamu membuat nama produk dengan jelas.
                    </span>
                </div>
                @error('title')
                <div class="form-note-group">
                    <span class="buysell-min form-note-alt text-danger fs-15px">
                        {{ $message }}
                    </span>
                </div>
                @enderror
            </div>
            {{-- end --}}


            {{-- harga produk --}}
            <div class="buysell-field form-group">
                <div class="form-label-group">
                    <label class="form-label" for="product-price">Harga</label>
                </div>
                <div class="form-control-group">
                    <input type="number" class="form-control form-control-lg form-control-number" id="product-price" name="price" placeholder="Contoh: 20000">
                    <div class="form-dropdown">
                        <div class="text">DISKON<span>/</span></div>
                        <div class="dropdown">
                            <a href="#" class="dropdown-indicator-caret" data-toggle="dropdown" data-offset="0,2">TIDAK ADA</a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right text-center">
                                <ul class="link-list-plain">
                                    <li>
                                        <input id="discount-nothing" class="d-none" type="radio" value="" name="discount">
                                        <label for="discount-nothing">Tidak ada</label>
                                    </li>
                                    @php
                                        $discount = 10;
                                    @endphp
                                    @while($discount <= 50)
                                    <li>
                                        <input id="discount-{{ $discount }}" class="d-none" type="radio" value="" name="discount">
                                        <label for="discount-{{ $discount }}" class="text-primary">{{ $discount }}%</label>
                                    </li>
                                    @php
                                        $discount += 10;
                                    @endphp
                                    @endwhile
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-note-group">
                    <span class="buysell-min form-note-alt">
                        Masukan nominal tanpa menggunakan tanda (,) sesuai dengan contoh.
                    </span>
                </div>
                @error('price')
                <div class="form-note-group">
                    <span class="buysell-min form-note-alt text-danger fs-15px">
                        {{ $message }}
                    </span>
                </div>
                @enderror
            </div>
            {{-- end --}}

            {{-- kategori produk --}}
            <div class="buysell-field form-group">
                <div class="form-label-group">
                    <label class="form-label">Kategori</label>
                </div>
                <div class="form-control-wrap">
                    <select name="categories[]" multiple class="form-select" data-search="on" data-ui="lg">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                @error('categories')
                <div class="form-note-group">
                    <span class="buysell-min form-note-alt text-danger fs-15px">
                        {{ $message }}
                    </span>
                </div>
                @enderror
            </div>
            {{-- end --}}

            {{-- content produk --}}
            <div class="buysell-field form-group">
                <div class="form-label-group">
                    <label class="form-label">Deskripsi</label>
                </div>
                <div class="form-pm-group">
                    <textarea name="content" class="tinymce-toolbar form-control">Produk terbaik saya!</textarea>
                </div>
                @error('content')
                <div class="form-note-group">
                    <span class="buysell-min form-note-alt text-danger fs-15px">
                        {{ $message }}
                    </span>
                </div>
                @enderror
            </div>
            {{-- end --}}

            {{-- attachmet produk --}}
            <div class="buysell-field form-group">
                <div class="form-label-group">
                    <label class="form-label" for="buysell-amount">Unggah gambar produk</label>
                </div>
                <div class="form-control-group">
                    <div class="custom-file">
                        <input accept="image/jpeg, image/png" type="file" id="attachment-input" placeholder="Contoh: Kain batik tual">
                        <label class="custom-file-label" for="attachment-input">Jumlah unggahan&nbsp;<span id="currentFileCount">0</span></label>
                    </div>
                </div>
                <div class="form-note-group mt-4">
                    <span class="buysell-min form-note-alt border rounded p-1">
                        Kamu dapat menggungah max 3 gambar untuk setiap produk • Max ukuran unggahan 700 KB.
                    </span>
                </div>

                @error('attachments')
                <div class="form-note-group">
                    <span class="buysell-min form-note-alt text-danger fs-15px">
                        {{ $message }}
                    </span>
                </div>
                @enderror
            </div>
            {{-- end --}}

            <div id="attachments"></div>

            <div id="uploader-container"></div>
            {{-- end

            {{-- submit --}}
            <div class="buysell-field form-action mt-5 d-lg-flex align-items-center justify-content-between d-sm-block">
                <small class="text-base d-block mb-sm-2 mt-md-0">Catatan: Semua informasi mengenai pembelian akan diinfokan ke nomor telepon / WA pengguna.</small>
                <button style="flex-basis: 40%;" class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#buy-coin">Tambahkan produk</button>
            </div>
            {{-- end --}}
        </form><!-- .buysell-form -->
    </div><!-- .buysell-block -->
</div><!-- .buysell -->

@endsection

@section('head')
<link rel="stylesheet" href="{{ asset('css/dashlite/editors/tinymce.css?ver=2.2.0') }}">
@endsection

@section('script')
<script src="{{ asset('js/dashlite/libs/editors/tinymce.js?ver=2.2.0') }}"></script>
<script src="{{ asset('js/dashlite/editors.js?ver=2.2.0') }}"></script>
<script src="{{ asset('js/dashlite/products/form.js?ver=2.2.2') }}"></script>
@endsection
