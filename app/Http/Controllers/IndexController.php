<?php

namespace App\Http\Controllers;

use App\Models\Admininstrator;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(){
        return view('index');
    }

    public function home(Request $req){
        if($req->query('id')=='1'){
            session([
                    'role'=>'admin',
                    'id_admin'=>"min arip"
                ]);
        }else if($req->query('id')=='2'){
            session([
                'role'=>'guru',
                'nama_guru'=>"sir arip"
            ]);
        }else if($req->query('id')=='3'){
            session([
                'role'=>'siswa',
                'nama_siswa'=>"nak arip"
            ]);
        }
        return view('home');
    }

    public function logout(Request $req){
        $req->session()->invalidate();
        return redirect('/home');
    }

    public function login_admin(Request $req){
        $admin=Admininstrator::where('id_admin', $req->kode_admin)->where('password', $req->password)->first();
        if(!$admin){
            return back()->with("error","kode admin/password salah!");
        }

        session([
            "role"=>"admin",
            "id_admin"=> $admin->id_admin 
        ]);

        return redirect('/home');

    }

    public function login_guru(Request $req){

        $guru=Guru::where('nip', $req->nip)->where('password', $req->password)->first();
        if(!$guru){
            return back()->with("error","nip/password salah!");
        }

        session([
            "role"=>"guru",
            "nama_guru"=> $guru->nama_guru,
            'id'=>$guru->id
        ]);

        return redirect('/home');

    }

    public function login_siswa(Request $req){
        
        $siswa=Siswa::where('nis', $req->nis)->where('password', $req->password)->first();
        if(!$siswa){
            return back()->with("error","nis/password salah!");
        }

        session([
            "role"=>"siswa",
            "nama_guru"=> $siswa->nama_siswa,
            'id'=>$siswa->id
        ]);

        return redirect('/home');


    }
}
