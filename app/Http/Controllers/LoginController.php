<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\User;
use Auth;
use Illuminate\Auth\Events\Registered;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }

    public function login()
    {
        return view('login.login');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/dashboard');
        }
        return redirect('login')->with('error','Email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/'); 
    }

    public function register()
    {
        $provinces = Province::all();
        return view('login.register', compact('provinces'));
    }

    public function getkabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kabupatens = Regency::where('province_id', $id_provinsi)->get();

        $option = "<option>Pilih Kabupaten</option>";

        foreach ($kabupatens as $kabupaten){
            $option .= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }

        echo $option;
    }

    public function getkecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        $option = "<option>Pilih Kecamatan</option>";

        foreach ($kecamatans as $kecamatan){
            $option .= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
        echo $option;
    }

    public function getdesa(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        $desas = Village::where('district_id', $id_kecamatan)->get();

        $option = "<option>Pilih Desa</option>";

        foreach ($desas as $desa){
            $option .= "<option value='$desa->id'>$desa->name</option>";
        }
        echo $option;
    }

    public function simpanregister(Request $request)
    {
        $message = [
            'required'   => 'Data tidak boleh kosong!',
            'alpha-num'  => 'Kata sandi hanya boleh berisi huruf dan angka',
            'min'        => 'Kata sandi harus minimal 6 karakter',
            'numeric'    => 'Harus berupa nomor',
            'unique'     => 'Data sudah terdata',
        ];

        $this->validate($request,[
            'nik'           => 'required|string|unique:users,nik',
            'nama'          => 'required',
            'email'         => 'required|string|unique:users,email',
            'password'      => 'required|alpha-num|min:6',
            'telp'          => 'required|numeric',
            'jenkel'        => 'required',
            'alamat'        => 'required',
            'rt'            => 'required|numeric',
            'rw'            => 'required|numeric',
            'kode_pos'      => 'required|numeric',
            'province_id'   =>  'required',
            'regency_id'    =>  'required',
            'district_id'   =>  'required',
            'village_id'    =>  'required'
        ], $message);

        $data_user = new User();
        $data_user->nik = request()->get('nik');
        $data_user->nama = request()->get('nama');
        $data_user->email = request()->get('email');
        $data_user->password = bcrypt(request()->get('password'));
        $data_user->telp = request()->get('telp');
        $data_user->jenkel = request()->get('jenkel');
        $data_user->alamat = request()->get('alamat');
        $data_user->rt = request()->get('rt');
        $data_user->rw = request()->get('rw');
        $data_user->kode_pos = request()->get('kode_pos');
        $data_user->province_id = request()->get('province_id');
        $data_user->regency_id = request()->get('regency_id');
        $data_user->district_id = request()->get('district_id');
        $data_user->village_id = request()->get('village_id');
        $data_user->save();

        event(new Registered($data_user));

        Auth::login($data_user);

        // $user = User::create($request->except(['_token']));

        // event(new Registered($user));

        // auth()->login($user);

        // return redirect()->route('verification.notice')->with('success', 'Akun berhasil dibuat, silahkan verifikasi Email Anda');
        
        return redirect()->to('/login')->with('success','Email sudah diverifikasi silahkan cek email!');
    }
}
