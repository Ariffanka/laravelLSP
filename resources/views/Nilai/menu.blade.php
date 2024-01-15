@extends('layout.main')
@section('content')


    <center>
        <b> 
            <form action="" method="get">
                @csrf
                <label for="kelas"></label>
                <select name="kelas" id="kelas">
                    @foreach ($kelasPilih as $k) 
                    <option value="{{$k->id}}">{{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }}</option>
                    @endforeach
                </select>
                <button class="button-primary">Add</button>
            </form>
            
        </b>
    </center>
    <div class="content-menu">
        @forelse ($kelas as $k )  
            <div class="menu-kelas">
                <div class="kelas-list">
                    <a href="/nilai/kelas/{{$k->id}}"> {{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }} </a>
                </div>
            </div>
        @empty
            <div class="menu-kelas">
                <div class="kelas-list"><h1>Belum dapat kelas dan mapel</h1></div>
            </div> 
        @endforelse
    </div>

@endsection