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
    Faktur Pembelian
@endsection

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li>{!!link_to('pembelian/pi','List')!!}</li>
            <li class="active">{!!link_to('pembelian/pi/create','Tambah')!!}</li>
            <li>{!!link_to('pembelian/pi/export','Export')!!}</li>
            <li>{!!link_to('pembelian/pi/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Form Faktur Pembelian</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'pembelian/pi/store', 'class' => 'form-horizontal']) !!}
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">ID</label>
                                <label class="col-md-1 control-label">PI-{{$id}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Invoice Date</label>
                                <div class="col-md-7">
                                    <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Vendor</label>
                                <div class="col-md-7">
                                    <select class="form-control" name="supplier_id" id="sup_id">
                                        <option>Pilih Vendor</option>
                                        @foreach($supplier as $row)
                                            <option value="{{$row['id']}}">{{$row['id'].' - '.$row['nama']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" title="alamat pemasok">Alamat</label>
                                <div class="col-md-7">
                                    <textarea id="alamat_pemasok" class="form-control" readonly></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Form No.</label>
                                <div class="col-md-7">
                                    <input class="form-control" name="ship_to">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Ship Date</label>
                                <div class="col-md-7">
                                    <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="expected_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">FOB</label>
                                <div class="col-md-7">
                                    <select class="form-control" name="fob">
                                        <option value="Shipping Point">Shipping Point</option>
                                        <option value="Destination">Destination</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Terms</label>
                                <div class="col-md-7">
                                    <select class="form-control" name="syaratpembayaran_id">
                                        @foreach($terms as $row)
                                            <option value="{{$row['id']}}">{{$row['nama']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />

                    <div class="form-group">
                        <label class="col-md-4 control-label">Pilih Pesanan</label>
                        <div class="col-md-4">
                            <select class="form-control" id="pr_id">
                                @foreach($pr as $row)
                                    <option value="{{$row['id']}}">PR-{{$row['id']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-info btn-tambah btn-block">
                                Tambah
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <table class="table table-striped" id="tabelForm">
                                <tr>
                                    <th class="text-center">Kode Barang</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Satuan</th>
                                    <th class="text-center">Unit Price</th>
                                    <th class="text-center">Disc %</th>
                                    <th class="text-center">Tax</th>
                                    <th class="text-center">Amount</th><th class="text-center"><button type="button" class="btn btn-sm btn-default btn-tambah glyphicon glyphicon-plus disabled hidden"></button></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br />

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">No FP Std</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-7">
                                    <textarea class="form-control" name="catatan"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Akun DP</label>
                                <div class="col-md-7">
                                    <select class="form-control" name="fob">
                                        @foreach($akun as $row)
                                            <option value="{{$row['no_akun']}}">{{$row['nama']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label">Sub Total:</label>
                                </div>
                                <div class="col-md-5">
                                    <input class="form-control" type="text" readonly id="subtotal">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label">Discount:</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="final_disc">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                                <div class="col-md-1 text-center">
                                    <label class="control-label">=</label>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" class="form-control" id="subtotal_no_ef" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5">
                                    <label class="control-label">Total:</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="total_order" readonly id="total_order">
                                </div>
                            </div>
                        </div>
                    </div>
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

    </div>
@endsection

@section('js')
    {!! HTML::script('js/bootstrap-datepicker.js') !!}
    <script id="jsource" type="text/javascript">
        {{--var iter = 0;--}}
        {{--function appendRow() {--}}
            {{--$("#tabelForm").append($("<tr />").append(--}}
                {{--$("<td />").append(--}}
                    {{--$('<select class="form-control" name="barpo['+ iter +'][barang_id]" />')--}}
                        {{--@foreach($barang as $row)--}}
                        {{--.append('<option value="{{$row['id']}}">{{$row['id'].' - '.$row['nama']}}</option>')--}}
                        {{--@endforeach--}}
                {{--),--}}
                {{--$("<td />").append('<input type="text" class="form-control qty" name="barpo['+ iter +'][kuantitas]">'),--}}
                {{--$("<td />").append($('<select class="form-control" />')--}}
                    {{--.append(--}}
                        {{--'<option value="1">Satuan</option>',--}}
                        {{--'<option value="1">Kontrol Satuan</option>'--}}
                    {{--)--}}
                {{--),--}}
                {{--$("<td />").append('<input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="barpo['+ iter +'][tanggal_butuh]">'),--}}
                {{--$("<td />").append('<input type="text" class="form-control" name="barpo['+ iter +'][catatan]">'),--}}
                {{--$("<td />").append('<button type="button" class="btn btn-sm btn-danger delete-column glyphicon glyphicon-remove"></button>').click(function() {--}}
                    {{--$(this).parent().remove();--}}
                {{--})--}}
            {{--));--}}
            {{--iter = iter+1;--}}
        {{--}--}}

        $(".btn-tambah").click(function() {
            appendRow();
        });

        $(document).ready(function(){
            // appendRow();
        });

        function setAlamat(data) {
            var alamat = $("#alamat_pemasok");
            alamat.html(data);
        }

        function getAlamat(id) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{url('pembelian/po/alamatjson/')}}/" + id,
                success: function(data){
                    setAlamat(data);
                },
                error: function() {
                    alert('unable to fetch data via ajax');
                }
            });
        }

        $(document).ready(function() {
            // appendRow();
            $("#sup_id").change(function () {
                getAlamat($("#sup_id").val());
//                  alert('asd');
            });
        });
    </script>
@endsection