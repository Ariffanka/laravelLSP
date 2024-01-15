<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mengajar;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $kelasId=Mengajar::where('guru_id', session('id'))->pluck('kelas_id')->toArray();
            $kelas= Kelas::whereIn('id', $kelasId)->get();
        if($req->kelas){
            return redirect("/nilai/kelas/$req->kelas")->with(['kelas', $kelas, 'kelasPilih', $kelasId, 'kelasId', $req->kelas]);
        }
        if(session('role')=='guru'){
            

            return view('Nilai.menu', [
                'kelas' => $kelas,
                'kelasPilih' => Kelas::all()
            ]);
        }else{
            $nilai= Nilai::where('siswa_id', session('id'))->get();
            return view('Nilai.index', compact('nilai'));

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Kelas $kelas)
    {
        $mengajar= Mengajar::where('guru_id', session('id'))->where('kelas_id', $kelas->id);
        return view('Nilai.create', [
            'guru' => $mengajar->get(),
            'mapel' => Siswa::where('kelas_id', $kelas->id)->get(),
            'idKelas' => $kelas->id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req, Kelas $kelas)
    {
        $data= $req->validate([
            'mengajar_id'=>['required'],
            'siswa_id'=>['required'],
            'uh'=>['required', 'numeric'],
            'uts'=>['required', 'numeric'],
            'uas' => ['required', 'numeric'],
        ]);

        $data['na']= round(($req->uh + $req->uts + $req->uas) / 3);
        $cek= Nilai::where('mengajar_id', $req->mengajar_id)->where('siswa_id',  $req->siswa_id)->first();
        if($cek){
            return back()->with('error', 'data sudah ada!');
        }else{
            $create=Nilai::create($data);
            if($create) return redirect("/nilai/kelas/$kelas->id");
            return back()->with('error','data gagal dita,bah');
            
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        $idGuru= session('id');
        $idKelas= $kelas->id;

        $data=  Nilai::whereHas('mengajar', function($query) use ($idGuru, $idKelas){
            $query->where('guru_id', $idGuru)->where('kelas_id', $idKelas); 
        })->get();

        return view('Nilai.index', [
            'nilai' => $data,
            'idKelas' => $idKelas,
            'kelas_id' => $idKelas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas, Nilai $nilai)
    {
        $mengajar= Mengajar::where('guru_id', session('id'))->where('kelas_id', $kelas->id);
        return view('Nilai.edit', [
            'guru' => $mengajar->get(),
            'nilai' => $nilai,
            'idKelas' => $kelas->id,
            'mapel' => Siswa::where('kelas_id', $kelas->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Kelas $kelas, Nilai $nilai)
    {
        $data= $req->validate([
            'mengajar_id'=>['required'],
            'siswa_id'=>['required'],
            'uh'=>['required', 'numeric'],
            'uts'=>['required', 'numeric'],
            'uas' => ['required', 'numeric'],
        ]);
        $data['na']= round(($req->uh + $req->uts + $req->uas) / 3);
        if($req->mengajar_id !=  $nilai->mengajar_id || $req->siswa_id != $nilai->siswa_id){
            $cek= Nilai::where('mengajar_id', $req->mengajar_id)->where('siswa_id', $req->siswa_id)->first();
            if($cek){
                return back()->with('error', 'data dah ada coy');
            }
        }else{
            $update=$nilai->update($data);
            if($update){
                return redirect("/nilai/kelas/$kelas->id");
            }
            return back()->with('error', 'data gagal diubah');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        $del=$nilai->delete();
        if($del){
            return back()->with('success', 'berhsil apus data');
        }
        return back()->with('error', 'gagal apus data');
    }
}
