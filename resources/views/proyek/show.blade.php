@extends('app')

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li>{!!link_to('proyek','List')!!}</li>
      <li>{!!link_to('proyek/create','Tambah')!!}</li>
      <li>{!!link_to('proyek/export','Export')!!}</li>
      <li>{!!link_to('proyek/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Proyek {{$data['nama']}}</div>
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
              <th>Deskripsi</th>
              <td>{{$data['deskripsi']}}</td>
            </tr>
            <tr>
              <th>Kontak</th>
              <td>{{$data['kontak']}}</td>
            </tr>
            <tr>
              <th>Manajer</th>
              <td>{{$data['manajer']}}</td>
            </tr>
            <tr>
              <th>Tanggal Mulai</th>
              <td>{{$data['tanggal_mulai']}}</td>
            </tr>
            <tr>
              <th>Tanggal Selesai</th>
              <td>{{$data['tanggal_selesai']}}</td>
            </tr>
            <tr>
              <th>Komplit</th>
              <td>{{$data['komplit']}}</td>
            </tr>
            <tr>
              <th>Pelanggan Terkait</th>
              <td>{{$data['pelanggan']}}</td>
            </tr>
          </table>
        @endif
      </div>
    </div>
  </div>
@endsection