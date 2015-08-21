@extends('app')

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li class="active">{!!link_to('gudang','List')!!}</li>
      <li>{!!link_to('gudang/create','Tambah')!!}</li>
      <li>{!!link_to('gudang/export','Export')!!}</li>
      <li>{!!link_to('gudang/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Gudang</div>
        @if(sizeof($data))
          <table class="table table-bordered table-striped">
            <tr>
              @foreach(array_keys($data[0]) as $column)
                <th class="text-center">
                  {{ucwords(str_replace('_', ' ', $column))}}
                </th>
              @endforeach
                <th class="text-center">Modify</th>
            </tr>
            @foreach($data as $row)
              <tr>
                @foreach($row as $cell)
                  <td class="text-center">
                    {{$cell}}
                  </td>
                @endforeach
                <td class="text-center">
                {!!link_to('gudang/show/'.$row['id'], 'show' ,['class' => 'btn btn-default btn-sm'])!!}
                {!!link_to('gudang/edit/'.$row['id'], 'edit' ,['class' => 'btn btn-primary btn-sm'])!!}
                {!!link_to('gudang/destroy/'.$row['id'], 'delete' ,['class' => 'btn btn-danger btn-sm'])!!}
                </td>
              </tr>
            @endforeach
          </table>
        @else
          <div class="panel-body">
            Data gudang kosong.
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection