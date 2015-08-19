@extends('app')

@section('css')
    {!! HTML::style('css/bootstrap-datepicker.css') !!}
@endsection

@section('title')
    Form DO
@endsection

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li>{!!link_to('DO','List')!!}</li>
            <li class="active">{!!link_to('DO/create','Tambah')!!}</li>
            <li>{!!link_to('DO/export','Export')!!}</li>
            <li>{!!link_to('DO/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Form DO</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'DO/store', 'class' => 'form-horizontal']) !!}
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
                        <label class="col-md-2 control-label">Kode Pelanggan</label>
                        <div class="col-md-3">
                            <select class="form-control" name="kode_supplier">
                                <option value="1">pelanggan 1</option>
                            </select>
                        </div>
                        <label class="col-md-2 col-md-offset-2 control-label">Tanggal</label>
                        <div class="col-md-2">
                            <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="tanggal">
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
                        <label class="col-md-2 control-label">Nama Pelanggan</label>
                        <div class="col-md-3">
                            <input class="form-control" name="nama_supplier" type="text">
                        </div>
                        <label class="col-md-2 col-md-offset-2 control-label">Nomor DO</label>
                        <div class="col-md-2">
                            <input class="form-control" type="text" name="nomor_RO">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Alamat Pelanggan</label>
                        <div class="col-md-3">
                            <input class="form-control" name="alamat_supplier" type="text">
                        </div>
                        <label class="col-md-2 col-md-offset-2 control-label">Nomor SO</label>
                        <div class="col-md-2">
                            <select class="form-control" name="nomor_po">
                                <option value="1"> nomor so 1   </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nomor DO Ext.</label>
                        <div class="col-md-3">
                            <input class="form-control" name="nomor_do" type="text">
                        </div>
                        <label class="col-md-2 col-md-offset-2 control-label">Nomor SI</label>
                        <div class="col-md-2">
                            <input class="form-control" type="text" name="nomor_pi">
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
                        <label class="col-md-2 col-md-offset-2 control-label">Tanggal SI</label>
                        <div class="col-md-2">
                            <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="tanggal_pi">
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
                        <label class="col-md-2 control-label">Nomor PO Ext.</label>
                        <div class="col-md-3">
                            <input class="form-control" name="nomor_pi" type="text">
                        </div>
                        <label class="col-md-2 col-md-offset-2 control-label">FOB</label>
                        <div class="col-md-2">
                            <select class="form-control" name="fob">
                                <option value="1">jalan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Tanggal PO Ext.</label>
                        <div class="col-md-3">
                            <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="tanggal_pi">
                            <script>
                                $.fn.datepicker.defaults.format = "yyyy-mm-dd";
                                $('.datepicker').datepicker({
                                    format: 'yyyy-mm-dd',
                                    startDate: '-3d'
                                })
                            </script>
                        </div>
                        <label class="col-md-2 col-md-offset-2 control-label">Ship via</label>
                        <div class="col-md-2">
                            <input class="form-control" type="text" name="shib_via">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-7 control-label">Pengirim</label>
                        <div class="col-md-2">
                            <select class="form-control" name="pengirim">
                                <option>pengirim 1</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kuantitas</th>
                                    <th>Satuan</th>
                                    <th>Serial Barang</th>
                                    <th>Kadaluwarsa</th>
                                    <th>Gudang</th>
                                </tr>
                            </table>
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