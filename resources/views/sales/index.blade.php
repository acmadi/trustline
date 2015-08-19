@extends('app')

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li class="active">{!!link_to('sales','List')!!}</li>
            <li>{!!link_to('sales/create','Tambah')!!}</li>
            <li>{!!link_to('sales/export','Export')!!}</li>
            <li>{!!link_to('sales/import','Import')!!}</li>
        </ul>
    </div>
    <!--
    <div class="row">
        <div class="col-md-12">
            {!!link_to('sales','List',['class'=>'btn btn-default'])!!}
            {!!link_to('sales/create','Tambah',['class'=>'btn btn-success'])!!}
        </div>
    </div>
    -->
    <br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Sales</div>
                @if(sizeof($data))
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Pilihan</th>
                        </tr>
                        @foreach($data as $row)
                            <tr class="text-center">
                                <td>{{$row['karyawan']['nama']}}</td>
                                <td class="text-center">
                                    {!!link_to('sales/show/'.$row['id'], 'show', ['class' => 'btn btn-default btn-sm'])!!}
                                    {!!link_to('sales/edit/'.$row['id'], 'edit', ['class' => 'btn btn-primary btn-sm'])!!}
                                    {!!link_to('sales/destroy/'.$row['id'], 'delete', ['class' => 'btn btn-danger btn-sm'])!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div class="panel-body">
                        Data sales kosong.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection