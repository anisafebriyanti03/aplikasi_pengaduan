<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use App\Pengaduan;
use App\Tanggapan;
use App\User;
use PDF;

class PetugasController extends Controller
{
    public function index(Request $request)
    {
        if($request) {
            if($request->cari != ''){
                $petugas = User::whereColumn([
                    ['level', "<>","admin"],
                    ['level', "<>","masyarakat"]
                ])
                ->orWhere('level', "<>","admin")
                ->Where('level', "<>","masyarakat")
                ->get();
            }else{
                $petugas = User::Where('level', "<>","masyarakat")
                ->get();
            }
            
        }else{
            $petugas = User::all();
        }
        return view('admin.index', compact('petugas'));
    }

    public function create()
    {
        $provinces = Province::all();
        return view('admin.create', compact('provinces'));
    }

    public function getkbptn(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kabupatens = Regency::where('province_id', $id_provinsi)->get();

        $option = "<option>Pilih Kabupaten</option>";

        foreach ($kabupatens as $kabupaten){
            $option .= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }

        echo $option;
    }

    public function getkcmtn(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        $option = "<option>Pilih Kecamatan</option>";

        foreach ($kecamatans as $kecamatan){
            $option .= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
        echo $option;
    }

    public function getds(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        $desas = Village::where('district_id', $id_kecamatan)->get();

        $option = "<option>Pilih Desa</option>";

        foreach ($desas as $desa){
            $option .= "<option value='$desa->id'>$desa->name</option>";
        }
        echo $option;
    }

    public function store(Request $request)
    {
        // $message = [
        //     'required'   => 'Data tidak boleh kosong!',
        //     'alpha-num'  => 'Kata sandi hanya boleh berisi huruf dan angka',
        //     'min'        => 'Kata sandi harus minimal 6 karakter',
        //     'numeric'    => 'Harus berupa nomor',
        //     'unique'     => 'Data sudah terdata',
        // ];

        // $this->validate($request,[
        //     'nik'           => 'required|string|unique:users,nik',
        //     'nama'          => 'required',
        //     'email'         => 'required|string|unique:users,email',
        //     'password'      => 'required|alpha-num|min:6',
        //     'telp'          => 'required|numeric',
        //     'jenis_kel'     => 'required',
        //     'alamat'        => 'required',
        //     'rt'            => 'required|numeric',
        //     'rw'            => 'required|numeric',
        //     'kode_pos'      => 'required|numeric',
        //     'province_id'   => 'required',
        //     'regency_id'    => 'required',
        //     'district_id'   => 'required',
        //     'village_id'    => 'required'
        // ],$message);

        // User::create([
        //     'nik' => $request->nik,
        //     'nama' => $request->nama,
        //     'email' => $request->email,
        //     'password' => $request->password,
        //     'telp' => $request->telp,
        //     'jenis_kel' => $request->jenis_kel,
        //     'alamat' => $request->alamat,
        //     'level' => 'petugas',
        //     'rt' => $request->rt,
        //     'rw' => $request->rw,
        //     'kode_pos' => $request->kode_pos,
        //     'province_id' => $request->province_id,
        //     'regency_id' => $request->regency_id,
        //     'district_id' => $request->district_id,
        //     'village_id' => $request->village_id,
        // ]);

        $data_user = new User();
        $data_user->nik = request()->get('nik');
        $data_user->nama = request()->get('nama');
        $data_user->email = request()->get('email');
        $data_user->password = bcrypt(request()->get('password'));
        $data_user->telp = request()->get('telp');
        $data_user->jenkel = request()->get('jenkel');
        $data_user->alamat = request()->get('alamat');
        $data_user->level = 'petugas';
        $data_user->rt = request()->get('rt');
        $data_user->rw = request()->get('rw');
        $data_user->kode_pos = request()->get('kode_pos');
        $data_user->province_id = request()->get('province_id');
        $data_user->regency_id = request()->get('regency_id');
        $data_user->district_id = request()->get('district_id');
        $data_user->village_id = request()->get('village_id');
        $data_user->save();
        return redirect()->to('/petugas')->with('Data ditambah','Data berhasil ditambah');
    }


    public function show($id)
    {
        $province = Province::all();
        $district = District::all();
        $regency = Regency::all();
        $village = Village::all();
        $petugas = User::where('id', $id)->first();
        return view('admin.show', compact('petugas','province','district','regency','village'));
    }

    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect('/petugas')->with('Data terhapus','Data berhasil dihapus!');
    }

    //cetak laporan
    public function pdf(){
        $pengaduan = Pengaduan::with('user')->get();
        $pdf = PDF::loadView('admin.cetak',compact('pengaduan'))->setPaper('a4','landscape');
        return $pdf->stream();
    }

    public function formcetak()
    {
        $form_cetak_pengaduan = Pengaduan::all();
        return view('admin.form_cetak',compact('form_cetak_pengaduan'));
    }

    public function cetakpertanggal($tglawal, $tglakhir)
    {
        $cetakpertanggal = Pengaduan::with('pengaduan')->whereBetween('tgl_pengaduan', [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('admin.cetakpertanggal', compact('cetakpertanggal'))->setPaper('a4','potrait');
        return $pdf->stream();
    }

    public function edittanggapan($id)
    {
        $user = User::all();
        $tanggapan = Tanggapan::where('id_tanggapan',$id)->first();
        return view('pengaduan.show', compact('tanggapan', 'user'));
    }

    // public function updatetanggapan(Request $request, $id)
    // {
    //     $this->validate($request,[
    //         'isi_laporan' => 'required',
    // 	]);

    //     Tanggapan::where('id_tanggapan', $id)->update([
    // 		'tgl_tanggapan' => $request->tgl_tanggapan,
    //         'id_pengaduan' => $request->id_pengaduan,
    // 		'id' => Auth::user()->id,
    //         'isi_laporan' => $request->isi_laporan,
    // 	]);
    //     return redirect('/petugas/tanggapan');
    // }
}
