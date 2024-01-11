@extends('layout.main')
@section('content')

<div class="container-form">
    <h2 align="center"> Ubah data guru</h2>


    @if ($errors->any())
        @foreach ($errors as $e)
            <p class="text-danger">{{$e}}</p>
        @endforeach
    @endif

    <form action="/guru/update/{{$guru->id}}" method="post">
        @csrf
        <label for="nip">NIP</label>
        <input type="text" name="nip" value="{{$guru->nip }}" id="nip">

        <label for="nama_guru">Nama Guru</label>
        <input type="text" name="nama_guru" value="{{$guru->nama_guru }}" id="nama_guru">

        <label for="jk">Jenis Kelamin</label>
        <input type="radio" name="jk" value="L" {{$guru->jk=='L' ? 'checked' : '' }} id="jk"> Laki-laki
        <input type="radio" name="jk" value="P" {{$guru->jk=='P' ? 'checked' : '' }} id="jk"> Perempuan

        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" cols="30" rows="5">{{ $guru->alamat }}</textarea>

        <label for="password">Password</label>
        <input type="text" name="password" value="{{$guru->password }}" id="password">

        <button class="button-submit" type="submit" name="button">Ubah</button>
    </form>

</div>


@endsection