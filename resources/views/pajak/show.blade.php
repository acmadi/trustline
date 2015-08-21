@extends('app')

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li>{!!link_to('pajak','List')!!}</li>
      <li>{!!link_to('pajak/create','Tambah')!!}</li>
      <li>{!!link_to('pajak/export','Export')!!}</li>
      <li>{!!link_to('pajak/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Pajak{{$data['nama']}}</div>
        @if(sizeof($data))
          <table class="table table-hover">
            <tr>
              <th>Nama</th>
              <td>{{$data['nama']}}</td>
            </tr>
            <tr>
              <th>Nilai</th>
              <td>{{$data['nilai']}}</td>
            </tr>
            <tr>
              <th>Keterangan</th>
              <td>{{$data['keterangan']}}</td>
            </tr>
            <tr>
              <th>Akun Pajak Penjualan</th>
              <td>{{$data['akun_pajak_penjualan']}}</td>
            </tr>
            <tr>
              <th>Akun Pajak Pembelian</th>
              <td>{{$data['akun_pajak_pembelian']}}</td>
            </tr>
          </table>
        @endif
      </div>
    </div>
  </div>
@endsection