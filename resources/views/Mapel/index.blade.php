@extends('layout.main')
@section('content')

    <center>
        <b>
            <h2>LIST DATA MAPEL</h2>
            <a href="/mapel/create" class="button-primary">Add</a>
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
                        <th>MAPEL</th>
                        <th>ACITON</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $mapel as $m )
                        
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $m->nama_mapel }}</td>
                        <td style="text-align: center">
                            <a href="/mapel/edit/{{$m->id}}" class="button-warning">Edit</a>
                            <a href="/mapel/destroy/{{$m->id}}" onclick="return confirm('Yakin?')" class="button-danger">Delete</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </b>
    </center>

@endsection