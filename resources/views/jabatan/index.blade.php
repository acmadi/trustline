@extends('app')

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li class="active">{!!link_to('jabatan','List')!!}</li>
      <li>{!!link_to('jabatan/create','Tambah')!!}</li>
      <li>{!!link_to('jabatan/export','Export')!!}</li>
      <li>{!!link_to('jabatan/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Jabatan</div>
        @if(sizeof($data))
          <table class="table table-bordered table-striped">
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Modify</th>
            </tr>
            @foreach($data as $row)
              <tr>
                <td class="text-center">{{$row['id']}}</td>
                <td class="text-center">{{$row['nama']}}</td>
                <td class="text-center">
                {!!link_to('jabatan/edit/'.$row['id'], 'edit', ['class' => 'btn btn-primary btn-sm'])!!}
                {!!link_to('jabatan/destroy/'.$row['id'], 'delete', ['class' => 'btn btn-danger btn-sm'])!!}
                </td>
              </tr>
            @endforeach
          </table>
        @else
          <div class="panel-body">Buat tipe akun baru.</div>
        @endif
      </div>
    </div>
  </div>
@endsection