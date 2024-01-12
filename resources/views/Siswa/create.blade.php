@extends('layout.main')
@section('content')

    <div class="container-form">
        <h2 align="center"> Tambah data siswa</h2>


        @if ($errors->any())
            @foreach ($errors as $e)
                <p class="text-danger">{{$e}}</p>
            @endforeach
        @endif

        <form action="/siswa/store" method="post">
            @csrf
            <label for="nis">NIS</label>
            <input type="text" name="nis" id="nis">

            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" name="nama_siswa" id="nama_siswa">

            <label for="jk">Jenis Kelamin</label>
            <input type="radio" name="jk" value="L" id="jk"> Laki-laki
            <input type="radio" name="jk" value="P" id="jk"> Perempuan

            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="5"></textarea>

            <label for="kelas">Kelas</label>
            <select name="kelas_id" id="kelas_id">
                @foreach ($kelas as $k)
                    
                <option value="{{$k->id}}">{{$k->kelas}} {{$k->jurusan}} {{$k->rombel}}</option>

                @endforeach
            </select>

            <label for="password">Password</label>
            <input type="text" name="password" id="password">

            <button class="button-submit" type="submit" name="button">Simpan</button>
        </form>

    </div>

@endsection