@extends('app')

@section('title')
  Akun
@endsection

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li class="active">{!!link_to('akun','List')!!}</li>
      <li>{!!link_to('akun/create','Tambah')!!}</li>
      <li>{!!link_to('akun/export','Export')!!}</li>
      <li>{!!link_to('akun/import','Import')!!}</li>
    </ul>
  </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Akun</div>
          @if(sizeof($akuns))
            <table class="table table-bordered table-striped">
              <tr>
                <th class="text-center">No Akun</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Tipe</th>
                <th class="text-center">Mata Uang</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Saldo</th>
                <th class="text-center">Aksi</th>
              </tr>
              @foreach($akuns as $akun)
              <tr class="text-center">
                <td>{{$akun['no_akun']}}</td>
                <td>{{$akun['nama']}}</td>
                <td>{{$akun['tipeakun']['nama']}}</td>
                <td>{{$akun['mata_uang']}}</td>
                <td>{{$akun['tanggal']}}</td>
                <td>{{$akun['saldo_awal']}}</td>
                <td>
                {!!link_to('akun/edit/'.$akun['no_akun'], 'edit', ['class' => 'btn btn-primary btn-sm'])!!}
                {!!link_to('akun/destroy/'.$akun['no_akun'], 'delete', ['class' => 'btn btn-danger btn-sm'])!!}
                </td>
              </tr>
              @endforeach
            </table>
          @else
            <div class="panel-body">Data Akun Kosong.</div>
          @endif
          </div>
        </div>
      </div>
    </div>
@endsection