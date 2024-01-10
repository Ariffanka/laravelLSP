@extends('layout.main')

@section('content')

<div class="container-form">
    <h2 align="center">Edit </h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error )
        <p class="text-danger">{{ $error }}</p>
        @endforeach
    @endif

    <form action="/guru/update/{{$guru->id}}" method="post">
    @csrf

        <label for="nip">NIP</label>
        <input type="text" name="nip" value="{{$guru->nip}}" id="nip">

        <label for="nama_guru">Nama Guru</label>
        <input type="text" name="nama_guru" value="{{$guru->nama_guru}}" id="nama_guru">

        <label for="">Jenis Kelamin</label>
        <input type="radio" name="jk" {{$guru->jk== 'L' ? 'checked' : ''}} id="" value="L">Laki-laki
        <input type="radio" name="jk" {{$guru->jk== 'P' ? 'checked' : ''}} id="" value="P">Perempuan

        <label for="alamat">Alamat</label>
        <textarea name="alamat" value="{{$guru->alamat}}" id="alamat" cols="30" rows="5">{{ $guru->alamat }}</textarea>
        
        <label for="password">Password</label>
        <input type="password" name="password" value="{{$guru->password}}" id="password">

        <button type="submit" class="button-submit" type="submit" name="button">Submit</button>
    </form>

</div>

@endsection
