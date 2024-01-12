<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('siswa.index',[
            'siswa' => Siswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Siswa.create', [
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $data= $req->validate([
            'nis'=>['required','numeric', 'unique:siswas'],
            'nama_siswa'=>['required'],
            'jk'=>['required'],
            'alamat'=>['required'],
            'kelas_id' => ['required'],
            'password'=>['required'],
        ]);

        $create= Siswa::create($data);
        if($create){
            return redirect('/siswa/index')->with('success', 'berhasil tambah data!');
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
    public function edit(Siswa $siswa)
    {
        return view('Siswa.edit',[
            'siswa' => $siswa,
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Siswa $siswa)
    {
        $data= $req->validate([
            'nis'=>['required','numeric', Rule::unique('siswas')->ignore($siswa->id)],
            'nama_siswa'=>['required'],
            'jk'=>['required'],
            'alamat'=>['required'],
            'kelas_id' => ['required'],
            'password'=>['required'],
        ]);

        $update= $siswa->update($data);
        if($update){
            return redirect('/siswa/index')->with('success', 'berhasil ubah data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $mengajar = Nilai::where('siswa_id', $siswa->id )->first();
        if($mengajar){
            return back()->with('error', "$siswa->nama_siswa sedang dipakai!");
        }

        $del=$siswa->delete();
        if($del){
            return back()->with('succes', 'behasil hapus data!');
        }
    }
}
