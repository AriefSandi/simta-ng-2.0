@extends('admin.ds')

@section('profile')
  <li class="nav-item dropdown pe-3">
    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
      <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
    </a><!-- End Profile Iamge Icon -->

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
      <li class="dropdown-header">
        <h6>{{ Auth::user()->name }}</h6>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li>
        <x-dropdown-link :href="route('profile.edit')">
          {{ __('Profile') }}
        </x-dropdown-link>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
            this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-dropdown-link>
        </form>
      </li>

    </ul><!-- End Profile Dropdown Items -->
  </li><!-- End Profile Nav -->
@endsection

@section('pagetitle')
    <div class="pagetitle">
      <h1>Verifikasi Bebas Lab</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Verifikasi Bebas Lab</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
@endsection

@section('sidebar')
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/verifikasi">
          <i class="bi bi-menu-button-wide"></i>
          <span>Verifikasi Bebas Lab</span>
        </a>
      </li><!-- End Register Page Nav -->
      <li class="nav-item">
        <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapsed " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/insertmhs/tambah" class="active">
              <i class="bi bi-circle"></i><span>Form Tambah Mahasiswa</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
     
    </ul>
@endsection

@section('main')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail Mahasiswa</h5>
                <form method="post" action="update" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="inputNIM" class="col-sm-2 col-form-label">NIM</label>
                  <div class="col-sm-10">
                    <input type="text" name="nim" class="form-control" value="{{$data_mhs->nim}}" disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" value="{{$data_mhs->nama}}" disabled >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">File</label>
                  <div class="col-sm-10">
                    <p class="m-2">
                        <a href="../../images/{{$data_mhs->file}}" download>
                        {{$data_mhs->file}}
                        </a>
                    </p>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select name="status">
                        <Option selected>{{$data_mhs->status}}</Option>
                        <option value="tervalidasi">terverifikasi</option>
                        <option value="ditolak">ditolak</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Detail</label>
                  <div class="col-sm-10">
                    <textarea type="" name="detail" class="form-control" required>-
                    </textarea>
                  </div>
                </div>
                <div class="text-center">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Sumbit</button>
                  </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection