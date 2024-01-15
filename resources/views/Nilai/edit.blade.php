@extends('layout.main')
@section('content')

    <div class="container-form">
        <h2 align="center"> Ubah data Nilai</h2>


        @if ($errors->any())
            @foreach ($errors as $e)
                <p class="text-danger">{{$e}}</p>
            @endforeach
        @endif

        <form action="/nilai/update/{{$idKelas}}/{{$nilai->id}}" method="post">
            @csrf
            <label for="mengajar_id">Guru Mapel</label>
            <select name="mengajar_id" id="mengajar_id">
                @foreach ($guru as $g)
                    
                <option value="{{$g->id}}" @if ($g->id==$nilai->mengajar_id) selected  @endif>{{$g->mapel->nama_mapel}}</option>

                @endforeach
            </select>

            <label for="siswa_id">Siswa</label>
            <select name="siswa_id" id="siswa_id">
                @foreach ($mapel as $m)
                    
                <option value="{{$m->id}}" @if ($m->id==$nilai->siswa_id) selected  @endif>{{$m->nama_siswa}}</option>

                @endforeach
            </select>

            <label for="uh">UH</label>
            <input type="number" name="uh" id="uh" max="100" value="{{$nilai->uh}}">

            <label for="uh">UTS</label>
            <input type="number" name="uts" id="uts" max="100" value="{{$nilai->uts}}">

            <label for="uas">UAS</label>
            <input type="number" name="uas" id="uas" max="100" value="{{$nilai->uas}}">
            
            

            <button class="button-submit" type="submit" name="button">Ubah</button>
        </form>

    </div>

@endsection