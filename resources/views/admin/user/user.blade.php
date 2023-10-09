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
                        <h5 class="card-title">Data User</h5>
                        {{-- <a href="{{ route('tambahspel') }}" class="btn btn-primary">Tambah Data</a> --}}

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role </th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $nomorUrut = 1; @endphp
                                @foreach ($userData as $userr)
                                <tr>
                                    <td>{{ $nomorUrut++ }}</td>
                                    <td>{{ $userr->nama_lengkap }}</td>
                                    <td>{{ $userr->email }}</td>
                                    <td>{{ $userr->role }}</td>
                                    <td>
                                        <a href="{{ route('edituser', ['id' => $userr->id]) }}" class="btn btn-warning">Edit Role</a>

                                        <a href="{{ route('hapususer', ['id' => $userr->id]) }}" class="btn btn-danger">Hapus User</a>
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
