@extends('app')

@section('title')
    Mata Uang
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="well well-sm">
                <ul class="nav nav-pills nav-justified">
                    <li>{!!link_to('currency','List')!!}</li>
                    <li>{!!link_to('currency/daily','Daily')!!}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection