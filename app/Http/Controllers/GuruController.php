<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mengajar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Guru.index',[
            'guru' => Guru::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $data= $req->validate([
            'nip'=>['required','numeric', 'unique:gurus'],
            'nama_guru'=>['required'],
            'jk'=>['required'],
            'alamat'=>['required'],
            'password'=>['required'],
        ]);

        $guru= Guru::create($data);
        if($guru){
            return redirect('/guru/index')->with('success', 'berhasil tambah data!');
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
    public function edit(Request $req, Guru $guru)
    {
        return view('Guru.edit', [
            'guru' => $guru
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Guru $guru)
    {
        $data= $req->validate([
            'nip'=>['required','numeric', Rule::unique('gurus')->ignore($guru->id)],
            'nama_guru'=>['required'],
            'jk'=>['required'],
            'alamat'=>['required'],
            'password'=>['required'],
        ]);

        $edit= $guru->update($data);
        if($edit){
            return redirect('/guru/index')->with('success', 'berhasil ubah data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $mengajar = Mengajar::where('guru_id', $guru->id )->first();
        if($mengajar){
            return back()->with('error', 'id guru sedang dipakai!');
        }

        $del=$guru->delete();
        if($del){
            return back()->with('succes', 'behasil hapus data!');
        }
    }
}
