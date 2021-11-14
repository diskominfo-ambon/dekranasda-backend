@extends('layouts.dashboard')

@section('content')

<div class="kyc-app wide-sm m-auto">
    <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
        <div class="nk-block-head-content text-center">
            <h2 class="nk-block-title fw-normal">Pengaturan akun</h2>
            <div class="nk-block-des">
                <p>Tambahkan informasi pengguna akun untuk memudahkan pengguna lain mengetahui Anda. <em>Catatan: Data yang bersifat sensitif akan sembunyikan.</em></p>
            </div>
        </div>
    </div><!-- nk-block-head -->
    <div class="nk-block">
        <form method="POST" action="{{ route('profiles.update') }}">
            @csrf
            @method('PUT')
            <div class="card card-bordered">
                <div class="nk-kycfm">
                    <div class="nk-kycfm-head">
                        <div class="nk-kycfm-count">01</div>
                        <div class="nk-kycfm-title">
                            <h5 class="title">Informasi umum</h5>
                            <p class="sub-title">
                                Tambahkan informasi wajib umum pengguna
                            </p>
                        </div>
                    </div><!-- .nk-kycfm-head -->
                    <div class="nk-kycfm-content">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Nama lengkap <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="form-control-group">
                                        <input name="name" value="{{ $user->name }}" type="text" class="form-control form-control-lg">
                                        @error('name')
                                        <span class="text-danger d-inline-block mt-1">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Nomor telepon <em>WA</em></em><span class="text-danger">*</span></label>
                                    </div>
                                    <div class="form-control-group">
                                        <input type="number" name="phone_number" value="{{ $user->phone_number }}" type="text" class="form-control form-control-lg">
                                        @error('phone_number')
                                        <span class="text-danger d-inline-block mt-1">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Alamat email <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="form-control-group">
                                        <input name="email" type="email" value="{{ $user->email }}" class="form-control form-control-lg">
                                        @error('email')
                                        <span class="text-danger d-inline-block mt-1">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Kata sandi baru</label>
                                    </div>
                                    <div class="form-control-group">
                                        <input type="password" name="new_password" class="form-control form-control-lg">
                                        @error('new_password')
                                        <span class="text-danger d-inline-block mt-1">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- .col -->

                        </div><!-- .row -->
                    </div><!-- .nk-kycfm-content -->
                    <div class="nk-kycfm-content">
                        <div class="nk-kycfm-note">

                            <p>Masukan informasi tentang pengguna untuk agar dapat diketahui oleh konsumen</p>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Tentang pengguna</label>
                                    </div>
                                    <div class="form-control-group">
                                        <textarea name="profile_info" class="form-control form-control-lg">{{ $user?->profile_info }}</textarea>
                                        @error('about')
                                        <span class="text-danger d-inline-block mt-1">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .nk-kycfm-content -->
                    <div class="nk-kycfm-footer py-3">
                        <div class="nk-kycfm-action">
                            <button type="submit" class="btn btn-primary">
                                Simpan perubahan
                            </button>
                        </div>
                    </div><!-- .nk-kycfm-footer -->
                </div><!-- .nk-kycfm -->
            </div><!-- .card -->
        </form>
    </div><!-- nk-block -->
</div><!-- kyc-app -->

@endsection
