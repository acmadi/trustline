@extends('app')

@section('content')
    <div class="well well-sm">
        <ul class="nav nav-pills nav-justified">
            <li>{!!link_to('barang','List')!!}</li>
            <li>{!!link_to('barang/create','Tambah')!!}</li>
            <li>{!!link_to('barang/export','Export')!!}</li>
            <li class="active">{!!link_to('barang/import','Import')!!}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Import</div>
                <div class="panel-body">
                    <p>
                        File Excel yang diupload harus sesuai dengan format template. Silahkan {!!link_to('barang/template','download template')!!} untuk form ini.
                    </p>
                    <p>Syarat isi tabel:</p>
                    <ul>
                        <li><strong>Id</strong> Masukkan hanya angka dan tanda titik.</li>
                        <li><strong>Tipe Barang</strong> Sebaiknya masukkan Tipe barang yang sudah terdaftar. Jika tidak maka akan otomatis dibuatkan dengan tipe barang baru yang diimport.</li>
                        <li><strong>Barkode</strong> ????.</li>
                        <li><strong>Nama</strong> Masukkan penamaan yang baik dan benar.</li>
                        <li><strong>Harga Jual</strong> Masukkan angka.</li>
                        <li><strong>Saldo Minimum</strong> Masukkan angka.</li>
                        <li><strong>Status</strong> Masukkan <kbd>aktif</kbd> atau <kbd>non aktif</kbd>.</li>
                        <li><strong>Catatan</strong> Masukkan penjelasan.</li>
                    </ul>
                    {!!Form::open(['url'=>'barang/upload', 'files' => true, 'class' => 'form-horizontal'])!!}
                    <div class="form-group">
                        <label class="col-md-4 control-label">Excel File</label>
                        <div class="col-md-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">Select file</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="file">
                                </span>
                                <span class="fileinput-filename"></span>
                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection