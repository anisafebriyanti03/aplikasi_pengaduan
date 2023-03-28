<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    table.static{
        position: relative;
        border: 1px solid #543535;
    }
  </style>
</head>
<body>
    <!-- <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt; 
        }
    </style> -->
        <center>        
            <h3>Laporan Pengaduan Masyarakat</h3>
            <h4> Oleh: {{ Auth::user()->nama }}</h4>
        </center>
        <br>
    
        <br>
        <table class="static" cellspacing=0 cellpadding=15 align="center" rules="all" style="width: 95%;" enctype="multipart/form-data">
            <thead>
                <tr>
                    <th>Tanggal Pengaduan</th>
                    <th>Nama Pengadu</th>
                    <th>NIK</th>
                    <th>Laporan</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <!-- <th>Tanggapan</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($pengaduan as $p)
                <tr>
                    <td>{{ $p->tgl_pengaduan }}</td>
                    <td>{{ $p->user->nama ?? '' }}</td>
                    <td>{{ $p->user->nik ?? '' }}</td>
                    <td>{{ \Str::limit($p->isi_laporan,30) }}</td>
                    <td><img src="{{ public_path('image/'. $p->foto ) }}" height="10%" width="20%" alt="pengaduan"/></td>
                    <td>
                        @if ($p->status == '0')
                            <a href="#" class="badge bg-label-primary">Pending</a>
                        @elseif ($p->status == 'proses')
                            <a href="#" class="badge bg-label-warning">Proses</a>
                        @else
                            <a href="#" class="badge bg-label-success">Selesai</a>
                        @endif
                    </td>
                   <!-- <td>tanggapan</td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    
</body>
</html>