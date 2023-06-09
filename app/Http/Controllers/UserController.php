<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('level','masyarakat')->get();
        return view('user.index', compact('user'));
    }

    public function show($id)
    {
        $province = Province::all();
        $district = District::all();
        $regency = Regency::all();
        $village = Village::all();
        $user = User::where('id', $id)->first();
        return view('user.show', compact('user','province','district','regency','village'));
    }

    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect('/masyarakats')->with('Data terhapus','Data berhasil dihapus!');
    }
}
