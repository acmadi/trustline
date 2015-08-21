@extends('app')

@section('title')
  Pajak
@endsection

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li class="active">{!!link_to('pajak','List')!!}</li>
      <li>{!!link_to('pajak/create','Tambah')!!}</li>
      <li>{!!link_to('pajak/export','Export')!!}</li>
      <li>{!!link_to('pajak/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Pajak</div>
        @if(sizeof($data))
          <table class="table table-bordered table-striped">
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Nilai</th>
              <th class="text-center">Akun Pajak Penjualan</th>
              <th class="text-center">Akun Pajak Pembelian</th>
              <th class="text-center">Keterangan</th>
              <th class="text-center">Pilihan</th>
            </tr>
            @foreach($data as $row)
              <tr class="text-center">
                <td>{{$row['id']}}</td>
                <td>{{$row['nama']}}</td>
                <td>{{$row['nilai']}}</td>
                <td>{{$row['akun_pajak_penjualan']}}</td>
                <td>{{$row['akun_pajak_pembelian']}}</td>
                <td>{{$row['keterangan']}}</td>
                <td class="text-center">
                  {!!link_to('pajak/show/'.$row['id'], 'show', ['class' => 'btn btn-default btn-sm'])!!}
                  {!!link_to('pajak/edit/'.$row['id'], 'edit', ['class' => 'btn btn-primary btn-sm'])!!}
                  {!!link_to('pajak/destroy/'.$row['id'], 'delete', ['class' => 'btn btn-danger btn-sm'])!!}
                </td>
              </tr>
            @endforeach
          </table>
        @else
          <div class="panel-body">
            Data Pajak kosong
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection