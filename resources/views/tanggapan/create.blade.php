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
                <div class="row justify-content-center my-5">
                    <div class="col-lg-12 col-md-12 col-xl-6">
                        <div class="card shadow">
                            <div class="card-header text-center">
                                Masukkan Tanggapan
                            </div>
                            <div class="card-body">
                                @if($messege = Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ $messege }}
                                    </div>
                                @endif

                                <form method="post" action="/tanggapan/store">

                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="id_pengaduan" class="form-control" placeholder="Nama Pengadu ..">
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Tanggapan</label>
                                        <input type="datetime-local" name="tgl_tanggapan" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggapan</label>
                                        <textarea name="tanggapan" rows="5" class="form-control" placeholder="isi tanggapan .."></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="Simpan">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

   
