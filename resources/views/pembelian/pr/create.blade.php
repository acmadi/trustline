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
    Permintaan Barang
@endsection

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li>{!!link_to('pembelian/pr','List')!!}</li>
            <li class="active">{!!link_to('pembelian/pr/create','Tambah')!!}</li>
            <li>{!!link_to('pembelian/pr/export','Export')!!}</li>
            <li>{!!link_to('pembelian/pr/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Form Permintaan Barang</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'pembelian/pr/store', 'class' => 'form-horizontal']) !!}
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
                        <label class="col-md-2 control-label">Tanggal Permintaan</label>
                        <div class="col-md-3">
                            <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="tanggal" value="{{Form::old('tanggal')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="catatan">{{Form::old('catatan')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <table class="table table-striped" id="tabelForm">
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Kuantitas</th>
                                    <th>Satuan</th>
                                    <th>Tanggal dibutuhkan</th>
                                    <th>Notes</th>
                                    <th class="text-center"><button type="button" class="btn btn-sm btn-default btn-tambah glyphicon glyphicon-plus"></button></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    {{Form::old('barpo')}}
                    <div class="form-group">
                        <div class="col-md-offset-10 col-md-2">
                            <button type="submit" class="btn btn-primary btn-block">
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
    <script id="jsource" type="text/javascript">
        var iter = 0;
        function appendRow() {
            $("#tabelForm").append($("<tr />").append(
                $("<td />").append(
                    $('<select class="form-control" name="barpo['+ iter +'][barang_id]" />')
                        @foreach($barang as $row)
                        .append('<option value="{{$row['id']}}">{{$row['id'].' - '.$row['nama']}}</option>')
                        @endforeach
                ),
                $("<td />").append('<input type="text" class="form-control qty" name="barpo['+ iter +'][kuantitas]">'),
                $("<td />").append($('<select class="form-control" name="barpo['+iter+'][satuan]" />')
                    .append(
                        '<option value="satuan">Satuan</option>',
                        '<option value="kontrol satuan">Kontrol Satuan</option>'
                    )
                ),
                $("<td />").append('<input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="barpo['+ iter +'][tanggal_butuh]">'),
                $("<td />").append('<input type="text" class="form-control" name="barpo['+ iter +'][catatan]">'),
                $("<td />").append('<button type="button" class="btn btn-sm btn-danger delete-column glyphicon glyphicon-remove"></button>').click(function() {
                    $(this).parent().remove();
                })
            ));
            iter = iter+1;
        }
        $(".btn-tambah").click(function() {
            appendRow();
        });
        $(document).ready(function(){
            // appendRow();
        });
    </script>
@endsection