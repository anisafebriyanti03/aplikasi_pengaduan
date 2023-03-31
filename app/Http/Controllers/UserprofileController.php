<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use App\User;
use Auth;

class UserprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $province = Province::all();
        $district = District::all();
        $regency = Regency::all();
        $village = Village::all();
        return view('masyarakat.form', compact('user','province','district','regency','village'));
    }

    public function edit_profileuser(){

        // $provinces = Province::all();
        $user = Auth::user();
        return view('masyarakat.edit-form', compact('user'));
    }

    public function update_profileuser(Request $request)
    {

        $user = Auth::user();

        $validatedData = $request->validate([
            'nama'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'telp'          => 'required|numeric',
            // 'jenkel'        => 'required',
            'alamat'        => 'required',
            'rt'            => 'required|numeric',
            'rw'            => 'required|numeric',
            'kode_pos'      => 'required|numeric',
            // 'province_id'   =>  'required',
            // 'regency_id'    =>  'required',
            // 'district_id'   =>  'required',
            // 'village_id'    =>  'required'
            // 'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->nama         = $validatedData['nama'];
        $user->email        = $validatedData['email'];
        $user->telp         = $validatedData['telp'];
        // $user->jenkel = $validatedData['jenkel'];
        $user->alamat       = $validatedData['alamat'];
        $user->rt           = $validatedData['rt'];
        $user->rw           = $validatedData['rw'];
        $user->kode_pos     = $validatedData['kode_pos'];
        // $user->province_id  = $validatedData['province_id'];
        // $user->regency_id   = $validatedData['regency_id'];
        // $user->district_id  = $validatedData['district_id'];
        // $user->village_id   = $validatedData['village_id'];
        // if (!empty($validatedData['password'])) {
        //     $user->password = bcrypt($validatedData['password']);
        // }
        $user->save();

        return redirect()->route('user')->with('success', 'Profile updated successfully.');

    }

    public function getKota(Request $request)
    {
        $province_id = $request->province_id;
        $regencies = Regency::where('province_id', $province_id)->get();

        $option = "<option>Pilih Kota...</option>";
        foreach ($regencies as $kota) {
            $option .= "<option value='$kota->id'>$kota->name</option>";
        }

        echo $option;
    }

    public function getKecamatan(Request $request)
    {
        $regency_id = $request->regency_id;
        $districts = District::where('regency_id', $regency_id)->get();

        $option = "<option>Pilih Kecamatan...</option>";
        foreach ($districts as $kecamatan) {
            $option .= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }

        echo $option;
    }

    public function getKelurahan(Request $request)
    {
        $village_id = $request->village_id;
        $villages = Village::where('district_id', $village_id)->get();

        $option = "<option>Pilih Kelurahan...</option>";
        foreach ($villages as $kelurahan) {
            $option .= "<option value='$kelurahan->id'>$kelurahan->name</option>";
        }

        echo $option;
    }

    public function petugas()
    {
        $user = Auth::user();
        $province = Province::all();
        $district = District::all();
        $regency = Regency::all();
        $village = Village::all();
        return view('admin.profile', compact('user','province','district','regency','village'));
    }

    public function edit_profilepetugas()
    {
        $user = Auth::user();
        return view('admin.edit-profile', compact('user'));
    }

    public function update_profilepetugas(Request $request)
    {
        $user = Auth::user();
 
        $validatedData = $request->validate([
            'nama'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'telp'          => 'required|numeric',
            // 'jenkel'        => 'required',
            'alamat'        => 'required',
            'rt'            => 'required|numeric',
            'rw'            => 'required|numeric',
            'kode_pos'      => 'required|numeric',
            // 'province_id'   =>  'required',
            // 'regency_id'    =>  'required',
            // 'district_id'   =>  'required',
            // 'village_id'    =>  'required'
            // 'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->nama         = $validatedData['nama'];
        $user->email        = $validatedData['email'];
        $user->telp         = $validatedData['telp'];
        // $user->jenkel = $validatedData['jenkel'];
        $user->alamat       = $validatedData['alamat'];
        $user->rt           = $validatedData['rt'];
        $user->rw           = $validatedData['rw'];
        $user->kode_pos     = $validatedData['kode_pos'];
        // $user->province_id  = $validatedData['province_id'];
        // $user->regency_id   = $validatedData['regency_id'];
        // $user->district_id  = $validatedData['district_id'];
        // $user->village_id   = $validatedData['village_id'];
        // if (!empty($validatedData['password'])) {
        //     $user->password = bcrypt($validatedData['password']);
        // }
        $user->save();

        return redirect()->route('petugas.profile')->with('success', 'Profile updated successfully.');

    }

    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
