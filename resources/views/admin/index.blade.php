@section('menu','petugas')
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
            @if(session('Data terhapus'))
                <div class="alert alert-danger" role="alert">
                {{session('Data terhapus')}}
                </div>
            @endif
            
            @if(session('Data ditambah'))
                <div class="alert alert-success" role="alert">
                {{session('Data ditambah')}}
                </div>
            @endif
                    <!-- <h5 class="fw-bold py-3 mb-4">
                        <span class="text-muted fw-light">Data</span> petugas
                    </h5> -->
                    <!-- <center> -->
                        <h5 class="fw-bold mt-3 mb-4">Data Petugas</h5>
                    <!-- </center> -->
                <div class="card ">
                    <!-- <div class="card-header text-center">
                        Pengaduan Masyarakat
                    </div> -->
                    
                    <div class="card-body">
                        <a href="/petugas/create" class="btn btn-primary"><i class='tf-icons bx bx-user me-2'></i> Tambah Petugas</a>
                        <br/>
                        <br/>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. Telp</th>
                                        <th>level</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($petugas as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nik }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->email }}</td>
                                        <td>{{ $p->telp }}</td>
                                        <td>{{ $p->level }}</td>
                                        <td>
                                            <!-- <a href="/pengaduan/edit/{{ $p->id_pengaduan }}" class="btn btn-warning">Edit</a> -->
                                            <a href="/petugas/show/{{ $p->id }}" data-toggle="tooltip" title="Detail Petugas"  class="btn btn-outline-success"><i class='bx bx-show'></i></i></a>
                                            <a href="/petugas/destroy/{{ $p->id }}" data-toggle="tooltip" title="Hapus"  class="btn btn-outline-danger" onClick="return confirm('Yakin ingin Hapus?')"> <i class='bx bx-trash-alt'></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
  @include('template.script')
  
</body>

</html>
   
