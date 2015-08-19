@extends('app')

@section('title')
    Mata Uang
@endsection

@section('css')
    {!! HTML::style('css/bootstrap-datepicker.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daily Currencies
                </div>
                <div class="panel-body">
                    @if ($mata_uangs->count() == 0)
                        Tidak ada mata uang.
                    @else
                        <form action="#" class="form-horizontal" method="post">
                            @for ($i=0,$m=$mata_uangs->get($i);$i<$mata_uangs->count();$i++,$m=$mata_uangs->get($i))
                                <div class="form-group" id="{{$m->simbol}}">
                                    <input type="text" class="hidden" value="{{$m->simbol}}" name="kurs[{{$i}}][mata_uang]">
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-addon">{{$m->simbol}}</span>
                                            <input type="text" class="form-control" name="kurs[{{$i}}][nilai]" value="1">
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label class="control-label">=</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-addon">{{$default_mata_uang}}</span>
                                            <input type="text" class="form-control" name="kurs[{{$i}}][nilai_default]" value="1">
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            <hr>
                            <div class="form-group">
                                <div class="col-md-1"></div>
                                <label class="col-md-3 control-label">Tanggal</label>
                                <div class="col-md-4">
                                    <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="tanggal" id="tanggal">
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br>
@endsection

@section('js')
    {!! HTML::script('js/bootstrap-datepicker.js') !!}
@endsection