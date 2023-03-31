<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
    <head>
        @include('template.head')
    </head>

<body>

  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  layout-without-menu">
  <div class="layout-container">
    <!-- Menu -->
    
    <!-- / Menu -->
    <!-- Layout container -->
    <div class="layout-page">
      
    <!-- Navbar -->
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
                </a>
            </div>
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <a href="/laporanku" data-toggle="tooltip" title="Back"  class="btn rounded-pill btn-icon btn-outline-primary">
                            <i class='tf-icons  bx bx-left-arrow-alt'></i>
                    </a>
                <!-- Search -->
                    <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Layanan Masyarakat</span> -->
                    <h4 class="ms-auto">Layanan Masyarakat Online</h4>
                <!-- /Search -->
                <ul class="navbar-nav flex-row align-items-center ms-auto">          
                <!-- Place this tag where you want the button to render. -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="../assets/img/avatars/8.jpeg" alt class="w-px-40 h-auto rounded-circle">
                    </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="/masyarakat">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="../assets/img/avatars/8.jpeg" alt class="w-px-40 h-auto rounded-circle">
                                </div>
                                </div>
                                <div class="flex-grow-1">
                                <span class="fw-semibold d-block">{{ Auth::user()->nama }}</span>
                                <small class="text-muted">{{ Auth::user()->level }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/user">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/laporanku">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Laporanku</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                    </ul>
                </li>
                <!--/ User -->
                </ul>
            </div> 
        </nav>
    <!-- / Navbar -->
      <!-- Content wrapper -->
      <div class="container">
          <div class="row">
            <div class="card-header mt-3">
                <h4 class="text-center">Detail Laporan</h4>
                <!-- <a href="/masyarakat" class="btn btn-primary">Kembali</a> -->
            </div>
            <div class="col-md-9 col-xl-12">
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th> Tanggal Pengaduan</th>
                                    <td>:</td>
                                    <td>{{$detail_laporan->tgl_pengaduan}}</td>
                                </tr> 
                                <tr>
                                    <th> Laporan</th>
                                    <td>:</td>
                                    <td>{{$detail_laporan->isi_laporan}}</td>
                                </tr> 
                                <tr>
                                    <th> Foto</th>
                                    <td>:</td>
                                    <td><img src="{{ asset('image/'. $detail_laporan->foto ) }}" height="10%" width="20%" alt=""></td>
                                </tr> 
                                <tr>
                                    <th> Status</th>
                                    <td>:</td>
                                    <td>
                                        @if ($detail_laporan->status == '0')
                                            <a href="#" class="badge rounded-pill bg-label-primary">Pending</a>
                                        @elseif ($detail_laporan->status == 'proses')
                                            <a href="#" class="badge rounded-pill bg-label-warning">Proses</a>
                                        @else
                                            <a href="#" class="badge rounded-pill bg-label-success">Selesai</a>
                                        @endif
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
           
            <div class="col-md-9 col-xl-12">
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <!-- <div class="card shadow"> -->
                            <div class="card-header">
                                <h5>Tanggapan Petugas :</h5>
                            </div>
                            <div class="card-body">
                                <!-- <p>{{ @$data_tanggapan->tanggapan }}</p> -->
                                <p class="text-gray-800 dark:text-gray-400">
                                    
                                    @if (empty(@$data_tanggapan->tanggapan))
                                        <p class="badge rounded-pill bg-label-secondary">   Belum ada tanggapan</p>
                                    @else
                                    <p class="badge rounded-pill bg-label-warning">{{ @$data_tanggapan->tanggapan}}</p>
                                    @endif
                                </p>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
          
            
          </div>           
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    
</div>
  <!-- / Layout wrapper -->
  

  <!-- Core JS -->
  @include('template.script')
  
</body>

</html>
