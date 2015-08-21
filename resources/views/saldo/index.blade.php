@extends('app')

@section('title')
  Multi Saldo Awal
@endsection

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li class="active">{!!link_to('saldo','List')!!}</li>
      <li>{!!link_to('saldo/create','Tambah')!!}</li>
      <li>{!!link_to('saldo/export','Export')!!}</li>
      <li>{!!link_to('saldo/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Multi Saldo Awal</div>
        @if(sizeof($data))
          <table class="table table-bordered table-striped">
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Kode Gudang</th>
              {{--<th class="text-center">Kode Barang</th>--}}
              <th class="text-center">Tanggal</th>
              <th class="text-center">HPP/Satuan Awal</th>
              <th class="text-center">Pilihan</th>
            </tr>
            @foreach($data as $row)
              <tr class="text-center">
                <td>{{$row['id']}}</td>
                <td>{{$row['gudang_id']}}</td>
                {{--<td>{{$row['kode_barang']}}</td>--}}
                <td>{{$row['tanggal']}}</td>
                <td>{{$row['hpp_satuan']}}</td>
                <td>
                  {!!link_to('saldo/edit/'.$row['id'], 'edit', ['class' => 'btn btn-primary btn-sm'])!!}
                  {!!link_to('saldo/destroy/'.$row['id'], 'delete', ['class' => 'btn btn-danger btn-sm'])!!}
                </td>
              </tr>
            @endforeach
          </table>
        @else
          <div class="panel-body">Data Multi Saldo Awal Kosong.</div>
        @endif
      </div>
    </div>
  </div>
  </div>
@endsection