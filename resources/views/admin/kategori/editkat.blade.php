@extends('admin.main')
@section('isi')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form kategori</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item">kategori</li>
          <li class="breadcrumb-item active">Edit kategori</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit kategori</h5>

              <!-- General Form Elements -->


<form method="POST" enctype="multipart/form-data" action="{{ route('updateKat', ['id' => $kategori->id]) }}">
    @csrf

    <div class="row mb-3">
      <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="kategori" id="kategori" value="{{ $kategori->kategori }}">
      </div>
    </div>

 

    <div class="row mb-3">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Update Form</button>
      </div>
    </div>

  </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        <div class="col-lg-6">



            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection








