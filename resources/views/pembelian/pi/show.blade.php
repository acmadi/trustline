@extends('app')

@section('title')
  Barang
@endsection

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li>{!!link_to('pembelian/pr','List')!!}</li>
      <li>{!!link_to('pembelian/pr/create','Tambah')!!}</li>
      <li>{!!link_to('pembelian/pr/export','Export')!!}</li>
      <li>{!!link_to('pembelian/pr/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-offset-1 col-md-10">
      <div class="panel panel-default">
        <div class="panel-heading">Detail Permintaan Barang</div>
        <div class="panel-body">
          @if(sizeof($pr))
            <div class="form-group">
              <label class="col-md-2 control-label">ID </label>
              <div class="col-md-2">
                <label class="control-label">PR-{{$pr['id']}}</label>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class="col-md-2 control-label">Tanggal </label>
              <div class="col-md-2">
                <label class="control-label">{{$pr['tanggal']}}</label>
              </div>
            </div>
            <br>
            <table class="table table-hover">
              <tr>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Tanggal Butuh</th>
                <th>Dipesan</th>
                <th>Diterima</th>
              </tr>
              @foreach($pivot as $list_attr => $data)
                <tr>
                  <td>{{$data['pivot']['barang_id']}}</td>
                  <td>{{$data['nama']}}</td>
                  <td>{{$data['pivot']['tanggal_butuh']}}</td>
                  <td>{{$data['pivot']['kuantitas_ordered']}}</td>
                  <td>{{$data['pivot']['kuantitas_received']}}</td>
                </tr>
              @endforeach
            </table>
            <br>
            <div class="form-group">
              <label class="col-md-2 control-label">Catatan </label>
              <div class="col-md-2">
                <label class="control-label">{{$pr['catatan']}}</label>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection