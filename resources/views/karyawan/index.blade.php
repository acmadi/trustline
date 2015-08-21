@extends('app')

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li class="active">{!!link_to('karyawan','List')!!}</li>
      <li>{!!link_to('karyawan/create','Tambah')!!}</li>
      <li>{!!link_to('karyawan/export','Export')!!}</li>
      <li>{!!link_to('karyawan/import','Import')!!}</li>
    </ul>
  </div>
  <!--
  <div class="row">
    <div class="col-md-12">
      {!!link_to('karyawan','List',['class'=>'btn btn-default'])!!}
      {!!link_to('karyawan/create','Tambah',['class'=>'btn btn-success'])!!}
    </div>
  </div>
  -->
  
  <br>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Karyawan</div>
        @if(sizeof($data))
          <table class="table table-bordered table-striped">
            <tr>
              <th class="text-center">Nama</th>
              <th class="text-center">Jabatan</th>
              <th class="text-center">Tahun Masuk</th>
              <th class="text-center">Gaji Pokok</th>
              <th class="text-center">Modify</th>
            </tr>
            @foreach($data as $row)
              <tr class="text-center">
                <td>{{$row['nama']}}</td>
                <td>{{$row['jabatan']['nama']}}</td>
                <td>{{$row['tahun_masuk']}}</td>
                <td>{{$row['gaji_pokok']}}</td>
                <td class="text-center">
                {!!link_to('karyawan/show/'.$row['id'], 'show', ['class' => 'btn btn-default btn-sm'])!!}
                {!!link_to('karyawan/edit/'.$row['id'], 'edit', ['class' => 'btn btn-primary btn-sm'])!!}
                {!!link_to('karyawan/destroy/'.$row['id'], 'delete', ['class' => 'btn btn-danger btn-sm'])!!}
                </td>
              </tr>
            @endforeach
          </table>
        @else
          <div class="panel-body">
            Data karyawan kosong.
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection