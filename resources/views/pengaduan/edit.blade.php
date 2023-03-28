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
                        Ubah Pengaduan
                    </div>
                    <div class="card-body">
                        <a href="/pengaduan" class="btn btn-primary">Kembali</a>
                        <br/>
                        <br/>


                        <form method="post" action="/pengaduan/update/{{ $pengaduan->id_pengaduan }}">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label>Tanggal Pengaduan</label>
                                <input type="datetime-local" name="tgl_pengaduan" class="form-control" placeholder="Tanggal Pengaduan pengaduan .." value="{{ $pengaduan->tgl_pengaduan }}">

                                @if($errors->has('tgl_pengaduan'))
                                    <div class="text-danger">
                                        {{ $errors->first('tgl_pengaduan')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nik" class="form-control" placeholder="nama pengaduan .." value="{{ $pengaduan->nik }}">

                                @if($errors->has('nik'))
                                    <div class="text-danger">
                                        {{ $errors->first('nik')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Laporan</label>
                                <textarea name="isi_laporan" rows="5" class="form-control" placeholder="isi laporan pengaduan ..">{{ $pengaduan->isi_laporan }}</textarea>

                                    @if($errors->has('isi_laporan'))
                                    <div class="text-danger">
                                        {{ $errors->first('isi_laporan')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control" value="{{ $pengaduan->foto }}">

                                @if($errors->has('foto'))
                                    <div class="text-danger">
                                        {{ $errors->first('foto')}}
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
   
