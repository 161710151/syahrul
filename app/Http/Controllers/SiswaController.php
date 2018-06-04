<?php

namespace App\Http\Controllers;

use App\siswa;
use App\guru;
use App\eskul;
use Session;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $mhs = siswa::with('guru')->get();
        return view('siswa.index',compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = guru::all();
        $a = eskul::all();
        return view('siswa.create',compact('guru','a'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'nim' => 'required|unique:siswas',
            'kelas' => 'required',  
            'eskul' => 'required'
        ]);
        $mhs = new siswa;
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->kelas = $request->kelas;
        $mhs->guru_id = $request->guru_id;
        $mhs->save();
        $mhs->eskul()->attach($request->eskul);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$mhs->nama</b>"
        ]);
        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mhs = siswa::findOrFail($id);
        return view('siswa.show',compact('mhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = siswa::findOrFail($id);
        $guru = guru::all();
        $selectedguru = siswa::findOrFail($id)->guru_id;
        $selected = $mhs->eskul->pluck('id')->toArray();
        $a = eskul::all();
        return view('siswa.edit',compact('mhs','guru','selectedguru','selected','a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'nim' => 'required|',
            'kelas' => 'required',
            'guru_id' => 'required',
            'eskul' => 'required'
        ]);
        $mhs = siswa::findOrFail($id);
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->kelas = $request->kelas;
        $mhs->guru_id = $request->guru_id;
        $mhs->save();
        $mhs->eskul()->sync($request->eskul);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$mhs->nama</b>"
        ]);
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = siswa::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('siswa.index');
    }
}
