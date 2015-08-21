@extends('app')

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li class="active">{!!link_to('tipeakun','List')!!}</li>
      <li>{!!link_to('tipeakun/create','Tambah')!!}</li>
      <li>{!!link_to('tipeakun/export','Export')!!}</li>
      <li>{!!link_to('tipeakun/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Tipe Akun</div>
        @if(sizeof($data))
          <table class="table table-bordered table-striped">
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Pilihan</th>
            </tr>
            @foreach($data as $row)
              <tr>
                <td class="text-center">{{$row['id']}}</td>
                <td class="text-center">{{$row['nama']}}</td>
                <td class="text-center">
                  {!!link_to('tipeakun/destroy/'.$row['id'], 'hapus', ['class' => 'btn btn-danger btn-sm'])!!}
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