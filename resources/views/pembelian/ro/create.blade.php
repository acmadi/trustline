@extends('app')

@section('css')
  {!! HTML::style('css/bootstrap-datepicker.css') !!}
@endsection

@section('title')
  Form RO
@endsection

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li>{!!link_to('pembelian/ro','List')!!}</li>
      <li class="active">{!!link_to('pembelian/ro/create','Tambah')!!}</li>
      <li>{!!link_to('pembelian/ro/export','Export')!!}</li>
      <li>{!!link_to('pembelian/ro/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Form RO</div>
        <div class="panel-body">
          {!! Form::open(['url' => 'pembelian/ro/store', 'class' => 'form-horizontal']) !!}
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
                <label class="col-md-1 control-label">RO-{{$id}}</label>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">RO Date</label>
                <div class="col-md-7">
                  <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="tanggal">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Pemasok</label>
                <div class="col-md-7">
                  <select class="form-control" name="supplier_id" id="sup_id">
                    <option>pilih pemasok</option>
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
                <label class="col-md-4 control-label">Form No</label>
                <div class="col-md-7">
                  <input class="form-control" name="form_no">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Ship Date</label>
                <div class="col-md-7">
                  <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="ship_date">
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
                <label class="col-md-4 control-label">Description</label>
                <div class="col-md-7">
                  <textarea class="form-control" name="catatan"></textarea>
                </div>
              </div>
            </div>
          </div>
          <br />

          <div class="form-group">
            <label class="col-md-4 control-label">PO</label>
            <div class="col-md-4">
              <select class="form-control" id="po_id">
                @foreach ($po as $row)
                  <option value="{{$row['id']}}">PO-{{$row['id']}}</option>
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
                  <th class="text-center">Kuantitas</th>
                  <th class="text-center">Satuan</th>
                  <th class="text-center">Serial Barang</th>
                  <th class="text-center">Gudang</th>
                </tr>
              </table>
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
@endsection

@section('js')
  {!! HTML::script('js/bootstrap-datepicker.js') !!}
  <script>
    var iter = 0;
    function appendRow(barang_id = "", nama_barang="", kuantitas="", satuan="") {
      
      $("#tabelForm").append($("<tr />").append(
        $("<td />").append(
          $('<select class="form-control" name="poro['+ iter +'][received_item_id]" id="barang'+iter+'"/>')
            .append('<option value="'+iter+'">'+barang_id+' - '+nama_barang+'</option>')
        ),
        $("<td />").append('<input type="text" class="form-control" id="qty'+iter+'" name="poro['+ iter +'][kuantitas]" value="'+ kuantitas +'">'),
        $("<td />").append($('<input type="text" class="form-control" id="satuan'+ iter +'" readonly name="poro['+ iter +'][satuan]" value="'+ satuan +'">')
        ),
        $("<td />").append($('<input type="text" class="form-control" id="serial'+ iter +'" name="poro['+ iter +'][serial]">')
        ),
        $("<td />").append(
          $('<select class="form-control change'+iter+'" id="gudang'+iter+'" name="poro['+ iter +'][gudang]" />')
            .append('<option value="0">pilih gudang</option>')
            @foreach($gudang as $row)
               .append('<option value="{{$row['id']}}">{{$row['id'].' - '.$row['nama']}})</option>')
            @endforeach
        )
      

      ));
    
    iter++;
      
    }

    function setPo(po) {
      console.log(po);
      // alert(po.ordered_items[0].requested_item.barang.barang_id);

      var tr = $("#tabelForm tr");
      
      console.log('siap1');
      
      console.log(po.ordered_items.length);
      for (var i = po.ordered_items.length - 1; i >= 0; i--) {
        var barang_id = po.ordered_items[i].requested_item.barang.id;
        var nama_barang = po.ordered_items[i].requested_item.barang.nama;
        var kuantitas = po.ordered_items[i].kuantitas;
        var satuan = po.ordered_items[i].requested_item.barang.satuan;
        
        // var serial = po.ordered_items[i].requested_item.barang.nama;
        // var kadaluwarsa = po.ordered_items[i].requested_item.barang.nama;
        appendRow(barang_id, nama_barang, kuantitas, satuan);
      };
    }
    function getPo(id) {
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "{{url('pembelian/ro/pojson/')}}/" + id,
        success: function(data){
          setPo(data);
        },
        error: function() {
          alert('unable to fetch data via ajax');
        }
      });
    }
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
    $(document).ready(function(){
      // appendRow();
      $("#sup_id").change(function() {
        getAlamat($("#sup_id").val());

      });
      $(".btn-tambah").click(function() {
        // appendRow();
        getPo($("#po_id").val());
      });
    });
  </script>
@endsection