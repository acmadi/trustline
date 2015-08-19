@extends('app')

@section('title')
    Pesanan Barang
@endsection

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li class="active">{!!link_to('pembelian/po','List')!!}</li>
            <li>{!!link_to('pembelian/po/create','Tambah')!!}</li>
            <li>{!!link_to('pembelian/po/export','Export')!!}</li>
            <li>{!!link_to('pembelian/po/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Pesanan Pembelian</div>
                @if(sizeof($data))
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th class="text-center">Nomor</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Catatan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        @foreach($data as $row)
                            <tr class="text-center">
                                <td>PO-{{$row['id']}}</td>
                                <td>{{$row['tanggal']}}</td>
                                <td>{{$row['catatan']}}</td>
                                <td></td>
                                <td class="text-center">
                                    {!!link_to('pembelian/po/show/'.$row['id'], 'show', ['class' => 'btn btn-default btn-sm'])!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div class="panel-body">
                        Data permintaan barang kosong.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection