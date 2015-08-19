@extends('app')

@section('title')
    Mata Uang
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Currency
                    <button class="btn btn-default btn-xs pull-right" type="button" data-toggle="modal" data-target="#newCurrency">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                    <div class="modal fade" id="newCurrency" role="dialog" aria-hidden="true">
                        <form method="post" class="form-horizontal">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="newCurrencyLabel">Buat Currency</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Simbol</label>
                                            <div class="col-md-5">
                                                <input class="form-control" name="simbol">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Nama Mata Uang</label>
                                            <div class="col-md-5">
                                                <input class="form-control" name="nama">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Negara</label>
                                            <div class="col-md-5">
                                                <input class="form-control" name="negara">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table text-center">
                    <tr>
                        <th class="text-center">Simbol</th>
                        <th class="text-center">Mata Uang</th>
                        <th class="text-center">Negara</th>
                        <th class="text-center">Pilihan</th>
                    </tr>
                    @foreach ($mata_uangs as $m)
                        <tr>
                            <td>{{$m->simbol}}</td>
                            <td>{{$m->nama}}</td>
                            <td>{{$m->negara}}</td>
                            <td>
                                {!!link_to('currency/edit/'.$m->id, 'edit', ['class' => 'btn btn-primary btn-sm'])!!}
                                {!!link_to('currency/destroy/'.$m->id, 'delete', ['class' => 'btn btn-danger btn-sm'])!!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection