@extends('app')

@section('content')
  <div class="well well-sm">
    <ul class="nav nav-pills nav-justified">
      <li>{!!link_to('karyawan','List')!!}</li>
      <li class="active">{!!link_to('karyawan/create','Tambah')!!}</li>
      <li>{!!link_to('karyawan/export','Export')!!}</li>
      <li>{!!link_to('karyawan/import','Import')!!}</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Ubah data karyawan</div>
        <div class="panel-body">
          {!! Form::open(['url' => 'karyawan/update/'.$data['id'], 'class' => 'form-horizontal']) !!}
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
          @if (isset($success))
            <div class="alert alert-success">
              <strong>Success!</strong> Data Berhasil dimasukkan.<br><br>
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
            <label class="col-md-4 control-label">Propinsi</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Propinsi" name="propinsi" type="text" value="{{$data['propinsi']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Telepon</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Telepon" name="telepon" type="text" value="{{$data['telepon']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">HP</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="HP" name="hp" type="text" value="{{$data['hp']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Agama</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Agama" name="agama" type="text" value="{{$data['agama']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Pendidikan Terakhir</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Pendidikan Terakhir" name="pendidikan_terakhir" type="text" value="{{$data['pendidikan_terakhir']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Tahun Masuk</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Tahun Masuk" name="tahun_masuk" type="text" value="{{$data['tahun_masuk']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Jabatan</label>
            <div class="col-md-6">
              <select class="form-control" name="id_jabatan">
              @foreach($jabatans as $jabatan)
                <option value="{{$jabatan['id']}}"
                @if($jabatan['id'] == $data['id_jabatan'])
                selected
                @endif
                >
                  {{$jabatan['nama']}}
                </option>
              @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Gaji Pokok</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Gaji Pokok" name="gaji_pokok" type="text" value="{{$data['gaji_pokok']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Tunjangan1 (%)</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Tunjangan" name="tunjangan1" type="text" value="{{$data['tunjangan1']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Tunjangan2 (%)</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Tunjangan" name="tunjangan2" type="text" value="{{$data['tunjangan2']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Tunjangan3 (%)</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Tunjangan" name="tunjangan3" type="text" value="{{$data['tunjangan3']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Tunjangan4 ($)</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Tunjangan" name="tunjangan4" type="text" value="{{$data['tunjangan4']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Tunjangan5 ($)</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Tunjangan" name="tunjangan5" type="text" value="{{$data['tunjangan5']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Tunjangan6 ($)</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Tunjangan" name="tunjangan6" type="text" value="{{$data['tunjangan6']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">NPWP</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="NPWP" name="npwp" type="text" value="{{$data['npwp']}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Status</label>
            <div class="col-md-6">
              <label class="radio-inline">
                <input type="radio" name="inlineRadioOptions2" id="inlineRadio3" value="aktif">aktif
              </label>
              <label class="radio-inline">
                <input type="radio" name="inlineRadioOptions2" id="inlineRadio4" value="non_aktif">non aktif
              </label>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                Modify
              </button>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection