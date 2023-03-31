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
            <div class="container-xxl flex-grow-1 container-p-y">
                    <!-- <h5 class="fw-bold py-3 mb-4">
                        <span class="text-muted fw-light"> </span>Detail Pengaduan
                    </h5> -->
                    <center>
                        <h4 class="fw-bold">Detail Pengaduan</h4>
                    </center>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-2">
                            <!-- <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4>{{$pengaduan->status}}</h4>
                                </div>
                            </div> -->
                            <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>  -->
                                {{session('success')}}
                            </div>
                            @endif  
                                <table class="table  table-striped">
                                    <tbody>
                                        @foreach($pengaduan->pengaduan as $item)
                                            <tr>
                                                <th>Nama Pengadu</th>
                                                <td>:</td>
                                                <td>{{ $item->user->nama ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th>NIK</th>
                                                <td>:</td>
                                                <td>{{ $item->user->nik ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Pengaduan</th>
                                                <td>:</td>
                                                <td>{{ $item->tgl_pengaduan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Foto</th>
                                                <td>:</td>
                                                <td><img src="{{ asset('image/'. $pengaduan->foto ) }}" height="10%" width="20%" alt="Foto Pengaduan"></td>
                                            </tr>
                                            <tr>
                                                <th>Isi Laporan</th>
                                                <td>:</td>
                                                <td>{{ $item->isi_laporan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>:</td>
                                                <td>
                                                    @if ($item->status == '0')
                                                        <a href="#" class="badge rounded-pill bg-label-primary">Pending</a>
                                                    @elseif ($pengaduan->status == 'proses')
                                                        <a href="#" class="badge rounded-pill bg-label-warning">Proses</a>
                                                    @else
                                                        <a href="#" class="badge rounded-pill bg-label-success">Selesai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <div class="col-md-5">
                               
                                    <form action="{{ route('pengaduan.statusOnchange', $pengaduan->id_pengaduan)}}" method="post">
                                        @csrf
                                        <select name="status" class="form-select" onchange="javascript:this.form.submit()">
                                            <option value="0" @if($pengaduan->status == 0) selected @endif>Pending</option>
                                            <option value="proses" @if($pengaduan->status == "proses") selected @endif>Proses</option>
                                            <option value="selesai" @if($pengaduan->status == "selesai") selected @endif>Selesai</option>
                                        </select>
                                    </form>
                                 
                                </div>
                                <!-- <div class="col-lg-4 col-md-6"> -->
                                        <!-- <div class="mt-3"> -->
                                            <!-- Button trigger modal -->
                                            <!-- Vertically Centered Modal -->
                                            <p class="demo-inline-spacing">
                                          
                                                @if (empty(@$data_tanggapan->tanggapan))
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                                                    Beri tanggapan
                                                </button>
                                                @else
                                                   <button type="button" class="btn btn-success" disabled><i class='menu-icon tf-icons bx bx-check'></i>Ditanggapi</button>
                                                @endif
                                         
                                                

                                                <a class="btn btn-primary me-1" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Lihat Tanggapan
                                                </a>

                                                <a href="/pengaduan" class="btn btn-outline-secondary" value="Kembali">Kembali</a>

                                            </p>
                                           
                                            <!-- lihat tanggapan -->
                                            <div class="collapse" id="collapseExample">
                                                <div class="d-grid d-sm-flex p-3 border">
                                                    <span>
                                                        <h5>Tanggapan Petugas:</h5>
                                                        <p>
                                                            <p class="text-gray-800 dark:text-gray-400">
                                                    
                                                                @if (empty(@$data_tanggapan->tanggapan))
                                                                <p class="badge rounded-pill bg-label-secondary"> Beri tanggapan</p>
                                                                @else
                                                                    <p class="badge rounded-pill bg-label-warning">{{ @$data_tanggapan->tanggapan}}</p>
                                                                    <br>
                                                                    <br>
                                                                   
                                                                        <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal">
                                                                            Edit
                                                                        </a>
                                                                    
                                                                @endif

                                                                 <!-- <div class="col-lg-4 col-md-6 ms-auto"> -->
                                                                    <!-- <div class="mt-3"> -->
                                                                        <!-- Button trigger modal -->
                                                                        
                                                                        <!-- Modal Edit Tanggapan -->
                                                                        <div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="modalTitle">Edit Tanggapan</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <form method="post" action="/pengaduan/update/{{ $pengaduan->id_pengaduan }}">
                                                                                    {{ csrf_field() }}
                                                                                    {{ method_field('PUT') }}

                                                                                    <div class="modal-body">
                                                                                            <!-- <input type="hidden" name="tgl_tanggapan" value="{{Carbon\Carbon::today()}}"> -->
                                                                                            <!-- <input type="hidden" name="id_pengaduan" value="{{request()->route('id')}}"> -->
                                                                                            <div class="row">
                                                                                                <div class="col">           
                                                                                                    <div class="form-group">
                                                                                                        <label>Tanggapan</label>
                                                                                                        <textarea name="tanggapan" rows="5" class="form-control">{{ @$data_tanggapan->tanggapan }}</textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                                                </div>
                                                                                            </div>
                                                                                    </div>
                                                                                </form>
                                                                        </div>
                                                                    <!-- </div> -->
                                                                    <!-- </div>   -->
                                                                
                                                            </p>
                                                            
                                                        </p>
                                                    </span>
                                                </div>
                                            </div>
                                           
                                            <!-- Modal Tanggapi -->
                                            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalCenterTitle">Masukan Tanggapan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="post" action="/pengaduan/show/{id}">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                                <input type="hidden" name="tgl_tanggapan" value="{{Carbon\Carbon::today()}}">
                                                                <input type="hidden" name="id_pengaduan" value="{{request()->route('id')}}">
                                                                <div class="row">
                                                                    <div class="col">           
                                                                        <div class="form-group">
                                                                            <label>Tanggapan</label>
                                                                            <textarea name="tanggapan" rows="5" class="form-control" placeholder="isi tanggapan .."></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <label class="notif" for="showToastPlacement">&nbsp;</label>
                                                                        <button type="submit"  data-id="{{ $pengaduan->id_pengaduan }}" onclick="createNotification(this)" id="showToastPlacement" class="btn btn-success">Simpan</button>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </form>
                                            </div>
                                        <!-- </div> -->
                                    <!-- </div>  -->
                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-body shadow">
                                <div class="card-header">
                                    <h5>Tanggapan Petugas :</h5>
                                </div>
                                <div class="card-body">
                                    <p>
                                        
                                        <p class="text-gray-800 dark:text-gray-400">
                                
                                            @if (empty(@$data_tanggapan->tanggapan))
                                                Beri tanggapan
                                            @else
                                                {{ @$data_tanggapan->tanggapan}}
                                            @endif
                                        </p>
                                        
                                        <div class="col-lg-4 col-md-6 ">
                                            <div class="mt-3">
                                                <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal">
                                                    Edit
                                                </a>
                                    
                                                <div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalTitle">Edit Tanggapan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="post" action="/pengaduan/update/{{ $pengaduan->id_pengaduan }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PUT') }}

                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col">           
                                                                        <div class="form-group">
                                                                            <label>Tanggapan</label>
                                                                            <textarea name="tanggapan" rows="5" class="form-control">{{ @$data_tanggapan->tanggapan }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>     
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
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
  <script>
    function createNotification(button) {
        var userId = $(button).data('id_pengaduan');
        $.ajax({
            url: '/create-notification/' + userId,
            type: 'GET',
            success: function(response) {
                // Tampilkan notifikasi atau perbarui tampilan tabel
                <div class="bs-toast toast fade show bg-secondary" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class='bx bx-bell me-2'></i>
                    <div class="me-auto fw-semibold">{{ Auth::user()->nama }}</div>
                    <!-- <small>11 mins ago</small> -->
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Laporan Anda telah ditanggapi oleh petugas
                </div>
                </div>
            }
        });
    }
</script>

  
</body>

</html>
    
