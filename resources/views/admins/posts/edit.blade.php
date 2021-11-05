@extends('layouts.dashboard')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="buysell wide-xs m-auto">
                <div class="buysell-title text-center">
                    <h4 class="title">
                       <b> Ubah postingan</b>
                    </h4>
                </div><!-- .buysell-title -->
                <div class="buysell-block">
                    <form action="{{ route('admins.post.update', $post->id) }}" class="buysell-form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="title">Judul</label>
                            </div>
                            <div class="form-control-group">
                                <input value="{{ $post->title }}" type="text" class="form-control form-control-lg form-control-number" id="title" name="title" placeholder="Judul postingan">
                            </div>
                            <div class="form-note-group">
                                <span class="buysell-min form-note-alt">
                                    Pastikan masukan judul yang jelas
                                </span>
                            </div>
                            @error('title')
                            <div class="form-note-group">
                                <span class="buysell-min form-note-alt text-danger fs-15px">
                                    {{ $message }}
                                </span>
                            </div>
                            @enderror
                        </div><!-- .buysell-field -->

                        {{-- content --}}
                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label">Deskripsi</label>
                            </div>
                            <div class="form-pm-group">
                                <textarea name="content" class="tinymce-toolbar form-control">{{ $post->content }}</textarea>
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
                                    <input type="file" name="file" class="custom-file-input" id="attachment-input">
                                    <label class="custom-file-label" for="attachment-input">Unggah gambar</label>
                                </div>
                            </div>
                        </div>
                        @error('file')
                        <div class="form-note-group">
                            <span class="buysell-min form-note-alt text-danger fs-15px">
                                {{ $message }}
                            </span>
                        </div>
                        @enderror
                        {{-- end --}}

                        <div class="buysell-field form-action mt-5 d-flex justify-content-between align-items-center">
                            <div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" {{ $post->isPublished && 'checked' }} class="custom-control-input" name="published" id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1">Terbitkan</label>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('admins.post.index') }}" class="btn btn-white d-inline-flex align-items-center">
                                    <em class="icon ni ni-chevron-left mr-1"></em> Kembali
                                </a>
                                <button class="btn btn-primary ml-1 d-inline-flex align-items-center">
                                    Simpan
                                </button>
                            </div>
                        </div><!-- .buysell-field -->
                    </form><!-- .buysell-form -->
                </div><!-- .buysell-block -->
            </div><!-- .buysell -->
        </div>
    </div>
</div>
@endsection


@section('head')
<link rel="stylesheet" href="{{ asset('css/dashlite/editors/tinymce.css?ver=2.2.0') }}">
@endsection

@section('script')
<script src="{{ asset('js/dashlite/libs/editors/tinymce.js?ver=2.2.0') }}"></script>
<script src="{{ asset('js/dashlite/editors.js?ver=2.2.0') }}"></script>
@endsection
