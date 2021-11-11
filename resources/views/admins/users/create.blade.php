@extends('layouts.dashboard')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="buysell wide-xs m-auto">
                <div class="buysell-title text-center">
                    <h4 class="title">
                        Tambahkan pengguna baru
                    </h4>
                </div><!-- .buysell-title -->
                <div class="buysell-block">
                    <form action="{{ route('admins.users.store') }}" class="buysell-form" method="post">
                        @csrf
                        @method('post')
                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="name">Nama pengguna</label>
                            </div>
                            <div class="form-control-group">
                                <input value="{{ old('name') }}" type="text" class="form-control form-control-lg form-control-number" id="name" name="name" placeholder="Nama pengguna">
                            </div>
                            <div class="form-note-group">
                                <span class="buysell-min form-note-alt">
                                    Pastikan masukan nama pengguna yang jelas
                                </span>
                            </div>
                            @error('name')
                            <div class="form-note-group">
                                <span class="buysell-min form-note-alt text-danger fs-15px">
                                    {{ $message }}
                                </span>
                            </div>
                            @enderror
                        </div><!-- .buysell-field -->

                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="phone_number">Nomor telepon</label>
                            </div>
                            <div class="form-control-group">
                                <input value="{{ old('phone_number') }}" type="number" class="form-control form-control-lg form-control-number" id="phone_number" name="phone_number" placeholder="Nomor telepon pengguna">
                            </div>
                            <div class="form-note-group">
                                <span class="buysell-min form-note-alt">
                                    Pastikan nomor telepon kamu terhubung dengan akun WhatsApp
                                </span>
                            </div>
                            @error('phone_number')
                            <div class="form-note-group">
                                <span class="buysell-min form-note-alt text-danger fs-15px">
                                    {{ $message }}
                                </span>
                            </div>
                            @enderror
                        </div><!-- .buysell-field -->

                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="email">Alamat email</label>
                            </div>
                            <div class="form-control-group">
                                <input value="{{ old('email') }}" type="email" class="form-control form-control-lg form-control-number" id="email" name="email" placeholder="Alamat email pengguna">
                            </div>
                            <div class="form-note-group">
                                <span class="buysell-min form-note-alt">
                                    Pastikan masukan alamat email yang aktif kamu gunakan
                                </span>
                            </div>
                            @error('email')
                            <div class="form-note-group">
                                <span class="buysell-min form-note-alt text-danger fs-15px">
                                    {{ $message }}
                                </span>
                            </div>
                            @enderror
                        </div><!-- .buysell-field -->

                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="password">Kata sandi</label>
                            </div>
                            <div class="form-control-group">
                                <input value="{{ old('password') }}" type="password" class="form-control form-control-lg form-control-number" id="password" name="password" placeholder="Kata sandi pengguna">
                            </div>
                            @error('password')
                            <div class="form-note-group">
                                <span class="buysell-min form-note-alt text-danger fs-15px">
                                    {{ $message }}
                                </span>
                            </div>
                            @enderror
                        </div><!-- .buysell-field -->

                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label">Status pengguna</label>
                            </div>
                            <div class="form-pm-group">
                                <ul class="buysell-pm-list">
                                    <li class="buysell-pm-item">
                                        <input class="buysell-pm-control" type="radio" name="role" id="role-user" value="user" checked />
                                        <label class="buysell-pm-label" value="user" for="role-user">
                                            <div class="d-flex flex-column">
                                                <span class="pm-name">Pengguna Biasa</span>
                                                <small class="text-gray">
                                                    Pengguna hak akses untuk <strong>perajin</strong>
                                                </small>
                                            </div>
                                            <span class="pm-icon"><em class="icon ni ni-user-fill"></em></span>
                                        </label>
                                    </li>
                                    <li class="buysell-pm-item">
                                        <input class="buysell-pm-control" type="radio" name="role" value="admin" id="role-admin" />
                                        <label class="buysell-pm-label" for="role-admin">
                                            <div class="d-flex flex-column">
                                                <span class="pm-name">Pengguna Admin</span>
                                                <small class="text-gray">Pangguna dengan status ADMIN akan mendapatkan seluruh hak akses</small>
                                            </div>
                                            <span class="pm-icon"><em class="icon ni ni-users-fill"></em></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            @error('role')
                            <div class="form-note-group">
                                <span class="buysell-min form-note-alt text-danger fs-15px">
                                    {{ $message }}
                                </span>
                            </div>
                            @enderror
                        </div><!-- .buysell-field -->





                        <div class="buysell-field form-action">
                            <a href="{{ route('admins.users.index') }}" class="btn btn-white d-inline-flex align-items-center">
                            <em class="icon ni ni-chevron-left mr-1"></em> Kembali
                            </a>
                            <button class="btn btn-primary ml-1 d-inline-flex align-items-center">
                                Tambahkan <span class="fs-12px"><em class="icon ni ni-user-add-fill ml-1"></em></span>
                            </button>
                        </div><!-- .buysell-field -->
                    </form><!-- .buysell-form -->
                </div><!-- .buysell-block -->
            </div><!-- .buysell -->
        </div>
    </div>
</div>
@endsection
