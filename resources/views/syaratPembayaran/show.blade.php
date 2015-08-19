@extends('app')

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li>{!!link_to('syaratpembayaran','List')!!}</li>
            <li>{!!link_to('syaratpembayaran/create','Tambah')!!}</li>
            <li>{!!link_to('syaratpembayaran/export','Export')!!}</li>
            <li>{!!link_to('syaratpembayaran/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Syarat Pembayaran {{$data['nama']}}</div>
                @if(sizeof($data))
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <td>{{$data['id']}}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{$data['nama']}}</td>
                        </tr>
                        <tr>
                            <th>Syarat diskon</th>
                            <td>{{$data['syarat_diskon']}}</td>
                        </tr>
                        <tr>
                            <th>Diskon</th>
                            <td>{{$data['diskon']}}</td>
                        </tr>
                        <tr>
                            <th>Jatuh Tempo</th>
                            <td>{{$data['jatuh_tempo']}}</td>
                        </tr>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection