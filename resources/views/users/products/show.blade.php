@extends('layouts.dashboard')

@section('content')

    @if ($product->isPublished)
        <div class="alert alert-icon alert-light" role="alert">
            <em class="icon ni ni-check-circle text-success"></em>
            Produk ini memiliki status yang telah dikonfimasi.
        </div>
    @else
        <div class="alert alert-icon alert-light" role="alert">
            <em class="icon ni ni-alert-circle text-warning"></em>
            Produk ini memiliki status pending
        </div>
    @endif

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="h-100 d-flex flex-column justify-content-md-center">
                <h4 class="fw-semibold" style="line-height: 2rem;">
                    {{ $product->title }}
                </h4>
                <p class="mt-1 mb-2">Ditambahkan pada {{ $product->created_at->isoFormat('LL') }} oleh {{ $product->user->name }}</p>
                <div>
                    @foreach ($product->categories as $category)
                        <span class="badge badge-sm badge-dim badge-danger"> {{ $category->name }} </span>
                    @endforeach
                </div>
            </div>
        </div>
        @php
            $attachment = $product->attachments->first();
            $attachments = $product->attachments->skip(1);
        @endphp
        <div class="col-sm-12 col-md-6">
            <div id="carouselExConInd" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExConInd" data-slide-to="{{ $attachment->id }}" class="active"></li>
                    @foreach ($attachments as $attachment)
                    <li data-target="#carouselExConInd" data-slide-to="{{ $attachment->id }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset($attachment->path) }}" class="d-block active w-100" alt="Gambar: {{ $attachment->original_filename }}">
                    </div>
                    @foreach ($attachments as $attachment)
                    <div class="carousel-item">
                        <img src="{{ asset($attachment->path) }}" class="d-block w-100" alt="Gambar: {{ $attachment->original_filename }}">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExConInd" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExConInd" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-12 col-md-12">
            <details open>
                <summary>Informasi produk</summary>
                {!! $product->content !!}
            </details>
        </div>

        <div class="col-sm-12 col-md-12 mt-2">
            <div class="d-flex">

                <p class="product__price fw-bold text-dark">
                    Harga
                </p>
                <div class="ml-1">
                    @if ($product->isDiscount)
                    <div class="product__price">
                        <span class="text-primary fw-bold">{{ rupiah($product->price - ( $product->discount * $product->price / 100)) }}</span>

                        <span><del>{{ rupiah($product->price) }}</del></span>
                    </div>
                    @else
                    <p class="product__price">{{ rupiah($product->price) }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-sm-12 col-md-12">
            <details>
                <summary>Informasi pengguna</summary>
                <p>
                    Tidak disertakan.
                </p>
            </details>
        </div>
    </div>
@endsection
