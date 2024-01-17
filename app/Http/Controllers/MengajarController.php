<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Mengajar.index', [
            'mengajar' => Mengajar::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Mengajar.create', [
            'guru' => Guru::all(),
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req, Mengajar $mengajar)
    {
        $data= $req->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required'
        ]);

        $mengajar= Mengajar::firstOrNew($data);
        if($mengajar->exist){
            return back()->with('error', 'data sudah ada!');
        }else{
            $cek= Mengajar::where('mapel_id', $req->mapel_id)->where('kelas_id', $req->kelas_id);
            if($cek) return back()->with('error', 'gur dah ngajar kelas lain coy');
            $mengajar->save();
            return redirect('/mengajar/index')->with('success', 'berhasil tambah data!');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mengajar $mengajar)
    {
        return view('Mengajar.edit',[
            'mengajar' => $mengajar,
            'kelas' => Kelas::all(),
            'mapel' => Mapel::all(),
            'guru' => Guru::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Mengajar $mengajar)
    {
        $data= $req->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required'
        ]);
        //cek data beda gan antara data di db dan req dari form edit
        if($req->mapel_id != $mengajar->mapel_id || $req->kelas_id != $mengajar->kelas_id){
            $cek= Mengajar::where('mapel_id', $req->mapel_id)->where('kelas_id', $req->kelas_id);
            if($cek){
                return back()->with('error', 'data sudah ada');
            }
            $mengajar->update($data);
            return redirect('/mengajar/index')->with('success', 'data berhasil ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mengajar $mengajar)
    {
        $mengajar->delete();
        return back()->with('success', 'berhsil diapus');
    }
}
