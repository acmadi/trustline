@extends('app')

@section('css')
  {!! HTML::style('css/bootstrap-datepicker.css') !!}
@endsection

@section('title')
  Multi Saldo Awal
@endsection

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li>{!!link_to('saldo','List')!!}</li>
      <li class="active">{!!link_to('saldo/create','Tambah')!!}</li>
      <li>{!!link_to('saldo/export','Export')!!}</li>
      <li>{!!link_to('saldo/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Multi Saldo Awal</div>
        <div class="panel-body">
          {!! Form::open(['url' => 'saldo/update/'.$data['id'], 'class' => 'form-horizontal']) !!}
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
            <label class="col-md-4 control-label">Kode Gudang</label>
            <div class="col-md-6">
              <select class="form-control" name="gudang_id" value="{{$data['gudang_id']}}">
                @foreach ($gudang as $row)
                  <option value="{{$row['id']}}">{{$row['id']}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Tanggal</label>
            <div class="col-md-6">
              <input data-provide="datepicker" class="datepicker form-control" value="{{$data['tanggal']}}" placeholder="2017-12-31" name="tanggal">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Nomor Bukti</label>
            <div class="col-md-6">
              <input class="form-control" value="{{$data['nomor_bukti']}}" placeholder="xxxxxxx" name="nomor_bukti" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Kuantitas Awal</label>
            <div class="col-md-6">
              <input class="form-control" type="text" value="{{$data['kuantitas']}}" placeholder="000" name="kuantitas">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">HPP/Satuan Awal</label>
            <div class="col-md-6">
              <input class="form-control" type="text" value="{{$data['hpp_satuan']}}" placeholder="000" name="hpp_satuan">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Serial Barang</label>
            <div class="col-md-6">
              <label class="radio-inline">
                <input type="radio" name="pilihan" value="lama">Lama
              </label>
              <br>
              <label class="control-label">Kode Serial</label>
              <select class="form-control" name="serial" value="{{$data['batch_id']}}">
                @foreach ($batch as $row)
                  <option value="{{$row['id']}}">{{$row['id']." - ".$row['serial']}}</option>
                @endforeach
              </select>
              <label class="radio-inline">
                <input type="radio" name="pilihan" value="baru">Baru
              </label>
              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label">Kode Barang</label>
                  <select class="form-control" name="barang_id">
                    @foreach ($barang as $row)
                      <option value="{{$row['id']}}">{{$row['id']." - ".$row['nama']}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label">Nomor Seri</label>
                  <input class="form-control" placeholder="xxxxxxxxxxxx" name="serial" type="text">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label">Volume (cc)</label>
                  <input class="form-control" placeholder="cc" name="volume" type="text">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label">Berat (Kg)</label>
                  <input class="form-control" placeholder="kg" name="berat" type="text">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label">Tanggal Kadaluwarsa</label>
                  <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="kadaluwarsa">
                </div>
              </div>

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