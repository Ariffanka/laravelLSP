@extends('layout.main')
@section('content')

    <div class="container-form">
        <h2 align="center"> Tambah data nilai</h2>


        @if ($errors->any())
            @foreach ($errors as $e)
                <p class="text-danger">{{$e}}</p>
            @endforeach
        @endif
        @if (session('error'))
                <div class="alert alert-danger"><span class="closebtn" id="closeBtn">&times;</span>{{session('error')}}</div>
            @endif

        <form action="/nilai/store/{{$idKelas}}" method="post">
            @csrf
            <label for="mengajar_id">Guru Mapel</label>
            <select name="mengajar_id" id="mengajar_id">
                @foreach ($guru as $g)
                    
                <option value="{{$g->id}}">{{$g->mapel->nama_mapel}}</option>

                @endforeach
            </select>

            <label for="siswa_id">Siswa</label>
            <select name="siswa_id" id="siswa_id">
                @foreach ($mapel as $m)
                    
                <option value="{{$m->id}}">{{$m->nama_siswa}}</option>

                @endforeach
            </select>

            <label for="uh">UH</label>
            <input type="number" name="uh" id="uh" max="100">

            <label for="uh">UTS</label>
            <input type="number" name="uts" id="uts" max="100">

            <label for="uas">UAS</label>
            <input type="number" name="uas" id="uas" max="100">
            
            

            <button class="button-submit" type="submit" name="button">Simpan</button>
        </form>

    </div>

@endsection