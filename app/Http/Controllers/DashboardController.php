<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use App\Tanggapan;
use App\User;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('halamandepan.dashboard',[
            'pengaduan' => Pengaduan::count(),
            'masyarakat' => User::where('level','=', 'MASYARAKAT')->count(),
            'petugas' => User::where('level','=', 'PETUGAS')->count(),
            'admin' => User::where('level','=', 'ADMIN')->count(),
            'tanggapan' => Tanggapan::count(),
            'pending' => Pengaduan::where('status', '0')->count(),
            'proses' => Pengaduan::where('status', 'Proses')->count(),
            'selesai' => Pengaduan::where('status', 'Selesai')->count(),
        ]);
    }

    public function masyarakat(){
        $nik = Auth::user()->nik;
        $jumlah_laporanku = Pengaduan::where('nik', $nik)->count();
        
        return view('halamandepan.dashboarduser', compact('jumlah_laporanku'));
    }
    
    //notif di dashboard user
    public function createNotification($id)
    {
        $pengaduan = Penggaduan::find($id);
        $notification = new Notification;
        $notification->id_pengaduan = $pengaduan->id_pengaduan;
        $notification->message = 'New notification';
        $notification->save();
        return redirect()->back();
    }

    public function laporanku(){
        $pengaduan = Auth()->user()->pengaduan;
       
        return view('masyarakat.show',compact('pengaduan'));
    }

    public function detailLaporan($id)
    {
        // $pengaduan = Auth()->user()->pengaduan;
        $detail_laporan = Pengaduan::with('user')->find($id);

        // $tanggapan = Tanggapan::where('id_pengaduan')->first();

        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query){
            $query->where('id_pengaduan', request()->route('id'));
        })->with('user')->first();

        return view('masyarakat.detailLaporan',compact('data_tanggapan','detail_laporan'));
    }
    
}
