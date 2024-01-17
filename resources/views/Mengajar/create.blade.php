@extends('layout.main')
@section('content')

    <div class="container-form">
        <h2 align="center"> Tambah data mengajar</h2>

        @if (session('success'))
        <div class="alert alert-success"><span class="closebtn" id="closeBtn">&times;</span>{{session('success')}}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger"><span class="closebtn" id="closeBtn">&times;</span>{{session('error')}}</div>
    @endif
        @if ($errors->any())
            @foreach ($errors as $e)
                <p class="text-danger">{{$e}}</p>
            @endforeach
        @endif

        <form action="/mengajar/store" method="post">
            @csrf
            <label for="guru_id">Guru</label>
            <select name="guru_id" id="guru_id">
                @foreach ($guru as $g)
                    
                <option value="{{$g->id}}">{{$g->nama_guru}}</option>

                @endforeach
            </select>

            <label for="mapel_id">Mapel</label>
            <select name="mapel_id" id="mapel_id">
                @foreach ($mapel as $m)
                    
                <option value="{{$m->id}}">{{$m->nama_mapel}}</option>

                @endforeach
            </select>

            <label for="kelas_id">Kelas</label>
            <select name="kelas_id" id="kelas_id">
                @foreach ($kelas as $k)
                    
                <option value="{{$k->id}}">{{$k->kelas}}{{$k->jurusan}}{{$k->rombel}}</option>

                @endforeach
            </select>
            

            <button class="button-submit" type="submit" name="button">Simpan</button>
        </form>

    </div>

@endsection