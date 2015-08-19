@extends('app')

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li>{!!link_to('gudang','List')!!}</li>
            <li>{!!link_to('gudang/create','Tambah')!!}</li>
            <li>{!!link_to('gudang/export','Export')!!}</li>
            <li>{!!link_to('gudang/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Gudang</div>
                @if(sizeof($data))
                    <table class="table table-hover">
                        @foreach($data as $judul => $isi)
                            <tr>
                                <td>
                                    <strong>{{studly_case($judul)}}</strong>
                                </td>
                                <td>{{$isi}}</td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div class="panel-body">
                        Invalid gudang_id.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection