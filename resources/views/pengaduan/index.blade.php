@section('menu','pengaduan')
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
                    <h5 class="fw-bold py-3 mb-4">
                        <span class="text-muted fw-light"> </span>Pengaduan Masyarakat 
                    </h5>
                <div class="card">
                    <!-- <div class="card-header text-center">
                        Pengaduan Masyarakat
                    </div> -->
                    <div class="card-body">
                    @if (auth()->user()->level == "admin")
                        <a href="/petugas/pengaduan/pdf"  class="btn btn-primary mb-5"><i class='bx bxs-cloud-download'></i> Unduh Laporan</a>
                    @endif
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped table-hover" id="table-data">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pengaduan</th>
                                        <th>Nama Pengadu</th>
                                        <th>Laporan</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pengaduan as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->tgl_pengaduan }}</td>
                                        <td>{{ $p->user->nama ?? '' }}</td>
                                        <td>{{ $p->isi_laporan }}</td>
                                        <td><img src="{{ asset('image/'. $p->foto ) }}" height="50" width="70" alt="pengaduan"/></td>
                                        <!-- <td>{{ $p->status }}</td> -->
                                        <td>
                                            @if ($p->status == '0')
                                                <a href="#" class="badge rounded-pill bg-label-primary">Pending</a>
                                            @elseif ($p->status == 'proses')
                                                <a href="#" class="badge rounded-pill bg-label-warning">Proses</a>
                                            @else
                                                <a href="#" class="badge rounded-pill bg-label-success">Selesai</a>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- <a href="/pengaduan/edit/{{ $p->id_pengaduan }}" class="btn btn-warning">Edit</a> -->
                                            <a href="/pengaduan/show/{{ $p->id_pengaduan }}" class="btn btn-outline-success"><i class='bx bx-show'></i></a>
                                            <a href="/pengaduan/destroy/{{ $p->id_pengaduan }}" class="btn btn-outline-danger" onClick="return confirm('Yakin ingin Hapus?')"><i class='bx bx-trash-alt'></i></a>
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
   
