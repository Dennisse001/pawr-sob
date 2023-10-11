@extends('admin.main')
@section('isi')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="Produk">Produk</a></li>
                <li class="breadcrumb-item">Tambah Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">




            </div>
        </div>

        </div>

        <div class="col-lg-12 ms-auto me-auto">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Produk</h5>
                    <!-- Vertical Form -->
                    <form action="{{ route('addprod') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                        @csrf

                        <div class="col-12">
                            <label for="produk" class="form-label fw-bold">Nama Produk</label>
                            <input type="text" class="form-control @error('produk') is-invalid @enderror" name="produk" id="produk" placeholder="Masukkan Nama Produk">
                            @error('produk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="cover" class="form-label fw-bold">Cover</label>
                            <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover" id="cover">
                            @error('cover')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mt-2">
                                <img id="coverPreview" style="width: 200px; height: auto; object-fit: cover;" src="{{ asset('path_to_default_image.jpg') }}" alt="Cover Preview">
                            </div>
                        </div>



                        <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori_id">
                            <option value="">Pilih Kategori</option>
                            @foreach($kategoriData as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror


                        <div class="col-6">
                            <label for="harga" class="form-label fw-bold">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" pattern="[0-9]+" placeholder="Masukkan harga" required>
                            </div>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                            <div id="editor"></div>
                            <input type="hidden" name="deskripsi" id="deskripsi">
                        </div>

                        <div class="col-12">

                        </div>    <div class="col-12">

                        </div>    <div class="col-12">

                        </div>    <div class="col-12">

                        </div>







                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>

                    </form>
                    <a href="Produk"> <button type="submit" class="btn btn-danger">Kembali</button></a>

                </div>
            </div>

        </div>
        </div>
    </section>


</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var coverInput = document.getElementById('cover');
        var coverPreview = document.getElementById('coverPreview');

        coverInput.addEventListener('change', function(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function() {
                coverPreview.src = reader.result;
            }

            reader.readAsDataURL(file);
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
    var editor = new Quill('#editor', {
        theme: 'snow'
    });

    var deskripsiInput = document.getElementById('deskripsi');

    editor.on('text-change', function() {
        deskripsiInput.value = editor.root.innerHTML;
    });
});

</script>

@endsection
