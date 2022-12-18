@extends('admin.ds')

@push('head')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
@endpush

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

@section('footer-script')
  <script>
    function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("example");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>
@endsection

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
        <a class="nav-link collapsed" href="/verifikasiSetuju">
          <i class="bi bi-menu-button-wide"></i>
          <span>Mahasiswa Terverifikasi</span>
        </a>
      </li><!-- End Register Page Nav -->
      <li class="nav-item">
        <a class="nav-link " href="/verifikasiDitolak">
          <i class="bi bi-menu-button-wide"></i>
          <span>Mahasiswa Ditolak</span>
        </a>
      </li><!-- End Register Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/insertmhs/tambah">
              <i class="bi bi-circle"></i><span>Form Tambah Mahasiswa</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
     
    </ul>
@endsection

@section('main')
  <div class="search-bar m-2">
    <input class="" type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari NRP Mahasiswa">
  </div>

  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="th-sm">NRP
        </th>
        <th class="th-sm">Nama
        </th>
        </th>
        <th class="th-sm">Detail
        </th>
        <th class="th-sm">Verifikasi
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data_mhs as $mhs)
      <tr>
        <td>{{$mhs->nim}}</td>
        <td>{{$mhs->nama}}</td>
        <td>{{$mhs->detail}}</td>
        <td>
          <a href="/verifikasi/{{$mhs->id_mhs}}/cek" class="btn bg-info">verifikasi</a>
        </td>
      </tr>
      @endforeach
    <tfoot>
      <tr>
        <th class="th-sm">NRP
        </th>
        <th class="th-sm">Nama
        </th>
        <th class="th-sm">Detail
        </th>
        <th class="th-sm">Verifikasi
        </th>
      </tr>
    </tfoot>
  </table>
@endsection



