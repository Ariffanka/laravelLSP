@extends('layout.main')
@section('content')

    <div class="container-form">
        <h2 align="center"> Ubah data kelas</h2>


        @if ($errors->any())
            @foreach ($errors as $e)
                <p class="text-danger">{{$e}}</p>
            @endforeach
        @endif

        <form action="/kelas/update/{{$kelas->id}}" method="post">
            @csrf

            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas">
                @foreach ($tingkel as $k)
                    @if ($kelas->kelas==$k)
                        <option value="{{$k}}" selected>{{$k}}</option>
                    @else
                        <option value="{{$k}}" >{{$k}}</option>
                    @endif
                @endforeach
            </select>
            
            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan">
                @foreach ($jurusan as $j)
                @if ($kelas->jurusan==$j)
                    <option value="{{$j}}" selected>{{$j}}</option>
                @else
                    <option value="{{$j}}" >{{$j}}</option>
                @endif
            @endforeach
            </select>

            <label for="rombel">Rombel</label>
            <input type="number" name="rombel" max="4" min="1" id="rombel" value="{{$kelas->rombel}}">

            <button class="button-submit" type="submit" name="button">Ubah</button>
        </form>

    </div>

@endsection