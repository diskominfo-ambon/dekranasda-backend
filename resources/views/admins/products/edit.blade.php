@extends('layouts.dashboard')



@section('content')
<div class="buysell wide-xs m-auto">
    <div class="buysell-title text-center">
        <h4 class="title">Ubah produk<span class="text-primary d-block mt-1">#perajinindonesia.</span></h4>
    </div><!-- .buysell-title -->
    <div class="buysell-block">
        <form method="post" action="{{ route('admins.products.update', $product->id) }}" class="buysell-form">
            @csrf
            @method('PUT')
            {{-- nama produk --}}
            <div class="buysell-field form-group">
                <div class="form-label-group">
                    <label class="form-label" for="product-title">Nama produk</label>
                </div>
                <div class="form-control-group">
                    <input type="text" class="form-control form-control-lg form-control-number" id="product-title" name="title" placeholder="Contoh: Kain batik tual" value="{{ $product->title }}">
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
                    <input type="number" class="form-control form-control-lg form-control-number" id="product-price" name="price" value="{{ $product->price }}" placeholder="Contoh: 20000">
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
                @error('title')
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
                            <option value="{{ $category->id }}" {{ $product->categories->contains($category) ? 'selected' : '' }}>
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
                    <textarea name="content" class="tinymce-toolbar form-control">{{ $product->content }}</textarea>
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
                        <input type="file" multiple id="attachment-input" placeholder="Contoh: Kain batik tual">
                        <label class="custom-file-label" for="attachment-input">Jumlah unggahan &nbsp;<span data-count="{{ $product->attachments->count() }}" id="currentFileCount">{{ $product->attachments->count() }}</span></label>
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

            {{-- attachments --}}
            <div id="attachments">
                @foreach($product->attachments as $attachment)
                    <input data-input-uniqid-id="{{ $attachment->id }}" name="attachments[]" class="d-none" text="number" readonly value="{{ $attachment->id }}"/>
                @endforeach
            </div>
            {{-- end --}}


            <div id="uploader-container">
                @foreach($product->attachments as $attachment)
                <div class="border px-2 py-1 rounded d-flex align-items-center justify-content-between">
                    <div>
                        <p class="m-0">{{ $attachment->original_filename }}</p>
                        <small>Ukuran unggahan {{ round($attachment->byte_size / 1024) }} KB</small>
                    </div>
                    <div data-uniqid-id="{{ $attachment->id }}">
                        <a href="{{ asset($attachment->path) }}" target="__blank" class="btn btn-sm">Lihat</a>
                        <button data-attachment="{{ json_encode(
                                array_merge(
                                    $attachment->only(['id']),
                                    [
                                        'uniqidId' => $attachment->id,
                                        'originalFilename' => $attachment->original_filename
                                    ]
                                )
                            ) }}" type="button" class="btn btn-sm text-danger btn__rejected btn__rejecteable">Hapus</button>
                    </div>
                </div>
                @endforeach
            </div>


            {{-- submit --}}
            <div class="buysell-field form-action mt-5 d-lg-flex align-items-center justify-content-between d-sm-block">
                <small class="text-base d-block mb-sm-2 mt-md-0">Catatan: Semua informasi mengenai pembelian akan diinfokan ke nomor telepon / WA pengguna.</small>
                <button type="submit" style="flex-basis: 40%;" class="btn btn-lg btn-primary btn-block">Simpan produk</button>
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
