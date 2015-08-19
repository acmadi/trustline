@extends('app')

@section('css')
    {!! HTML::style('css/bootstrap-datepicker.css') !!}
    <style type="text/css" media="screen">
        td input.qty {
            max-width: 120px;
        }
    </style>
@endsection

@section('title')
    Proyek
@endsection

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li>{!!link_to('proyek','List')!!}</li>
            <li class="active">{!!link_to('proyek/create','Tambah')!!}</li>
            <li>{!!link_to('proyek/export','Export')!!}</li>
            <li>{!!link_to('proyek/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Masukkan data Proyek</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'proyek/store', 'class' => 'form-horizontal']) !!}
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
                        <label class="col-md-4 control-label">No. Proyek</label>
                        <div class="col-md-6">
                            <input class="form-control" name="id" type="text">
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nama Proyek</label>
                        <div class="col-md-6">
                            <input class="form-control" name="nama" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Deskripsi</label>
                        <div class="col-md-6">
                            <input class="form-control" name="deskripsi" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Kontak</label>
                        <div class="col-md-6">
                            <input class="form-control" name="kontak" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Manajer</label>
                        <div class="col-md-6">
                            <input class="form-control" name="manajer" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Tanggal Mulai</label>
                        <div class="col-md-6">
                            <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="tanggal_mulai" value="{{Form::old('tanggal')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Tanggal Selesai</label>
                        <div class="col-md-6">
                            <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="tanggal_selesai" value="{{Form::old('tanggal')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Komplit (%)</label>
                        <div class="col-md-6">
                            <input class="form-control" name="komplit" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Pelanggan</label>
                        <div class="col-md-6">
                            <input class="form-control" name="pelanggan" type="text">
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