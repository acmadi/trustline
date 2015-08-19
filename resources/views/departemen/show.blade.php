@extends('app')

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li>{!!link_to('departemen','List')!!}</li>
            <li>{!!link_to('departemen/create','Tambah')!!}</li>
            <li>{!!link_to('departemen/export','Export')!!}</li>
            <li>{!!link_to('departemen/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Departemen {{$data['nama']}}</div>
                @if(sizeof($data))
                    <table class="table table-hover">
                        <tr>
                            <th>No</th>
                            <td>{{$data['id']}}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{$data['nama']}}</td>
                        </tr>
                        <tr>
                            <th>Kontak</th>
                            <td>{{$data['kontak']}}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{$data['deskripsi']}}</td>
                        </tr>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection