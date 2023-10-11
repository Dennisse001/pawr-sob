@extends('admin.main')
@section('isi')

<style>
    .card-img-top {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }
</style>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>List produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">List produk</li>
            </ol>
            <a href="{{ route('tambahprod') }}" class="btn btn-primary">Tambah produk</a>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            @foreach($proData as $produk)
            <div class="col-lg-3 mb-4">
                <!-- Card with an image on top -->
                <div class="card">
                    <img src="{{ (!empty($produk->cover)) ? asset('storage/produk/' . $produk->cover) : asset('upload/no_image.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produk->produk }}</h5>
                        <a href="{{ route('editprod', ['id' => $produk->id]) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('hapusprod', ['id' => $produk->id]) }}" class="btn btn-danger">Hapus</a>
                    </div>
                </div><!-- End Card with an image on top -->
            </div>
            @endforeach
        </div>
    </section>

</main><!-- End #main -->
@endsection
