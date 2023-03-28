<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
    <head>
        @include('template.head')
    </head>

<body>

  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">
    <!-- Menu -->
    @include('template.sidebar')
    <!-- / Menu -->
    <!-- Layout container -->
    <div class="layout-page">
      
    <!-- Navbar -->
        @include('template.navbar')
    <!-- / Navbar -->
      <!-- Content wrapper -->
        <div class="content-wrapper">

            <!-- Content -->
            <div class="container">
                <div class="card mt-5">
                        <div class="card-header">
                            <div class="text-center">Laporan Anda</div>
                        </div>
                            <form method="post" action="/masyarakat/tanggapan/">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="masyarakat_nik" class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10">
                                            <b>:</b> {{ $data_tanggapan->id_pengaduan }}
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="tgl_tanggapan" class="col-sm-2 col-form-label">Tanggal tanggapan</label>
                                        <div class="col-sm-10">
                                            <b>:</b> {{ $data_tanggapan->tgl_tanggapan }}
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="tanggapan" class="col-sm-2 col-form-label">Tanggapan</label>
                                        <div class="col-sm-10">
                                            <b>:</b> {{ $data_tanggapan->tanggapan }}
                                        </div>
                                    </div>
                                    <div class="col-sm-10 offset-sm-2 mb-2 mt-2">
                                        <a href="/tanggapan" class="btn btn-sm btn-success">Kembali</a>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
            <!-- / Content -->
            <!-- Footer -->
                @include('template.footer')
            <!-- / Footer -->
            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    
</div>
  <!-- / Layout wrapper -->

  <div class="buy-now">
    <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank" class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
  </div>
  

  <!-- Core JS -->
  @include('template.script')
  
</body>

</html>

   
