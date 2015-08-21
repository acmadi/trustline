@extends('app')

@section('css')
  {!! HTML::style('css/bootstrap-datepicker.css') !!}
@endsection

@section('title')
  Pelanggan
@endsection

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li>{!!link_to('customer','List')!!}</li>
      <li class="active">{!!link_to('customer/create','Tambah')!!}</li>
      <li>{!!link_to('customer/export','Export')!!}</li>
      <li>{!!link_to('customer/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Pelanggan</div>
        <div class="panel-body">
          {!! Form::open(['url' => 'customer/update/'.$data['id'], 'class' => 'form-horizontal']) !!}
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
            <label class="col-md-4 control-label">Nama</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['nama']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Alamat</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['alamat']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Kota</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['kota']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Kode Pos</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['kode_pos']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Propinsi</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['propinsi']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Negara</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['negara']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Telepon 1</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['telepon1']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Telepon 2</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['telepon2']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Fax</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['fax']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Email</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['email']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Website</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['web']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Contact Person</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['contact_person']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Telepon 1</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['telepon1_cp']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Telepon 2</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['telepon2_cp']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Email</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['email_cp']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">NPWP</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['npwp']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">No. PKP</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['no_pkp']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Bank Kerja 1</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['bank_kerja_1']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Bank Kerja 2</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['bank_kerja_2']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Bank Kerja 3</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['bank_kerja_3']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Bank Kerja 4</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['bank_kerja_4']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">DPP</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['dpp']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Pajak 1</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['pajak1']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Sub Total Pajak 1</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['sub_total_pajak_1']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Pajak 2</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['pajak2']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Sub Total Pajak 2</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['sub_total_pajak_2']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Total Piutang</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['total_piutang']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Plafon Harga</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['plafon_harga']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Plafon Hari</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['plafon_hari']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Tahun Bergabung</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['tahun_bergabung']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Catatan</label>
            <div class="col-md-6">
              <label class="control-label">{{$data['catatan']}}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Kode Sales</label>
            <label class="control-label">{{$data['sales_id']}}</label>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Status</label>
            <label class="control-label">{{$data['status']}}</label>
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
@endsection

@section('js')
  {!! HTML::script('js/bootstrap-datepicker.js') !!}
@endsection