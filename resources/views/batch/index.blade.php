@extends('app')

@section('title')
    Serial Barang
@endsection

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li class="active">{!!link_to('batch','List')!!}</li>
            <li>{!!link_to('batch/create','Tambah')!!}</li>
            <li>{!!link_to('batch/export','Export')!!}</li>
            <li>{!!link_to('batch/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Serial Barang</div>
                @if(sizeof($data))
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nomor Seri</th>
                            <th class="text-center">Tanggal Kadaluwarsa</th>
                            <th class="text-center">Volume</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Pilihan</th>
                        </tr>
                        @foreach($data as $row)
                            <tr class="text-center">
                                <td>{{$row['id']}}</td>
                                <td>{{$row['serial']}}</td>
                                <td>{{$row['kadaluwarsa']}}</td>
                                <td>{{$row['volume']}}</td>
                                <td>{{$row['gambar']}}</td>
                                <td>
                                    {!!link_to('batch/edit/'.$row['id'], 'edit', ['class' => 'btn btn-primary btn-sm'])!!}
                                    {!!link_to('batch/destroy/'.$row['id'], 'hapus', ['class' => 'btn btn-danger btn-sm'])!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div class="panel-body">Data Batch Kosong.</div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection