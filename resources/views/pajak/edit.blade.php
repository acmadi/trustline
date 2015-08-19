@extends('app')

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li>{!!link_to('pajak','List')!!}</li>
            <li class="active">{!!link_to('pajak/create','Tambah')!!}</li>
            <li>{!!link_to('pajak/export','Export')!!}</li>
            <li>{!!link_to('pajak/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Data Pajak</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'pajak/update/'.$data['id'], 'class' => 'form-horizontal']) !!}
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
                        <label class="col-md-4 control-label">Nama</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Nama" name="nama" type="text" value="{{$data['nama']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nilai</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Nilai" name="nilai" type="text" value="{{$data['nilai']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Keterangan</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Keterangan" name="keterangan" type="text" value="{{$data['keterangan']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Akun Pajak Penjualan</label>
                        <div class="col-md-6">
                            <select class="form-control" name="akun_pajak_penjualan" value="{{$data['akun_pajak_penjualan']}}">
                                @foreach($akun as $row)
                                    <option value="{{$row['no_akun']}}">{{$row['nama']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Akun Pajak Pembelian</label>
                        <div class="col-md-6">
                            <select class="form-control" name="akun_pajak_pembelian" value="{{$data['akun_pajak_pembelian']}}">
                                @foreach($akun as $row)
                                    <option value="{{$row['no_akun']}}">{{$row['nama']}}</option>
                                @endforeach
                            </select>
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