@extends('app')

@section('content')
  {!!Form::open(['url'=>'excel/store', 'files' => true])!!}
    <input type="file" name="file">
    <input type="submit" value="Submit">
  {!!Form::close()!!}
@endsection