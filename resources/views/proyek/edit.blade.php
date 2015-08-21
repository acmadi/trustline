@extends('app')

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li>{!!link_to('proyek','List')!!}</li>
      <li class="active">{!!link_to('proyek/create','Tambah')!!}</li>
      <li>{!!link_to('proyek/export','Export')!!}</li>
      <li>{!!link_to('proyek/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Data Pajak</div>
        <div class="panel-body">
          {!! Form::open(['url' => 'proyek/update/'.$data['id'], 'class' => 'form-horizontal']) !!}
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <div class="form-group">
            <label class="col-md-4 control-label">No</label>
            <div class="col-md-6">
              <input class="form-control" readonly type="text" value="{{$data['id']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Nama</label>
            <div class="col-md-6">
              <input class="form-control" name="nama" type="text" value="{{$data['nama']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Deskripsi</label>
            <div class="col-md-6">
              <input class="form-control" name="deskripsi" type="text" value="{{$data['deskripsi']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Kontak</label>
            <div class="col-md-6">
              <input class="form-control" name="kontak" type="text" value="{{$data['kontak']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Manajer</label>
            <div class="col-md-6">
              <input class="form-control" name="manajer" type="text" value="{{$data['manajer']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Tanggal Mulai</label>
            <div class="col-md-6">
              <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="tanggal_mulai" value="{{$data['tanggal_mulai']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Tanggal Selesai</label>
            <div class="col-md-6">
              <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="tanggal_mulai" value="{{$data['tanggal_selesai']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Komplit</label>
            <div class="col-md-6">
              <input class="form-control" name="komplit" type="text" value="{{$data['komplit']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Pelanggan Terkait</label>
            <div class="col-md-6">
              <input class="form-control" name="pelanggan" type="text" value="{{$data['pelanggan']}}">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection