@extends('app')

@section('title')
  Departemen
@endsection

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li class="active">{!!link_to('departemen','List')!!}</li>
      <li>{!!link_to('departemen/create','Tambah')!!}</li>
      <li>{!!link_to('departemen/export','Export')!!}</li>
      <li>{!!link_to('departemen/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Departemen </div>
        @if(sizeof($data))
          <table class="table table-bordered table-striped">
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Kontak</th>
              <th class="text-center">Deskripsi</th>
              <th class="text-center">Pilihan</th>
            </tr>
            @foreach($data as $row)
              <tr class="text-center">
                <td>{{$row['id']}}</td>
                <td>{{$row['nama']}}</td>
                <td>{{$row['kontak']}}</td>
                <td>{{$row['deskripsi']}}</td>
                <td class="text-center">
                  {!!link_to('departemen/show/'.$row['id'], 'show', ['class' => 'btn btn-default btn-sm'])!!}
                  {!!link_to('departemen/edit/'.$row['id'], 'edit', ['class' => 'btn btn-primary btn-sm'])!!}
                  {!!link_to('departemen/destroy/'.$row['id'], 'delete', ['class' => 'btn btn-danger btn-sm'])!!}
                </td>
              </tr>
            @endforeach
          </table>
        @else
          <div class="panel-body">
            Data Departemen Kosong
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection