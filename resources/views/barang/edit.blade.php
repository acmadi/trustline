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
                <div class="panel-heading">Ubah Data Barang</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'barang/update/'.$data['id'], 'class' => 'form-horizontal']) !!}
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
                        <label class="col-md-4 control-label">Tipe Barang</label>
                        <div class="col-md-6">
                            <select class="form-control" name="tipebarang_tipebarang">
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
                            <input class="form-control" placeholder="Barkode Barang" name="barkode" type="text" value="{{$data['barkode']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nama Barang</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Nama Barang" name="nama" type="text" value="{{$data['nama']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Satuan</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Satuan" name="satuan" type="text" value="{{$data['satuan']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Kontrol Satuan</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Kontrol Satuan" name="kontrol_satuan" type="text" value="{{$data['kontrol_satuan']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Harga Jual 1</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Harga Jual 1" name="harga_jual1" type="text" value="{{$data['harga_jual1']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Harga Jual 2</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Harga Jual 2" name="harga_jual2" type="text" value="{{$data['harga_jual2']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Harga Jual 3</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Harga Jual 3" name="harga_jual3" type="text" value="{{$data['harga_jual3']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Harga Jual 4</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Harga Jual 4" name="harga_jual4" type="text" value="{{$data['harga_jual4']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Harga Jual 5</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Harga Jual 5" name="harga_jual5" type="text" value="{{$data['harga_jual5']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Saldo Minimum</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Saldo Minimum" name="saldo_minimum" type="text" value="{{$data['saldo_minimum']}}">
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
                            <input class="form-control" placeholder="Catatan" name="catatan" type="text" value="{{$data['catatan']}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Modify
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection