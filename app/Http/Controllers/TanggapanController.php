<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanggapan;
use App\Pengaduan;
use App\User;
use Carbon\Carbon;
use Auth;

class TanggapanController extends Controller
{

    public function tanggapan($id)
    {
        // $tanggapan = Tanggapan::all();
        return view('pengaduan.tanggapan');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggapan = Tanggapan::all();
        return view('tanggapan.index', compact('tanggapan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('tanggapan.create');
    // }
    public function create($id)
    {
        $detail_pengaduan = Pengaduan::with('user')->find($id);
        return view('pengaduan.show', compact('detail_pengaduan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        // $this->validate($request,[
    	// 	// 'id_pengaduan' => 'required',
    	// 	// 'tgl_tanggapan' => 'required',
        //     'tanggapan' => 'required',
    	// ]);

        // Tanggapan::create([
    	// 	// 'id_pengaduan' => $request->id_pengaduan,
    	// 	// 'tgl_tanggapan' => $request->tgl_tanggapan,
        //     'tanggapan' => $request->tanggapan
    	// ]);
 
    	// return redirect('/tanggapan');
        $data_tanggapan = new Tanggapan();
        $data_tanggapan->tgl_tanggapan = request()->get('tgl_tanggapan');
        $data_tanggapan->id_pengaduan = request()->get('id_pengaduan');
        $data_tanggapan->tanggapan = request()->get('tanggapan');
        $data_tanggapan->id = Auth::user()->id;
        $data_tanggapan->save();
        return redirect()->back();

    //     $input = $request->input('input_name');
    
    // if ($input) {
    //     // Jika input sudah disubmit, simpan inputan di variabel
    //     $data['input_value'] = $input;
    // } else {
    //     // Jika input belum disubmit, variabel akan kosong
    //     $data['input_value'] = '';
    // }

    } 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_tanggapan = Tanggapan::where('id_tanggapan', $id)->first();
        return view('tanggapan.show', compact('data_tanggapan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tanggapan = Tanggapan::where('id_tanggapan',$id)->first();
        return view('tanggapan.edit', compact('tanggapan'));
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
        $this->validate($request,[
    		'id_pengaduan' => 'required',
    		'tgl_tanggapan' => 'required',
            'tanggapan' => 'required',
    	]);

        Tanggapan::where('id_tanggapan', $id)->update([
    		'id_pengaduan' => $request->id_pengaduan,
    		'tgl_tanggapan' => $request->tgl_tanggapan,
            'tanggapan' => $request->tanggapan
    	]);
 
    	return redirect('/tanggapan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tanggapan::where('id_tanggapan',$id)->delete();
        return redirect('/tanggapan');
    }
}
