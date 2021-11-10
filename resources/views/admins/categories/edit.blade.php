@extends('layouts.dashboard')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="buysell wide-xs m-auto">
                <div class="buysell-title text-center">
                    <h4 class="title">
                        Ubah kategori <b>{{ $category->name }}</b>
                    </h4>
                </div><!-- .buysell-title -->
                <div class="buysell-block">
                    <form action="{{ route('admins.categories.update', $category->id) }}" class="buysell-form" method="post">
                        @csrf
                        @method('post')
                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="name">Nama kategori</label>
                            </div>
                            <div class="form-control-group">
                                <input value="{{ $category->name }}" type="text" class="form-control form-control-lg form-control-number" id="name" name="name" placeholder="Judul postingan">
                            </div>
                            @error('name')
                            <div class="form-note-group">
                                <span class="buysell-min form-note-alt text-danger fs-15px">
                                    {{ $message }}
                                </span>
                            </div>
                            @enderror
                        </div><!-- .buysell-field -->

                        <div class="buysell-field form-action mt-5 d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ route('admins.categories.index') }}" class="btn btn-white d-inline-flex align-items-center">
                                    <em class="icon ni ni-chevron-left mr-1"></em> Kembali
                                </a>
                                <button class="btn btn-primary ml-1 d-inline-flex align-items-center">
                                    Simpan perubahan
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
