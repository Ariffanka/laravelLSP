@extends('layout.main')
@section('content')

    <div class="container-form">
        <h2 align="center"> Tambah data guru</h2>


        @if ($errors->any())
            @foreach ($errors as $e)
                <p class="text-danger">{{$e}}</p>
            @endforeach
        @endif

        <form action="/mapel/store" method="post">
            @csrf
            <label for="nama_mapel">Mata Pelajaran</label>
            <input type="text" name="nama_mapel" id="nama_mapel">

            <button class="button-submit" type="submit" name="button">Simpan</button>
        </form>

    </div>

@endsection