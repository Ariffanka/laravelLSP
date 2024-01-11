<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Mapel.index', [
            'mapel' => Mapel::all()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $data= $req->validate([
            'nama_mapel' => 'required'
        ]);

        $create= Mapel::create($data);
        if($create){
            return redirect('/mapel/index')->with('success', 'berhasil tambah data!');
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
    public function edit(Mapel $mapel)
    {
        return view('Mapel.edit', [
            'mapel' => $mapel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Mapel $mapel)
    {
        $data= $req->validate([
            'nama_mapel' => 'required'
        ]);

        $update= $mapel->update($data);
        if($update){
            return redirect('/mapel/index')->with('success', 'berhasil ubah data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {

        $mengajar = Mengajar::where('guru_id', $mapel->id )->first();
        if($mengajar){
            return back()->with('error', 'id guru sedang dipakai!');
        }

        $del= $mapel->delete();
        if($del){
            return back()->with('success', 'berhasil hapus data!');
        }
    }
}
