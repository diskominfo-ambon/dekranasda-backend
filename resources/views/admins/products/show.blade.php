@extends('layouts.dashboard')

@section('content')
<div class="content-page wide-lg">
    <div class="nk-block-head nk-block-head-lg">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title fw-normal">
                {{ $product->title }} • {{ rupiah($product->price) }}
            </h3>
            <div class="nk-block-des">
                <p class="lead">Ditambahkan pada {{ $product->created_at->isoFormat('LL') }} oleh {{ $product->user->name }}</p>
            </div>
        </div>
    </div><!-- .nk-block -->
    <div class="nk-block">
        <article class="entry">
            <div id="carouselExConInd" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExConInd" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExConInd" data-slide-to="1"></li>
                    <li data-target="#carouselExConInd" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @foreach ($product->attachments as $attachment)
                    <div class="carousel-item active">
                        <img src="{{ asset($attachment->path) }}" class="d-block w-100" alt="carousel">
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
            <div class="mt-4">
                <h4>Informasi produk</h4>
                {!! $product->content !!}
                <h4>Informasi pengguna</h4>
                <p>Tidak diperlihatkan.</p>
            </div>
        </article>
    </div><!-- .nk-block -->
</div>
@endsection
