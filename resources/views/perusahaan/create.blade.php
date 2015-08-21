@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Data Perusahaan</div>
        <div class="panel-body">
          {!! Form::open(['url' => 'perusahaan/store', 'class' => 'form-horizontal']) !!}
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
            <label class="col-md-4 control-label">Nama Perusahaan</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Nama Perusahaan" name="nama" value="{{$perusahaan['nama']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Alamat</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Alamat" name="alamat" value="{{$perusahaan['alamat']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Kota</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Kota" name="kota" value="{{$perusahaan['kota']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Propinsi</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Propinsi" name="propinsi" value="{{$perusahaan['propinsi']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Kode Pos</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Kode Pos" name="kode_pos" value="{{$perusahaan['kode_pos']}}" type="text">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Telepon</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Telepon" name="telepon" value="{{$perusahaan['telepon']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">No. Fax</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="No Fax" name="fax" value="{{$perusahaan['fax']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">No. Akte Pendirian</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="No Akte Pendirian" name="no_akte_pendirian" value="{{$perusahaan['no_akte_pendirian']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">NPWP</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="NPWP" name="npwp" value="{{$perusahaan['npwp']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">No. Pengukuhan</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="No Pengukuhan" name="no_pengukuhan" value="{{$perusahaan['no_pengukuhan']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">No. Seri Faktur Pajak</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="No Seri Faktur Pajak" name="no_seri_faktur_pajak" value="{{$perusahaan['no_seri_faktur_pajak']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Kode Cabang</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Kode Cabang" name="kode_cabang" value="{{$perusahaan['kode_cabang']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Jenis Usaha</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Jenis Usaha" name="jenis_usaha" value="{{$perusahaan['jenis_usaha']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">KLU</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="KLU" name="klu" value="{{$perusahaan['klu']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Tanggal Neraca Awal</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Tanggal Neraca Awal" name="tanggal_neraca_awal" value="{{$perusahaan['tanggal_neraca_awal']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Nilai Tukar Neraca Awal</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Nilai Tukar Neraca Awal" name="nilai_tukar_neraca_awal" value="{{$perusahaan['nilai_tukar_neraca_awal']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Tahun Buku/Fiskal</label>
            <div class="col-md-6">
              <input class="form-control" placeholder="Tahun Buku/Fiskal" name="tahun_buku_fiskal" value="{{$perusahaan['tahun_buku_fiskal']}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Pilihan Gudang</label>
            <div class="col-md-6">
              <select class="form-control" name="jenis_gudang">
                <option value="Single Gudang">Single Gudang</option>
                <option value="Multi Gudang">Multi Gudang</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Pilihan Mata Uang</label>
            <div class="col-md-6">
              <select class="form-control" name="jenis_mata_uang">
                <option value="Single Currency">Single Currency</option>
                <option value="Multi Currency">Multi Currency</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Metode Persediaan</label>
            <div class="col-md-6">
              <select class="form-control" name="metode_persediaan">
                <option value="average">1. AVERAGE</option>
                <option value="fifo">2. FIFO</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Mata Uang Default</label>
            <div class="col-md-6">
              <select class="form-control" name="mata_uang">
                @foreach ($mata_uangs as $m)
                  <option value="{{$m->simbol}}">{{$m->simbol}} {{$m->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection