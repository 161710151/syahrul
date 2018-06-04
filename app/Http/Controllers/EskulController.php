<?php

namespace App\Http\Controllers;

use App\eskul;
use Session;
use Illuminate\Http\Request;

class EskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = eskul::paginate(10);
        return view('eskul.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eskul.create');
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
        'eskul' => 'required|',
        'peminat' => 'required|'
        ]);
        $a = new eskul;
        $a->eskul = $request->eskul;
        $a->peminat = $request->peminat;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$a->eskul</b>"
        ]);
        return redirect()->route('eskul.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\eskul  $eskul
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $a = eskul::findOrFail($id);
        return view('eskul.show',compact('a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\eskul  $eskul
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $a = eskul::findOrFail($id);
        return view('eskul.edit',compact('a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\eskul  $eskul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'eskul' => 'required|',
            'peminat' => 'required|'
        ]);
        $a = eskul::findOrFail($id);
        $a->eskul = $request->eskul;
        $a->peminat = $request->peminat;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$a->eskul</b>"
        ]);
        return redirect()->route('eskul.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\eskul  $eskul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = eskul::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('eskul.index');
    }
}
