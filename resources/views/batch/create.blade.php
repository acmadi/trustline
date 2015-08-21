@extends('app')

@section('css')
  {!! HTML::style('css/bootstrap-datepicker.css') !!}
@endsection

@section('title')
  Batch SN
@endsection

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li>{!!link_to('batch','List')!!}</li>
      <li class="active">{!!link_to('batch/create','Tambah')!!}</li>
      <li>{!!link_to('batch/export','Export')!!}</li>
      <li>{!!link_to('batch/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Serial Barang</div>
        <div class="panel-body">
          {!! Form::open(['url' => 'batch/store', 'class' => 'form-horizontal']) !!}
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
            <label class="col-md-4 control-label">Nomor Seri</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="xxxxxxxxxxxx" name="serial" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Kode Barang</label>
            <div class="col-md-6">
              <select class="form-control" name="barang_id">
                @foreach ($barang as $row)
                  <option value="{{$row['barang_id']}}">{{$row['barang_id']." - ".$row['nama_barang']}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Tanggal Kadaluarsa</label>
            <div class="col-md-6">
              <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="kadaluwarsa">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Volume (cc)</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="600" name="volume" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Berat (Kg)</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="1.5" name="berat" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Gambar</label>
            <div class="col-md-6">
              <input type="file" name="gambar">
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

@section('js')
  {!! HTML::script('js/bootstrap-datepicker.js') !!}
@endsection