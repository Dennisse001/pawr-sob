@extends('admin.main')
@section('isi')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Role User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="dokter">List User</a></li>
                <li class="breadcrumb-item">Edit Role User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

            </div>
        </div>

        <div class="col-lg-12 ms-auto me-auto">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Role User</h5>
                    <!-- Vertical Form -->
                    <form action="{{ route('updateuser', $userr->id) }}" method="POST" enctype="multipart/form-data"
                        class="row g-3">
                        @csrf

                        <div class="col-12 text-center">
                            <img style="width: 200px; height: 150px; object-fit: cover; object-position: center; border-radius: 10%;"
                                 src="{{ (!empty($userr->foto)) ? asset('storage/userimg/' . $userr->foto) : asset('upload/no_image.png') }}"
                                 alt="Profile">
                        </div>


                        <div class="col-6">
                            <label for="nama_lengkap" class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                value="{{ $userr->nama_lengkap }}" readonly>
                        </div>

                        <div class="col-6">
                            <label for="username" class="form-label fw-bold">Username</label>
                            <input type="text" class="form-control" name="username" id="username"
                                value="{{ $userr->username }}" readonly>
                        </div>

                        <div class="col-6">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ $userr->email }}"
                                readonly>
                        </div>

                        <div class="col-6">
                            <label for="alamat" class="form-label fw-bold">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat"
                                value="{{ $userr->alamat }}" readonly>
                        </div>
                        <div class="col-12">
                            <label for="role" class="form-label fw-bold">Role</label>
                            <select class="form-select @error('role') is-invalid @enderror" name="role" id="role">
                                <option value="user" {{ $userr->role == 'user' ? 'selected' : '' }}>User</option>\
                                <option value="admin" {{ $userr->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>

                    </form>
                    <a href="dokter"> <button type="button" class="btn btn-danger">Kembali</button></a>

                </div>
            </div>

        </div>
    </section>

</main>
@endsection
