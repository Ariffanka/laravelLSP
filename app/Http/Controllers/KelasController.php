<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mengajar;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Kelas.index', [
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Kelas.create',[
            'tingkel' => ['10','11','12','13'],
            'jurusan' => ["DKV","BKP","DPIB","RPL","SIJA","TKJ","TP","TOI","TKR","TFLM"]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req, Kelas $kelas)
    {
        $data= $req->validate([
            'jurusan' => 'required',
            'kelas' => 'required',
            'rombel' => 'required'
        ]);

        $kelas= Kelas::firstOrNew($data);
        if($kelas->exist){
            return back()->with('error', 'data sudah ada!');
        }
        if($kelas){
            $add= $kelas->save($data);
            if($add){
                return redirect('/kelas/index')->with('success', 'berhasil tambah data!');
            }
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
    public function edit(Kelas $kelas)
    {
        return view('Kelas.edit',[
            'tingkel' => ['10','11','12','13'],
            'jurusan' => ["DKV","BKP","DPIB","RPL","SIJA","TKJ","TP","TOI","TKR","TFLM"],
            'kelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Kelas $kelas)
    {
        $data= $req->validate([
            'jurusan' => 'required',
            'kelas' => 'required',
            'rombel' => 'required'
        ]);

        if($req->kelas != $kelas->kelas || $req->jurusan != $kelas->jurusan || $req->rombel != $kelas->rombel ){
            $cek= Kelas::where('kelas', $req->kelas)->where('jurusan', $req->jurusan)->where('rombel', $req->rombel)->first();

            if($cek){
                return back()->with('error', 'data sudah ada!');
            }
        }

        $edit= $kelas->update($data);
        if($edit){
            return redirect('/kelas/index')->with('success', 'berhasil ubah data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $dipake="$kelas->kelas $kelas->jurusan $kelas->rombel";
        $siswa = Siswa::where('kelas_id', $kelas->id )->first();
        $mengajar = Mengajar::where('kelas_id', $kelas->id )->first();

        if($mengajar){
            return back()->with('error', "$dipake sedang dipakai!");
        }

        if($siswa){
            return back()->with('error', "$dipake sedang dipakai!");
        }

        $del= $kelas->delete();
        if($del){
            return back()->with('success', 'berhasil hapus data!');
        }
    }
}
