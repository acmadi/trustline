@extends('app')

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li>{!!link_to('karyawan','List')!!}</li>
      <li>{!!link_to('karyawan/create','Tambah')!!}</li>
      <li>{!!link_to('karyawan/export','Export')!!}</li>
      <li>{!!link_to('karyawan/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Karyawan #{{$data['id']}}</div>
        @if(sizeof($data))
          <table class="table table-hover">
            <tr>
              <th>Nama</th>
              <td>{{$data['nama']}}</td>
            </tr>
            <tr>
              <th>alamat</th>
              <td>{{$data['alamat']}}</td>
            </tr>
            <tr>
              <th>kota</th>
              <td>{{$data['kota']}}</td>
            </tr>
            <tr>
              <th>propinsi</th>
              <td>{{$data['propinsi']}}</td>
            </tr>
            <tr>
              <th>telepon</th>
              <td>{{$data['telepon']}}</td>
            </tr>
            <tr>
              <th>hp</th>
              <td>{{$data['hp']}}</td>
            </tr>
            <tr>
              <th>agama</th>
              <td>{{$data['agama']}}</td>
            </tr>
            <tr>
              <th>pendidikan_terakhir</th>
              <td>{{$data['pendidikan_terakhir']}}</td>
            </tr>
            <tr>
              <th>tahun_masuk</th>
              <td>{{$data['tahun_masuk']}}</td>
            </tr>
            <tr>
              <th>Jabatan</th>
              <td>{{$data['jabatan']['nama']}}</td>
            </tr>
            <tr>
              <th>gaji_pokok</th>
              <td>{{$data['gaji_pokok']}}</td>
            </tr>
            <tr>
              <th>tunjangan1</th>
              <td>{{$data['tunjangan1']}}</td>
            </tr>
            <tr>
              <th>tunjangan2</th>
              <td>{{$data['tunjangan2']}}</td>
            </tr>
            <tr>
              <th>tunjangan3</th>
              <td>{{$data['tunjangan3']}}</td>
            </tr>
            <tr>
              <th>tunjangan4</th>
              <td>{{$data['tunjangan4']}}</td>
            </tr>
            <tr>
              <th>tunjangan5</th>
              <td>{{$data['tunjangan5']}}</td>
            </tr>
            <tr>
              <th>tunjangan6</th>
              <td>{{$data['tunjangan6']}}</td>
            </tr>
            <tr>
              <th>npwp</th>
              <td>{{$data['npwp']}}</td>
            </tr>
            <tr>
              <th>status</th>
              <td>{{$data['status']}}</td>
            </tr>
          </table>
        @else
          Invalid gudang_id.
        @endif
        <div class="panel-footer">
        </div>
      </div>
    </div>
  </div>
@endsection