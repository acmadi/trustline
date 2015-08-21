@extends('app')

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li>{!!link_to('jabatan','List')!!}</li>
      <li class="active">{!!link_to('jabatan/create','Tambah')!!}</li>
      <li>{!!link_to('jabatan/export','Export')!!}</li>
      <li>{!!link_to('jabatan/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Edit Jabatan</div>
        <div class="panel-body">
          {!! Form::open(['url' => 'jabatan/update/'.$data['id'], 'class' => 'form-horizontal']) !!}
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
          @if (isset($success))
            <div class="alert alert-success">
              <strong>Success!</strong> Data Berhasil dimasukkan.<br><br>
            </div>
          @endif
          <div class="form-group">
            <label class="col-md-4 control-label">Nama Jabatan</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Nama" name="nama" type="text" value="{{$data['nama']}}">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-success">
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