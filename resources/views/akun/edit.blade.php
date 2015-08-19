@extends('app')

@section('css')
    {!! HTML::style('css/bootstrap-datepicker.css') !!}
@endsection

@section('title')
    Akun
@endsection

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li>{!!link_to('akun','List')!!}</li>
            <li class="active">{!!link_to('akun/create','Tambah')!!}</li>
            <li>{!!link_to('akun/export','Export')!!}</li>
            <li>{!!link_to('akun/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Akun Baru</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'akun/update/'.$data['no_akun'], 'class' => 'form-horizontal']) !!}
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
                        <label class="col-md-4 control-label">No Akun</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="1.11.100.1001" name="no_akun" type="text" value="{{$data['no_akun']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nama</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Name" name="nama" type="text" value="{{$data['nama']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Tipe Akun</label>
                        <div class="col-md-6">
                            <select class="form-control" name="id_tipeakun">
                                @foreach($tipeakuns as $tipeakun)
                                <option value="{{$tipeakun['id']}}">
                                    {{$tipeakun['nama']}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Mata Uang</label>
                        <div class="col-md-6">
                            <select class="form-control" name="mata_uang">
                                @foreach($currencies as $MataUang)
                                <option value="{{$MataUang['simbol']}}"
                                    @if($data['mata_uang'] == $MataUang['simbol'])
                                        selected
                                    @endif 
                                >
                                    {{$MataUang['simbol']}} - {{$MataUang['nama']}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Saldo Awal</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="0" name="saldo_awal" type="text" value="{{$data['saldo_awal']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Tanggal</label>
                        <div class="col-md-6">
                            {{-- <input class="form-control" placeholder="2012-12-31" name="tanggal" type="date"> --}}
                            <input data-provide="datepicker" class="datepicker form-control" placeholder="2012-12-31" name="tanggal" value="{{$data['tanggal']}}">
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