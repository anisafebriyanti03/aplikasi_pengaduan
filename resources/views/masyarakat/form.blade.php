
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

    <head>
         @include('template.head')
    </head>

<body>

  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  layout-without-menu ">
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
                    <a href="/masyarakat"  data-toggle="tooltip" title="Back"  class="btn rounded-pill btn-icon btn-outline-primary">
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
      <div class="content-wrapper">

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
                        
            <center>
                <h5 class="justify-content-center py-3 mb-4">
                <span class="text-muted fw-light"></span> Account
                </h5>
            </center>  
           

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <!-- <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages-account-settings-notifications.html"><i class="bx bx-bell me-1"></i> Notifications</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages-account-settings-connections.html"><i class="bx bx-link-alt me-1"></i> Connections</a></li>
                    </ul> -->
                    <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
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
                        <form id="" method="POST" action="/user" >
                        <div class="row">
                            <div class="mb-3 col-md-6">
                            <label class="form-label">NIK</label>
                            <input class="form-control" type="text" value="{{ $user->nik ?? ''}}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">Nama</label>
                            <input class="form-control" type="text" value="{{ $user->nama ?? ''}}" readonly /> 
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">E-mail</label>
                            <input class="form-control" type="text"  name="email" value="{{ $user->email ?? ''}}" readonly/>
                            </div>
                            <!-- <div class="mb-3 col-md-6">
                            <label class="form-label">Password</label>
                            <input class="form-control" type="password"  name="password" value="{{ $user->password ?? ''}}" readonly/>
                            </div> -->
                            <div class="mb-3 col-md-6">
                            <label class="form-label">No.Telp</label>
                            <input type="text" class="form-control" name="organization" value="{{ $user->telp ?? ''}}" readonly />
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control"  name="organization" value="{{ $user->jenkel ?? ''}}" readonly />
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control"  name="organization" value="{{ $user->alamat ?? ''}}" readonly />
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">RT</label>
                            <input type="text" class="form-control"  name="organization" value="{{ $user->rt ?? ''}}"   readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">RW</label>
                            <input type="text" class="form-control"  name="organization" value="{{ $user->rw ?? ''}}" readonly />
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">Kode pos</label>
                            <input type="text" class="form-control"  name="organization" value="{{ $user->kode_pos ?? ''}}" readonly />
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">Provinsi</label>
                            <input type="text" class="form-control"  name="organization" value="{{ $user->province->name  ?? ''}}" readonly />
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">Kabupaten</label>
                            <input type="text" class="form-control"  name="organization" value=" {{ $user->regency->name  ?? ''}}" readonly />
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">Kecamatan</label>
                            <input type="text" class="form-control"  name="organization" value=" {{ $user->district->name  ?? ''}}" readonly />
                            </div>                        
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Desa</label>
                            <input type="text" class="form-control"  name="organization" value="  {{ $user->village->name  ?? ''}}" readonly />
                            </div>
                        <div class="mt-2">
                            <!-- <button type="submit" class="btn btn-primary me-2">Save changes</button> -->
                            <a href="/user/edit" class="btn btn-primary me-2">Update</a>
                            <!-- <button type="reset" class="btn btn-outline-secondary">Cancel</button> -->
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
