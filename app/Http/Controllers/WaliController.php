<?php

namespace App\Http\Controllers;

use App\wali;
use App\siswa;
use Session;
use Illuminate\Http\Request;

class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wali = wali::with('siswa')->get();
        return view('wali.index',compact('wali'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mhs = siswa::all();
        return view('wali.create',compact('mhs'));
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
            'alamat' => 'required',
            'siswa_id' => 'required'
        ]);
        $wali = new wali;
        $wali->nama = $request->nama;
        $wali->alamat = $request->alamat;
        $wali->siswa_id = $request->siswa_id;
        $wali->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$wali->nama</b>"
        ]);
        return redirect()->route('wali.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wali = wali::findOrFail($id);
        return view('wali.show',compact('wali'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wali = wali::findOrFail($id);
        $mhs = siswa::all();
        $selectedMhs = Wali::findOrFail($id)->siswa_id;
        return view('wali.edit',compact('mhs','wali','selectedMhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
        'nama' => 'required|',
        'alamat' => 'required',
        'siswa_id' => 'required'
        ]);
        $wali = wali::findOrFail($id);
        $wali->nama = $request->nama;
        $wali->alamat = $request->alamat;
        $wali->siswa_id = $request->siswa_id;
        $wali->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$wali->nama</b>"
        ]);
        return redirect()->route('wali.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = wali::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('wali.index');
    }
}
