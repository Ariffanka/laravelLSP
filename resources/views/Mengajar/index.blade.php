@extends('layout.main')
@section('content')

    <center>
        <b>
            <h2>LIST DATA KELAS</h2>
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
                        <th>KELAS</th>
                        <th>ACITON</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $mengajar as $m )
                        
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $m->guru->nama_guru }}</td>
                        <td>{{ $m->mapel->nama_mapel }}</td>
                        <td>{{ $m->kelas->kelas }}{{ $m->kelas->jurusan }}{{ $m->kelas->rombel }}</td>
                        <td style="text-align: center">
                            <a href="/mengajar/edit/{{$m->id}}" class="button-warning">Edit</a>
                            <a href="/mengajar/destroy/{{$m->id}}" onclick="return confirm('Yakin?')" class="button-danger">Delete</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </b>
    </center>

@endsection