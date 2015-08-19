@extends('app')

@section('title')
    Barang
@endsection

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li>{!!link_to('barang','List')!!}</li>
            <li>{!!link_to('barang/create','Tambah')!!}</li>
            <li>{!!link_to('barang/export','Export')!!}</li>
            <li>{!!link_to('barang/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Barang</div>
                @if($barang != null)
                    <table class="table table-hover">
                        <tr>
                            <td class="col-md-4"><strong>Kode Barang</strong></td>
                            <td class="col-md-8">{{$barang->id}}</td>
                        </tr>
                        <tr>
                            <td><strong>Tipe Barang</strong></td>
                            <td>{{$barang->tipebarang}}</td>
                        </tr>
                        <tr>
                            <td><strong>Barkode</strong></td>
                            <td>{{$barang->barkode}}</td>
                        </tr>
                        <tr>
                            <td><strong>Nama</strong></td>
                            <td>{{$barang->nama}}</td>
                        </tr>
                        <tr>
                            <td><strong>Satuan</strong></td>
                            <td>{{$barang->satuan}}</td>
                        </tr>
                        <tr>
                            <td><strong>Harga Jual1</strong></td>
                            <td>{{$barang->harga_jual1}}</td>
                        </tr>
                        <tr>
                            <td><strong>Harga Jual2</strong></td>
                            <td>{{$barang->harga_jual2}}</td>
                        </tr>
                        <tr>
                            <td><strong>Harga Jual3</strong></td>
                            <td>{{$barang->harga_jual3}}</td>
                        </tr>
                        <tr>
                            <td><strong>Harga Jual4</strong></td>
                            <td>{{$barang->harga_jual4}}</td>
                        </tr>
                        <tr>
                            <td><strong>Harga Jual5</strong></td>
                            <td>{{$barang->harga_jual5}}</td>
                        </tr>
                        <tr>
                            <td><strong>Saldo Minimum</strong></td>
                            <td>{{$barang->saldo_minimum}}</td>
                        </tr>
                        <tr>
                            <td><strong>Kontrol Satuan</strong></td>
                            <td>{{$barang->kontrol_satuan}}</td>
                        </tr>
                        <tr>
                            <td><strong>Kontrol Kuantitas</strong></td>
                            <td>{{$barang->kontrol_kuantitas}}</td>
                        </tr>
                        <tr>
                            <td><strong>Status</strong></td>
                            <td>{{$barang->status}}</td>
                        </tr>
                        <tr>
                            <td><strong>Catatan</strong></td>
                            <td>{{$barang->catatan}}</td>
                        </tr>
                        <tr>
                            <td><strong>Gambar</strong></td>
                            <td>
                                @if (($file = $barang->gambar) == null)
                                    Gambar tidak ada.
                                @else
                                    <a href="{{url('file').'/'.$file->id.'/'.$file->name}}">
                                        <img src="{{url('file').'/'.$file->id.'/'.$file->name}}" alt="alt" class="img-thumbnail img-responsive">
                                    </a>
                                @endif
                            </td>
                        </tr>
                    </table>
                @else
                    <div class="panel-body">Id barang salah.</div>
                @endif
            </div>
        </div>
    </div>
@endsection