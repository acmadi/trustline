@extends('app')

@section('title')
    Barang
@endsection

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li>{!!link_to('barang','List')!!}</li>
            <li class="active">{!!link_to('barang/create','Tambah')!!}</li>
            <li>{!!link_to('barang/export','Export')!!}</li>
            <li>{!!link_to('barang/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Masukkan data barang</div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'barang/store','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
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
                        <label class="col-md-4 control-label">Kode Barang</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Kode Barang" name="id" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Tipe Barang</label>
                        <div class="col-md-6">
                            <select class="form-control" name="tipebarang">
                                <option value="bahan baku">Bahan baku</option>
                                <option value="barang dalam proses">Barang dalam proses</option>
                                <option value="barang jadi">Barang jadi</option>
                                <option value="servis">Servis</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Barkode Barang</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Barkode Barang" name="barkode" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nama Barang</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Nama Barang" name="nama" type="text">
                        </div>
                    </div>
                    <div class="form-group"> <!--hidden-->
                        <label class="col-md-4 control-label">Satuan</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Satuan" name="satuan" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Kontrol Satuan</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Kontrol Satuan" name="kontrol_satuan" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Kontrol Kuantitas</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Kontrol Kuantitas" name="kontrol_kuantitas" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Harga Jual 1</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Harga Jual 1" name="harga_jual1" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Harga Jual 2</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Harga Jual 2" name="harga_jual2" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Harga Jual 3</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Harga Jual 3" name="harga_jual3" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Harga Jual 4</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Harga Jual 4" name="harga_jual4" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Harga Jual 5</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Harga Jual 5" name="harga_jual5" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Saldo Minimum</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Saldo Minimum" name="saldo_minimum" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Status</label>
                        <div class="col-md-6">
                            <label class="radio-inline">
                                <input type="radio" name="status" value="aktif">aktif
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" value="non aktif">non aktif
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Catatan</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Catatan" name="catatan" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Gambar</label>
                        <div class="col-md-6">
                            <input class="form-control" name="gambar" type="file">
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