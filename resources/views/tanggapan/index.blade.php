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
                    <div class="card-header text-center">
                        Tanggapan
                    </div>
                    <div class="card-body">
                        <a href="/tanggapan/create" class="btn btn-primary">Tambah tanggapan</a>
                        <br/>
                        <br/>
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal tanggapan</th>
                                    <th>Tanggapan</th>
                                    <th>OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tanggapan as $p)
                                <tr>
                                    <td>{{ $p->tgl_tanggapan }}</td>
                                    <td>{{ $p->tanggapan }}</td>
                                    <td>
                                        <a href="/tanggapan/edit/{{ $p->id_tanggapan }}" class="btn btn-warning">Edit</a>
                                        <a href="/tanggapan/show/{{ $p->id_tanggapan }}" class="btn btn-success">detail</a>
                                        <a href="/tanggapan/destroy/{{ $p->id_tanggapan }}" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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

   
