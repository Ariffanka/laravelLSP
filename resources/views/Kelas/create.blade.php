@extends('layout.main')
@section('content')

    <div class="container-form">
        <h2 align="center"> Tambah data kelas</h2>


        @if ($errors->any())
            @foreach ($errors as $e)
                <p class="text-danger">{{$e}}</p>
            @endforeach
        @endif

        <form action="/kelas/store" method="post">
            @csrf

            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas">
                @foreach ($tingkel as $k)
                    
                <option value="{{$k}}">{{$k}}</option>

                @endforeach
            </select>
            
            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan">
                @foreach ($jurusan as $j)
                    
                <option value="{{$j}}">{{$j}}</option>

                @endforeach
            </select>

            <label for="rombel">Rombel</label>
            <input type="number" name="rombel" max="4" min="1" id="rombel">

            <button class="button-submit" type="submit" name="button">Simpan</button>
        </form>

    </div>

@endsection