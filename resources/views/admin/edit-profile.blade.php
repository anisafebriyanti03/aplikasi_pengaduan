@section('menu','petugas')
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

    <head>
         @include('template.head')
    </head>

<body>

  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar ">
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
        
        <div class="container-xxl flex-grow-1 container-p-y">
                        
                        
            <h5 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Account Settings /</span> Account
            </h5>

            <div class="row">
            <div class="col-md-12">
                <!-- <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a></li>
                <li class="nav-item"><a class="nav-link" href="pages-account-settings-notifications.html"><i class="bx bx-bell me-1"></i> Notifications</a></li>
                <li class="nav-item"><a class="nav-link" href="pages-account-settings-connections.html"><i class="bx bx-link-alt me-1"></i> Connections</a></li>
                </ul> -->
                <div class="card mb-4">
                  <center>
                  <h5 class="card-header">Profile Details</h5>
                  </center>
               
                <!-- Account -->
                <!-- <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Upload new photo</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                        </button>

                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                    </div>
                </div> -->
                <hr class="my-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('petugas.update') }}" >
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nama</label>
                                <input class="form-control" type="text"  name="nama" id="nama" value="{{ old('nama', Auth::user()->nama ) }}" /> 
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">E-mail</label>
                                <input class="form-control" type="text"  name="email" id="email" value="{{ old('email', Auth::user()->email ) }}"/>
                            </div>
                            <!-- <div class="mb-3 col-md-6">
                            <label class="form-label">Password</label>
                            <input class="form-control" type="password"  name="password" value="{{ $user->password ?? ''}}" readonly/>
                            </div> -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label">No.Telp</label>
                                <input type="number" class="form-control"  name="telp" id="telp" value="{{ old('telp', Auth::user()->telp ) }}" />
                            </div>
                            <!-- <div class="mb-3 col-md-6">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control"  name="organization" value="{{ $user->jenkel ?? ''}}" readonly />
                            </div> -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label">RT</label>
                                <input type="text" class="form-control"  name="rt" id="rt" value="{{ old('rt', Auth::user()->rt ) }}"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">RW</label>
                                <input type="text" class="form-control" name="rw" id="rw" value="{{ old('rw', Auth::user()->rw ) }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Kode pos</label>
                                <input type="text" class="form-control" name="kode_pos" id="kode_pos" value="{{ old('kode_pos', Auth::user()->kode_pos ) }}" />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" value="{{ old('alamat', Auth::user()->alamat ) }}" />
                            </div>
                            <!-- <div class="mb-3 col-md-6">
                                <label class="form-label" for="province_id">Provinsi</label>
                                <select name="province_id" id="province_id" class="selectpicker form-control" data-style="py-0">
                                    <option value="">Pilih Provinsi...</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label" for="regency_id">Kabupaten</label>
                            <select name="regency_id" id="regency_id" class="selectpicker form-control" data-style="py-0">
                            </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="district_id">Kecamatan</label>
                                <select name="district_id" id="district_id" class="selectpicker form-control" data-style="py-0">
                                </select>       
                            </div>  
                            <div class="mb-3 col-md-6">
                            <label class="form-label" for="village_id">Desa</label>
                            <select name="village_id" id="village_id" class="selectpicker form-control" data-style="py-0">
                            </select>
                            </div>                       -->
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <a href="/petugas-profile" class="btn btn-outline-secondary" value="Kembali">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
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

  

  
 
  

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  @include('template.script')
 
</body>

</html>
