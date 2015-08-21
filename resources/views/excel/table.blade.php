@extends('app')

@section('content')
  <div class="container">
    @if(count($table))
    <table class="table table-bordered table-hover">
      <tr>
        @foreach(array_keys($table[0]) as $column)
          <th class="text-center">{{ $column }}</th>
        @endforeach
      </tr>
      @foreach($table as $row)
        <tr>
          @foreach($row as $column)
            <td class="text-center">{{ $column }}</td>
          @endforeach
        </tr>
      @endforeach
    </table>
    @else
      <h1>
        Couldn't load excel file.
        <small>{!!link_to('excel', 'Go back.')!!}</small>
      </h1>
    @endif
  </div>
@endsection