@extends('app')

@section('title')
    Gudang
@endsection

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li>{!!link_to('gudang','List')!!}</li>
            <li class="active">{!!link_to('gudang/create','Tambah')!!}</li>
            <li>{!!link_to('gudang/export','Export')!!}</li>
            <li>{!!link_to('gudang/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Edit gudang</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'gudang/update/'.$data['id'], 'class' => 'form-horizontal']) !!}
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
                        <label class="col-md-4 control-label">Nama Gudang</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Nama Gudang" name="nama" type="text" value="{{$data['nama']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Alamat</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Alamat" name="alamat" type="text" value="{{$data['alamat']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Kota</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Kota" name="kota" type="text" value="{{$data['kota']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Propinsi</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Propinsi" name="propinsi" type="text" value="{{$data['propinsi']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Negara</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Negara" name="negara" type="text" value="{{$data['negara']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Telepon 1</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Telepon 1" name="telepon1" type="text" value="{{$data['telepon1']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Telepon 2</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Telepon 2" name="telepon2" type="text"value="{{$data['telepon2']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Fax</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Fax" name="fax" type="text" value="{{$data['fax']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Penanggung Jawab</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Penanggung Jawab" name="penanggung_jawab" type="text" value="{{$data['penanggung_jawab']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Akun Persediaan</label>
                        <div class="col-md-6">
                            <select class="form-control" name="akun_persediaan">
                                @foreach($akun as $row)
                                    <option value="{{$row['no_akun']}}">
                                        {{$row['nama']}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Akun Retur Penjualan</label>
                        <div class="col-md-6">
                            <select class="form-control" name="akun_retur_penjualan">
                                @foreach($akun as $row)
                                    <option value="{{$row['no_akun']}}">
                                        {{$row['nama']}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Akun Diskon Penjualan</label>
                        <div class="col-md-6">
                            <select class="form-control" name="akun_diskon_penjualan">
                                @foreach($akun as $row)
                                    <option value="{{$row['no_akun']}}">
                                        {{$row['nama']}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Akun Barang Terkirim</label>
                        <div class="col-md-6">
                            <select class="form-control" name="akun_barang_terkirim">
                                @foreach($akun as $row)
                                    <option value="{{$row['no_akun']}}">
                                        {{$row['nama']}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Akun HPP</label>
                        <div class="col-md-6">
                            <select class="form-control" name="akun_hpp">
                                @foreach($akun as $row)
                                    <option value="{{$row['no_akun']}}">
                                        {{$row['nama']}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Akun Retur Pembelian</label>
                        <div class="col-md-6">
                            <select class="form-control" name="akun_retur_pembelian">
                                @foreach($akun as $row)
                                    <option value="{{$row['no_akun']}}">
                                        {{$row['nama']}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Akun Belum Tertagih</label>
                        <div class="col-md-6">
                            <select class="form-control" name="akun_belum_tertagih">
                                @foreach($akun as $row)
                                    <option value="{{$row['no_akun']}}">
                                        {{$row['nama']}}
                                    </option>
                                @endforeach
                            </select>
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