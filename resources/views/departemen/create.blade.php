@extends('app')

@section('title')
  Departemen
@endsection

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li>{!!link_to('departemen','List')!!}</li>
      <li class="active">{!!link_to('departemen/create','Tambah')!!}</li>
      <li>{!!link_to('departemen/export','Export')!!}</li>
      <li>{!!link_to('departemen/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Masukkan data Departemen</div>
        <div class="panel-body">
          {!! Form::open(['url' => 'departemen/store', 'class' => 'form-horizontal']) !!}
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
            <label class="col-md-4 control-label">No. Departemen</label>
            <div class="col-md-6">
              <input class="form-control" name="id" type="text" readonly value="{{$id}}">
            </div>

          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Nama</label>
            <div class="col-md-6">
              <input class="form-control" name="nama" type="text">
            </div>

          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Kontak</label>
            <div class="col-md-6">
              <input class="form-control" name="kontak" type="text">
            </div>

          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">deskripsi</label>
            <div class="col-md-6">
              <input class="form-control" name="deskripsi" type="text">
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