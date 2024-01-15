<?php

namespace App\Http\Controllers;

use App\Models\Admininstrator;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){
        return view('home');
    }

    public function index(){
        return view('index');
    }

    public function loginAdmin(Request $req){
        $admin= Admininstrator::where('id_admin', $req->kode_admin)->where('password', $req->password)->first();
        if(!$admin){
            return back()->with('error', 'kode admin atau password salah!');
        }

        session([
            'role'=>'admin',
            'id_admin'=> $admin->id_admin
        ]);

        return redirect('/guru/index');
    }

    public function loginGuru(Request $req){
        
        $guru= Guru::where('nip', $req->nip)->where('password', $req->password)->first();
        if(!$guru){
            return back()->with('error', 'nip atau password salah!');
        }

        session([
            'role'=>'guru',
            'nama_guru'=> $guru->nama_guru,
            'id' => $guru->id
        ]);

        return redirect('/home');

    }

    public function loginSiswa(Request $req){
        $siswa= Siswa::where('nis', $req->nis)->where('password', $req->password)->first();
        if(!$siswa){
            return back()->with('error', 'nis atau password salah!');
        }

        session([
            'role'=>'siswa',
            'nama_guru'=> $req->nama_siswa,
            'id' => $siswa->id
        ]);

        return redirect('/home');
    }

    public function logout(Request $req){
        $req->session()->invalidate();
        return redirect('/');
    }

}
