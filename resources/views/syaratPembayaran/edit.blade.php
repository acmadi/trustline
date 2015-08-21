@extends('app')

@section('title')
  Syarat Pembayaran
@endsection

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li>{!!link_to('syaratpembayaran','List')!!}</li>
      <li class="active">{!!link_to('syaratpembayaran/create','Tambah')!!}</li>
      <li>{!!link_to('syaratpembayaran/export','Export')!!}</li>
      <li>{!!link_to('syaratpembayaran/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Edit data Syarat Pembayaran</div>
        <div class="panel-body">
          {!! Form::open(['url' => 'syaratpembayaran/update/'.$data['id'], 'class' => 'form-horizontal']) !!}
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
            <label class="col-md-4 control-label">Syarat Diskon</label>
            <div class="col-md-6">
              <input class="form-control" name="syarat_diskon" type="text" value="{{$data['syarat_diskon']}}">
            </div>
            <label class="col-md-2"> hari </label>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Diskon</label>
            <div class="col-md-6">
              <input class="form-control" name="diskon" type="text" value="{{$data['diskon']}}">
            </div>
            <label class="col-md-2"> % </label>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Jatuh Tempo</label>
            <div class="col-md-6">
              <input class="form-control" name="jatuh_tempo" type="text" value="{{$data['jatuh_tempo']}}">
            </div>
            <label class="col-md-2"> hari </label>
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