@extends('app')

@section('title')
    User
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ul>
                @foreach ($users as $user)
                    <li>
                        {{$user->name}} ({{$user->email}})
                        <ul>
                            @foreach ($user->perms as $perm)
                                <li>$perm->name</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection