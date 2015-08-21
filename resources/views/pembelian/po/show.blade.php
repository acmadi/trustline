@extends('app')

@section('title')
  Barang
@endsection

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li>{!!link_to('pembelian/po','List')!!}</li>
      <li>{!!link_to('pembelian/po/create','Tambah')!!}</li>
      <li>{!!link_to('pembelian/po/export','Export')!!}</li>
      <li>{!!link_to('pembelian/po/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-offset-1 col-md-10">
      <div class="panel panel-default">
        <div class="panel-heading">Detail Pesanan Pembelian</div>
        <div class="panel-body">
          @if(sizeof($po))
            <div class="row col-md-12">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-md-5 control-label">ID </label>
                  <div class="col-md-5">
                    <label class="control-label">PO-{{$po->id}}</label>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-md-5 control-label">Tanggal </label>
                  <div class="col-md-5">
                    <label class="control-label">{{$po->tanggal}}</label>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-md-5 control-label">Pemasok </label>
                  <div class="col-md-5">
                    <label class="control-label">{{$po->supplier->nama}}</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-md-5 control-label">Expected Date </label>
                  <div class="col-md-2">
                    <label class="control-label">{{$po->expected_date}}</label>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-md-5 control-label">FOB </label>
                  <div class="col-md-5">
                    <label class="control-label">{{$po->fob}}</label>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-md-5 control-label">Terms </label>
                  <div class="col-md-5">
                    <label class="control-label">{{$po->term->nama}}</label>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-md-5 control-label">Ship to </label>
                  <div class="col-md-2">
                    <label class="control-label">{{$po->ship_to}}</label>
                  </div>
                </div>
              </div>
                <table class="table table-hover">
                  <tr>
                    <th class="text-center">Kode Barang</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Satuan</th>
                    <th class="text-center">Unit Price</th>
                    <th class="text-center">Disc %</th>
                    <th class="text-center">Tax</th>
                    <th class="text-center">Amount</th>
                  </tr>
                  @foreach($po->orderedItems as $data)
                    <tr>
                      <td class="text-center">{{$data->requestedItem->barang->id}}</td>
                      <td class="text-center">{{$data->requestedItem->barang->nama}}</td>
                      <td class="text-center">{{$data->kuantitas}}</td>
                      <td class="text-center">{{$data->requestedItem->barang->kontrol_satuan}}</td>
                      <td class="text-center">{{$data->price}}</td>
                      <td class="text-center">{{$data->discount}}</td>
                      <td class="text-center">{{$data->tax}}</td>
                      <td class="text-center">{{$data->amount}}</td>
                    </tr>
                  @endforeach
                </table>
                <br>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-md-4 control-label">Catatan </label>
                  <div class="col-md-4">
                    <label class="control-label">{{$po->catatan}}</label>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-md-4 control-label">Akun DP </label>
                  <div class="col-md-7">
                    <label class="control-label">{{$po->akunDP->nama}}</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-md-7 control-label">Subtotal </label>
                  <div class="col-md-5">
                    {{$subtotal}}
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-md-7 control-label">Discount </label>
                  <div class="col-md-5">
                    {{$po->discount}}% {{(100-$po->discount)*$subtotal}}
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-md-7 control-label">Estimated Freight </label>
                  <div class="col-md-5">
                    {{$po->freight}}
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-md-7 control-label">Total </label>
                  <div class="col-md-5">
                    {{((100-$po->discount)*$subtotal)+$po->freight}}
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection