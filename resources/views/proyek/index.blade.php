@extends('app')

@section('title')
  Proyek
@endsection

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li class="active">{!!link_to('proyek','List')!!}</li>
      <li>{!!link_to('proyek/create','Tambah')!!}</li>
      <li>{!!link_to('proyek/export','Export')!!}</li>
      <li>{!!link_to('proyek/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Proyek </div>
        @if(sizeof($data))
          <table class="table table-bordered table-striped">
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Kontak</th>
              <th class="text-center">Manajer</th>
              <th class="text-center">Pelanggan</th>
              <th class="text-center">Pilihan</th>

            </tr>
            @foreach($data as $row)
              <tr class="text-center">
                <td>{{$row['id']}}</td>
                <td>{{$row['nama']}}</td>
                <td>{{$row['kontak']}}</td>
                <td>{{$row['manajer']}}</td>
                <td>{{$row['pelanggan']}}</td>
                <td class="text-center">
                  {!!link_to('proyek/show/'.$row['id'], 'show', ['class' => 'btn btn-default btn-sm'])!!}
                  {!!link_to('proyek/edit/'.$row['id'], 'edit', ['class' => 'btn btn-primary btn-sm'])!!}
                  {!!link_to('proyek/destroy/'.$row['id'], 'delete', ['class' => 'btn btn-danger btn-sm'])!!}
                </td>
              </tr>
            @endforeach
          </table>
        @else
          <div class="panel-body">
            Data Proyek Kosong
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection