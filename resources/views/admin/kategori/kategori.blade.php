@extends('admin.main')
@section('isi')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Kategori</h5>
                        <a href="{{ route('tambahkat') }}" class="btn btn-primary">Tambah Data</a>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor Urut</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $nomorUrut = 1; @endphp
                                @foreach ($katData as $kategori)
                                <tr>
                                    <td>{{ $nomorUrut++ }}</td>
                                    <td>{{ $kategori->kategori }}</td>
                                    <td>
                                        <a href="{{ route('editKat', ['id' => $kategori->id]) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('hapusKat', ['id' => $kategori->id]) }}" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection
