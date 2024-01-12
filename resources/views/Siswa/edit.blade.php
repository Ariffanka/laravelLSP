@extends('layout.main')
@section('content')

<div class="container-form">
    <h2 align="center"> Ubah data guru</h2>


    @if ($errors->any())
        @foreach ($errors as $e)
            <p class="text-danger">{{$e}}</p>
        @endforeach
    @endif

    <form action="/siswa/update/{{$siswa->id}}" method="post">
        @csrf
        <label for="nip">NIS</label>
        <input type="text" name="nis" value="{{$siswa->nis }}" id="nip">

        <label for="nama_siswa">Nama Siswa</label>
        <input type="text" name="nama_siswa" value="{{$siswa->nama_siswa }}" id="nama_siswa">

        <label for="jk">Jenis Kelamin</label>
        <input type="radio" name="jk" value="L" {{$siswa->jk=='L' ? 'checked' : '' }} id="jk"> Laki-laki
        <input type="radio" name="jk" value="P" {{$siswa->jk=='P' ? 'checked' : '' }} id="jk"> Perempuan

        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" cols="30" rows="5">{{ $siswa->alamat }}</textarea>

        <label for="kelas_id">Kelas</label>
        <select name="kelas_id" id="kelas_id">
            @foreach ($kelas as $k)


                @if ($siswa->kelas_id == $k->id)
                <option value="{{$k->id}}" selected>{{$k->kelas}} {{$k->jurusan}} {{$k->rombel}}</option>
                @else
                <option value="{{$k->id}}">{{$k->kelas}} {{$k->jurusan}} {{$k->rombel}}</option>

                @endif
                    

            @endforeach
        </select>

        <label for="password">Password</label>
        <input type="text" name="password" value="{{$siswa->password }}" id="password">

        <button class="button-submit" type="submit" name="button">Ubah</button>
    </form>

</div>


@endsection