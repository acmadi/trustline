@extends('app')

@section('css')
  {!! HTML::style('css/bootstrap-datepicker.css') !!}
@endsection

@section('title')
  Form IA
@endsection

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li>{!!link_to('IA','List')!!}</li>
      <li class="active">{!!link_to('IA/create','Tambah')!!}</li>
      <li>{!!link_to('IA/export','Export')!!}</li>
      <li>{!!link_to('IA/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Form IA</div>
        <div class="panel-body">
          {!! Form::open(['url' => 'IA/store', 'class' => 'form-horizontal']) !!}
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
            <label class="col-md-2 control-label">No. IA</label>
            <div class="col-md-3">
              <input class="form-control" type="text" name="no_ia">
            </div>
            <label class="col-md-2 col-md-offset-2 control-label">Kode Akun</label>
            <div class="col-md-2">
              <select class="form-control" name="kode_akun">
                <option>kode akun 1</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Tanggal DO Ext.</label>
            <div class="col-md-3">
              <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="tanggal_do">
              <script>
                $.fn.datepicker.defaults.format = "yyyy-mm-dd";
                $('.datepicker').datepicker({
                  format: 'yyyy-mm-dd',
                  startDate: '-3d'
                })
              </script>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <table class="table table-bordered table-striped">
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Satuan</th>
                  <th>Kuantitas Gudang</th>
                  <th>Kuantitas Akhir</th>
                  <th>Serial Barang</th>
                  <th>Kadaluwarsa</th>
                  <th>Gudang</th>
                </tr>
              </table>
            </div>
          </div>
          <br>

          <div class="form-group">
            <div class="col-md-2 col-md-offset-2">
              <label class="control-label">Accounting</label>
            </div>
            <div class="col-md-2 col-md-offset-4">
              <label class="control-label">Kepala Gudang</label>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-5">
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