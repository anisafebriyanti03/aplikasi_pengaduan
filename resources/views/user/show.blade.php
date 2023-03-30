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
                            <h5 class="text-center">Detail data masyarakat</h5>
                            <hr>
                        </div>
                            <form method="POST" action="/masyarakats/show/{{$user->id}}">
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value=" {{ $user->nik }}" readonly/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Nama Petugas</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value=" {{ $user->nama }}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">E-mail</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value=" {{ $user->email }}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">No. Telp</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value=" {{ $user->telp }}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value=" {{ $user->alamat }}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">RT</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value=" {{ $user->rt }}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">RW</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value=" {{ $user->rw }}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Kode Pos</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value=" {{ $user->kode_pos }}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Provinsi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $user->province->name }}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Kabupaten</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value=" {{ $user->regency->name }}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $user->district->name }}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Desa</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $user->village->name }}" readonly />
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-10 offset-sm-2 mb-2 mt-2">
                                        <!-- <a href="/petugas" class="btn btn-sm btn-success">Kembali</a> -->
                                        <a href="/masyarakats" class="btn btn-outline-secondary" value="Kembali">Kembali</a>
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

  
  

  <!-- Core JS -->
  @include('template.script')
  
</body>

</html>
    
