@extends('app')

@section('title')
    Syarat Pembayaran
@endsection

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li class="active">{!!link_to('syaratpembayaran','List')!!}</li>
            <li>{!!link_to('syaratpembayaran/create','Tambah')!!}</li>
            <li>{!!link_to('syaratpembayaran/export','Export')!!}</li>
            <li>{!!link_to('syaratpembayaran/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Syarat Pembayaran</div>
                @if(sizeof($data))
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Pilihan</th>
                        </tr>
                        @foreach($data as $row)
                            <tr class="text-center">
                                <td>{{$row['id']}}</td>
                                <td>{{$row['nama']}}</td>
                                <td class="text-center">
                                    {!!link_to('syaratpembayaran/show/'.$row['id'], 'show', ['class' => 'btn btn-default btn-sm'])!!}
                                    {!!link_to('syaratpembayaran/edit/'.$row['id'], 'edit', ['class' => 'btn btn-primary btn-sm'])!!}
                                    {!!link_to('syaratpembayaran/destroy/'.$row['id'], 'delete', ['class' => 'btn btn-danger btn-sm'])!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div class="panel-body">
                        Data Syarat Pembayaran Kosong
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection