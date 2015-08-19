@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Sales #{{$data['id']}}</div>
                @if(sizeof($data))
                    <table class="table table-hover">
                        <tr>
                            <th>Nama</th>
                            <td>{{$karyawan['nama']}}</td>
                        </tr>
                        <tr>
                            <th>Target 1</th>
                            <td>{{$data['target1']}}</td>
                        </tr>
                        <tr>
                            <th>Komisi 1</th>
                            <td>{{$data['komisi1']}}</td>
                        </tr>
                        <tr>
                            <th>Target 2</th>
                            <td>{{$data['target2']}}</td>
                        </tr>
                        <tr>
                            <th>Komisi 2</th>
                            <td>{{$data['komisi2']}}</td>
                        </tr>
                        <tr>
                            <th>Target3</th>
                            <td>{{$data['target3']}}</td>
                        </tr>
                        <tr>
                            <th>Komisi 3</th>
                            <td>{{$data['komisi3']}}</td>
                        </tr>
                        <tr>
                            <th>Target 4</th>
                            <td>{{$data['target4']}}</td>
                        </tr>
                        <tr>
                            <th>Komisi 4</th>
                            <td>{{$data['komisi4']}}</td>
                        </tr>
                    </table>
                @else
                    Invalid gudang_id.
                @endif
                <div class="panel-footer">
                </div>
            </div>
        </div>
    </div>
@endsection