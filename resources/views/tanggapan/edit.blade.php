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
                        Ubah Tanggapan
                    </div>
                    <div class="card-body">
                        <a href="/tanggapan" class="btn btn-primary">Kembali</a>
                        <br/>
                        <br/>


                        <form method="post" action="/tanggapan/update/{{ $tanggapan->id_tanggapan }}">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="id_pengaduan" class="form-control" placeholder="nama tanggapan .." value="{{ $tanggapan->id_pengaduan }}">

                                @if($errors->has('id_pengaduan'))
                                    <div class="text-danger">
                                        {{ $errors->first('id_pengaduan')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Tanggal tanggapan</label>
                                <input type="datetime-local" name="tgl_tanggapan" class="form-control" placeholder="Tanggal tanggapan tanggapan .." value="{{ $tanggapan->tgl_tanggapan }}">

                                @if($errors->has('tgl_tanggapan'))
                                    <div class="text-danger">
                                        {{ $errors->first('tgl_tanggapan')}}
                                    </div>
                                @endif
                            </div>


                            <div class="form-group">
                                <label>Tanggapan</label>
                                <textarea name="tanggapan" class="form-control" placeholder="isi laporan tanggapan ..">{{ $tanggapan->tanggapan }}</textarea>

                                    @if($errors->has('tanggapan'))
                                    <div class="text-danger">
                                        {{ $errors->first('tanggapan')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Simpan">
                            </div>
                        </form>
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

    
