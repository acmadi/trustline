@extends('app')

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li>{!!link_to('tipeakun','List')!!}</li>
            <li>{!!link_to('tipeakun/create','Tambah')!!}</li>
            <li>{!!link_to('tipeakun/export','Export')!!}</li>
            <li>{!!link_to('tipeakun/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah data sales {{$data['karyawan']['nama']}}</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'sales/update/' . $data['id'], 'class' => 'form-horizontal']) !!}
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
                    <div class="form-group hidden">
                        <label class="col-md-4 control-label">Karyawan</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="---" name="id_karyawan" type="text" value="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Target1</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Target" name="target1" type="text" value="{{$data['target1']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Komisi1</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Komisi" name="komisi1" type="text" value="{{$data['komisi1']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Target2</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Target" name="target2" type="text" value="{{$data['target2']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Komisi2</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Komisi" name="komisi2" type="text" value="{{$data['komisi2']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Target3</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Target" name="target3" type="text" value="{{$data['target3']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Komisi3</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Komisi" name="komisi3" type="text" value="{{$data['komisi3']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Target4</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Target" name="target4" type="text" value="{{$data['target4']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Komisi4</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Komisi" name="komisi4" type="text" value="{{$data['komisi4']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Status</label>
                        <div class="col-md-6">
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions2" id="inlineRadio3" value="aktif">aktif
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions2" id="inlineRadio4" value="non_aktif">non aktif
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-success">
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