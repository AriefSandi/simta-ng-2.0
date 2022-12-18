@extends('admin.ds')

@section('pagetitle')
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
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
        <a class="nav-link " href="/dashboard">
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
      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/insertmahasiswa">
              <i class="bi bi-circle"></i><span>Form Tambah Mahasiswa</span>
            </a>
          </li>
          <li>
            <a href="/insertdokumen">
              <i class="bi bi-circle"></i><span>Tambah Bebas Lab</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav --> --}}

     
    </ul>
@endsection

@section('main')
    <div class="col-lg-4 col-lg-4">
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">Mahasiswa <span>| Total</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                <div class="ps-3">
                    <h6>1244</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                </div>
                </div>
            </div>
        </div>
    </div><!-- Total Mahasiswa -->
    <div class="col-lg-4 col-lg-4">
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">Mahasiswa <span>| Accepted</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                <div class="ps-3">
                    <h6>1244</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                </div>
                </div>
            </div>
        </div>
    </div><!-- acc Mahasiswa -->
    <div class="col-lg-4 col-lg-4">
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">Mahasiswa <span>| Rejected</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                <div class="ps-3">
                    <h6>1244</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                </div>
                </div>
            </div>
        </div>
    </div><!-- Reject Mahasiswa -->
@endsection
