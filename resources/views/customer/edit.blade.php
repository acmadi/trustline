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
                            <input class="form-control" placeholder="Nama" name="nama" type="text" value="{{$data['nama']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Alamat</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Alamat" name="alamat" type="text" value="{{$data['alamat']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Kota</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Kota" name="kota" type="text" value="{{$data['kota']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Kode Pos</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Kode Pos" name="kode_pos" type="text" value="{{$data['kode_pos']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Propinsi</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Propinsi" name="propinsi" type="text" value="{{$data['propinsi']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Negara</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Negara" name="negara" type="text" value="{{$data['negara']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Telepon 1</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Telepon 1" name="telepon1" type="text" value="{{$data['telepon1']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Telepon 2</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Telepon 2" name="telepon2" type="text" value="{{$data['telepon2']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Fax</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Fax" name="fax" type="text" value="{{$data['fax']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Email</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Email" name="email" type="text" value="{{$data['email']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Website</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Website" name="web" type="text" value="{{$data['web']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Contact Person</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Contact Person" name="contact_person" type="text" value="{{$data['contact_person']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Telepon 1</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Telepon 1" name="telepon1_cp" type="text" value="{{$data['telepon1_cp']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Telepon 2</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Telepon 2" name="telepon2_cp" type="text" value="{{$data['telepon2_cp']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Email</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Email" name="email_cp" type="text" value="{{$data['email_cp']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">NPWP</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="NPWP" name="npwp" type="text" value="{{$data['npwp']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">No. PKP</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="No. PKP" name="no_pkp" type="text" value="{{$data['no_pkp']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Bank Kerja 1</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Bank Kerja 1" name="bank_kerja_1" type="text" value="{{$data['bank_kerja_1']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Bank Kerja 2</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Bank Kerja 2" name="bank_kerja_2" type="text" value="{{$data['bank_kerja_2']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Bank Kerja 3</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Bank Kerja 3" name="bank_kerja_3" type="text" value="{{$data['bank_kerja_3']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Bank Kerja 4</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Bank Kerja 4" name="bank_kerja_4" type="text" value="{{$data['bank_kerja_4']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">DPP</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="DPP" name="dpp" type="text" value="{{$data['dpp']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Pajak 1</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Pajak 1" name="pajak1" type="text" value="{{$data['pajak1']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Sub Total Pajak 1</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Sub Total Pajak 1" name="sub_total_pajak_1" type="text" value="{{$data['sub_total_pajak_1']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Pajak 2</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Pajak 2" name="pajak2" type="text" value="{{$data['pajak2']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Sub Total Pajak 2</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Sub Total Pajak 2" name="sub_total_pajak_2" type="text" value="{{$data['sub_total_pajak_2']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Total Piutang</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Total Piutang" name="total_piutang" type="text" value="{{$data['total_piutang']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Plafon Harga</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Plafon Harga" name="plafon_harga" type="text" value="{{$data['plafon_harga']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Plafon Hari</label>
                        <div class="col-md-6">
                            <input data-provide="datepicker" class="datepicker form-control" placeholder="2017-12-31" name="plafon_hari" value="{{$data['plafon_hari']}}">
                            <script>
                                $.fn.datepicker.defaults.format = "yyyy-mm-dd";
                                $('.datepicker').datepicker({
                                    format: 'yyyy-mm-dd',
                                    startDate: '-3d'
                                })
                            </script>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Tahun Bergabung</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Tahun Bergabung" name="tahun_bergabung" type="text" value="{{$data['tahun_bergabung']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Catatan</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="Catatan" name="catatan" type="text" value="{{$data['catatan']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Kode Sales</label>
                        <div class="col-md-6">
                            <select class="form-control" name="sales_id">
                                @foreach($sales as $row)
                                    <option value="{{$row['id']}}">{{$row['id']." - ".$row['karyawan']['nama']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Status</label>
                        <div class="col-md-6">
                            <label class="radio-inline">
                                <input type="radio" name="status" value="aktif">aktif
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" value="non aktif">non aktif
                            </label>
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
@endsection

@section('js')
    {!! HTML::script('js/bootstrap-datepicker.js') !!}
@endsection