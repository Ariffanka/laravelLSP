@extends('layout.main')
@section('content')

    <center>
        <b>
            <h2>LIST DATA NILAI</h2>
            <a href="/mengajar/create" class="button-primary">Add</a>
            @if (session('success'))
                <div class="alert alert-success"><span class="closebtn" id="closeBtn">&times;</span>{{session('success')}}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger"><span class="closebtn" id="closeBtn">&times;</span>{{session('error')}}</div>
            @endif
            <table class="table-data">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>GURU</th>
                        <th>MAPEL</th>
                        <th>NAMA_SISWA</th>
                        <th>UH</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>NA</th>
                        @if (session('role')=='guru')
                            <th>ACITON</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $nilai as $n )
                        
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $n->mengajar->guru->nama_guru }}</td>
                        <td>{{ $n->mengajar->mapel->nama_mapel }}</td>
                        <td>{{ $n->siswa->nama_siswa }}</td>
                        <td>{{ $n->uh}}</td>
                        <td>{{ $n->uts}}</td>
                        <td>{{ $n->uah}}</td>
                        <td>{{ $n->na}}</td>
                        @if (session('role')=='guru')    
                        <td style="text-align: center">
                            <a href="/nilai/edit/{{$idKelas}}/{{$n->id}}" class="button-warning">Edit</a>
                            <a href="/nilai/destroy/{{$n->id}}" onclick="return confirm('Yakin?')" class="button-danger">Delete</a>
                        </td>
                        @endif
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </b>
    </center>

@endsection