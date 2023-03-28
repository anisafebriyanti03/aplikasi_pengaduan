<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use App\Tanggapan;
use App\User;
use Carbon\Carbon;
use Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $pengaduan = Pengaduan::all();
        return view('pengaduan.index', compact('pengaduan','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tgl        = Carbon::now()->format('Y-m-d H:i:s');
        return view('pengaduan.create');
    //     $pengaduan = Pengaduan::create(request()->all());
    //     return redirect()->to('/pengaduan');
    //     return view('pengaduan.create',compact('pengaduan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd(Auth::user()->nik);
        $this->validate($request,[
    		// 'tgl_pengaduan' => Carbon::now()->format('Y-m-d H:i:s'),
            'isi_laporan' => 'required',
            'foto' => 'required',
            // 'status' => 'required'
    	]);
        $nik = Auth::user()->nik;
       
        $imgName = $request->foto->getClientOriginalName() . '-' . time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('image'), $imgName);
        
        Pengaduan::create([
    		// 'tgl_pengaduan' => Carbon::now()->format('Y-m-d'),
            'tgl_pengaduan' => date ('Y-m-d'),
    		'nik' => $nik,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $imgName,
            // 'status' => $request->status
            'status' => '0'
    	]);

        // Pengaduan::create($request->all());
 
    	return redirect('/masyarakat')->with('success','Data berhasil diinput!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $tgl        = Carbon::now()->format('Y-m-d H:i:s');
        // $user = User::all();
        // $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
        // return view('pengaduan.show', compact('pengaduan','user'));
        $pengaduan = Pengaduan::with(['pengaduan', 'user'])->findOrFail($id);

        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query){
            $query->where('id_pengaduan', request()->route('id'));
        })->with('user')->first();


        return view('pengaduan.show', compact('pengaduan', 'data_tanggapan')); 
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan',$id)->first();
        return view('pengaduan.edit', compact('pengaduan'));
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
        // $this->validate($request,[
    	// 	// 'tgl_pengaduan' => Carbon::now()->format('Y-m-d'),
    	// 	// 'nik' => 'required',
        //     // 'isi_laporan' => 'required',
        //     // 'foto' => 'required',
        //     // 'status' => 'required'
    	// ]);
 
        // Pengaduan::where('id_pengaduan', $id)->update([
    	// 	// 'tgl_pengaduan' => Carbon::now()->format('Y-m-d'),
    	// 	// 'nik' => $request->nik,
        //     // 'isi_laporan' => $request->isi_laporan,
        //     // 'foto' => $request->foto,
        //     // 'status' => $request->status,
    	// ]);

        $this->validate($request,[
    		// 'id_pengaduan' => 'required',
    		// 'tgl_tanggapan' => 'required',
            'tanggapan' => 'required',
    	]);

        Tanggapan::where('id_pengaduan', $id)->update([
    		// 'id_pengaduan' => $request->id_pengaduan,
    		// 'tgl_tanggapan' => $request->tgl_tanggapan,
            'tanggapan' => $request->tanggapan
    	]);
 
    	return redirect()->back()->with('success','Tanggapan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengaduan::where('id_pengaduan',$id)->delete();
        return redirect('/pengaduan')->with('Data terhapus','Data berhasil dihapus!');
    }

    public function statusOnchange($id){    
        $pengaduan = Pengaduan::with('user')->find($id);
        $pengaduan->status = request()->get('status');
        $pengaduan->save();
        return redirect()->back();
    }

    

}
