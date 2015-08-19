@extends('app')

@section('css')
    {!! HTML::style('css/bootstrap-datepicker.css') !!}
    <style type="text/css" media="screen">
        td input.qty {
            max-width: 120px;
        }
        td .amount {
            min-width: 100px;
        }
    </style>
@endsection

@section('title')
    Form ReturPembelian
@endsection

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li>{!!link_to('pembelian/pt','List')!!}</li>
            <li class="active">{!!link_to('pembelian/pt/create','Tambah')!!}</li>
            <li>{!!link_to('pembelian/pt/export','Export')!!}</li>
            <li>{!!link_to('pembelian/pt/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Form Retur Pembelian</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'pembelian/pt/store', 'class' => 'form-horizontal']) !!}
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
                                <label class="col-md-1 control-label">PT-</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">PT Date</label>
                                <div class="col-md-7">
                                    <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Pemasok</label>
                                <div class="col-md-7">
                                    <select class="form-control" name="supplier_id" id="sup_id">
                                        <option>Pilih Pemasok</option>
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
                            <div class="form-group">
                                <input class="col-md-1" type="checkbox" id="kena_pajak"> Kena Pajak
                            </div>
                        </div>
                    </div>
                    <br />

                    <div class="form-group">
                        <label class="col-md-4 control-label">PI</label>
                        <div class="col-md-4">
                            <select class="form-control" id="pr_id">

                                    <option value="{{$row['id']}}">PI-</option>

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
                                    <th class="text-center">Tax</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Gudang</th>
                                    <th class="text-center">Dept</th>
                                    <th class="text-center">Kontrol Kuantitas</th>
                                    <th class="text-center">SN</th>
                                    <th class="text-center"><button type="button" class="btn btn-sm btn-default btn-tambah glyphicon glyphicon-plus disabled hidden"></button></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br />

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-7">
                                    <textarea class="form-control" name="catatan"></textarea>
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
                                <div class="col-md-5">
                                    <label class="control-label">Total Return:</label>
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
//         var iter = 0;
//         function appendRow(pivot_id = "", barang_id = "", nama = "", kuantitas = "", total = "") {
//             $("#tabelForm").append($("<tr />").append(
//                 $("<td />").append(
//                     $('<select class="form-control" name="popr['+ iter +'][requested_item_id]" id="barang'+iter+'"/>')
//                         .append('<option value="'+pivot_id+'">'+barang_id+' - '+nama+'</option>')
//                 ),
//                 $("<td />").append('<input type="text" class="form-control change'+iter+'" id="qty'+iter+'" name="popr['+ iter +'][kuantitas]" value="'+ total +'">'),
//                 $("<td />").append($('<select class="form-control" />')
//                     .append('<option value="1">Satuan</option>')
//                 ),
//                 $("<td />").append('<input type="text" class="form-control change'+iter+'" id="prc'+iter+'" name="popr['+ iter +'][price]">'),
//                 $("<td />").append('<input type="text" class="form-control change'+iter+'" id="disc'+iter+'" name="popr['+ iter +'][discount]">'),
//                 $("<td />").append(
//                         $('<select class="form-control change'+iter+'" id="tax'+iter+'" name="popr['+ iter +'][tax]" />')
//                                 .append('<option value="0">0</option>')
//                                 @foreach($pajak as $row)
//                                 .append('<option value="{{$row['id']}}">{{$row['nama'].'('.$row['nilai']}}%)</option>')
//                         @endforeach
//                 ),
//                 $("<td />").append('<p class="amount text-center" id="v_amount'+iter+'"><strong>0</strong></p>'),
//                 $("<td />").append('<input type="text" class="form-control hidden" readonly name="popr['+ iter +'][amount]" id="amount'+iter+'"/>'),
//                 $("<td />").append('<button type="button" class="btn btn-sm btn-danger delete-column glyphicon glyphicon-remove"></button>').click(function() {
//                     $(this).parent().remove();
//                 })
//             ));

//             $(".change"+iter).change(function(){
// //                alert("#amount"+($(this).attr('id')).match(/\d/g));
//                 var x = (($(this).attr('id')).match(/\d/g));
//                 $("#amount"+x).val(($("#qty"+x).val())*($("#prc"+x).val())*(((100-$("#disc"+x).val()+parseFloat($("#tax"+x+" option:selected").text().match(/\d/g))*10))/100));
// //                alert($(this).attr('id'));
//                 $("#v_amount"+x).text(($("#qty"+x).val())*($("#prc"+x).val())*(((100-$("#disc"+x).val()+parseFloat($("#tax"+x+" option:selected").text().match(/\d/g))*10))/100));
//             });

//             $("#subtotal").click(function(){
//                 var sub = 0;
//                 var count;
//                 for (count = 0 ; count<iter ; count++ )
//                 {
//                     sub += parseFloat($("#amount"+count).val());
//                 }
//                 $("#subtotal").val(sub);
//             });

//             $("#final_disc").change(function(){
//                 var x = parseFloat($("#subtotal").val());
//                 var y = parseFloat($("#final_disc").val());
//                 $("#subtotal_no_ef").val(x*(100-y)/100);
// //                $("subtotal_no_ef").val($("subtotal").val()*((100-(this).val())/100));
//             });

//             $("#freight").change(function(){
//                 var x = parseFloat($("#subtotal_no_ef").val());
//                 var y = parseFloat($("#freight").val());
//                $("#total_order").val(x+y);
//             });

//             iter++;
//         }

//         function setBarang(data) {
//             var tr = $("#tabelForm tr");
//             for (var i = tr.length - 1; i >= 1; i--) {
//                 tr[i].remove();
//             };
//             for (var i = data.length - 1; i >= 0; i--) {
//                 var pivot_id = data[i].pivot.id;
//                 var nama = data[i].nama;
//                 var barang_id = data[i].pivot.barang_id;
//                 var kuantitas = data[i].pivot.kuantitas;
//                 var kuantitas_ordered = data[i].pivot.kuantitas_ordered;
//                 var total = kuantitas - kuantitas_ordered;
//                 appendRow(pivot_id, barang_id, nama, kuantitas, total);
//             };
//         }
        function setAlamat(data) {
            var alamat = $("#alamat_pemasok");
            alamat.html(data);
        }
//         function getBarang(id) {
//             $.ajax({
//                 type: "GET",
//                 dataType: "json",
//                 url: "{{url('pembelian/po/prjson/')}}/" + id,
//                 success: function(data){
//                     setBarang(data);
//                 },
//                 error: function() {
//                     alert('unable to fetch data via ajax');
//                 }
//             });
//         }
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
        $(document).ready(function(){
//             // appendRow();
            $("#sup_id").change(function() {
                getAlamat($("#sup_id").val());
//                  alert('asd');
            });
            $("#kena_pajak").checked(){
                alert('asd');
            }
//             $(".btn-tambah").click(function() {
//                 // appendRow();
//                 getBarang($("#pr_id").val());
//             });

        });
    </script>
@endsection