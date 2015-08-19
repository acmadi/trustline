@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">New Account</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'accounts/store', 'class' => 'form-horizontal']) !!}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="col-md-4 control-label">Account No</label>
                            <div class="col-md-6">
                                <input class="form-control" placeholder="Account no" name="account_no" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input class="form-control" placeholder="Name" name="name" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Type</label>
                            <div class="col-md-6">
                                <input class="form-control" placeholder="Type" name="type" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Balance</label>
                            <div class="col-md-6">
                                <input class="form-control" placeholder="Balance" name="balance" type="text">
                            </div>
                        </div>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @if($accounts->count())
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Nomor Account</th>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th class="text-right">Balance</th>
                    </tr>
                    @foreach($accounts->get() as $account)
                        <tr>
                            <td>{{$account['account_no']}}</td>
                            <td>{{$account['name']}}</td>
                            <td>{{$account['type']}}</td>
                            <td class="text-right">{{$account['balance']}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-right"><strong>Total</strong></td>
                        <td class="text-right">
                            <strong>{{round($accounts->sum('balance'), 2)}}</strong>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    @endif
@endsection