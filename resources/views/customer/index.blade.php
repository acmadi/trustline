@extends('app')

@section('title')
  Pelanggan
@endsection

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li class="active">{!!link_to('customer','List')!!}</li>
      <li>{!!link_to('customer/create','Tambah')!!}</li>
      <li>{!!link_to('customer/export','Export')!!}</li>
      <li>{!!link_to('customer/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Data Pelanggan</div>
        @if(sizeof($data))
          <table class="table table-bordered table-striped">
            <tr>
              <th class="text-center">Kode Pelanggan</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Alamat</th>
              <th class="text-center">Telepon</th>
              <th class="text-center">CP</th>
              <th class="text-center">Telepon CP</th>
              <th class="text-center">Pilihan</th>
            </tr>
            @foreach($data as $row)
              <tr class="text-center">
                <td>{{$row['id']}}</td>
                <td>{{$row['nama']}}</td>
                <td>{{$row['alamat']}}</td>
                <td>{{$row['telepon1']}}</td>
                <td>{{$row['contact_person']}}</td>
                <td>{{$row['telepon1_cp']}}</td>
                <td>
                  {!!link_to('customer/show/'.$row['id'], 'show', ['class' => 'btn btn-default btn-sm'])!!}
                  {!!link_to('customer/edit/'.$row['id'], 'edit', ['class' => 'btn btn-primary btn-sm'])!!}
                  {!!link_to('customer/destroy/'.$row['id'], 'delete', ['class' => 'btn btn-danger btn-sm'])!!}
                </td>
              </tr>
            @endforeach
          </table>
        @else
          <div class="panel-body">Data Customer Kosong.</div>
        @endif
      </div>
    </div>
  </div>
  </div>
@endsection