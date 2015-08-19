<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trustline -
		@yield('title')
	</title>

	{!! HTML::style('css/bootstrap.min.css') !!}
	{!! HTML::style('css/jasny-bootstrap.css') !!}
	{!! HTML::style('css/jquery-ui.structure.min.css') !!}
	{!! HTML::style('css/jquery-ui.theme.min.css') !!}
	{!! HTML::style('css/jquery.appendGrid-1.5.2.css') !!}
	@yield('css')
	{!! HTML::style('css/my-style.css') !!}

</head>
<body>
<div class="container">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="./">TRUSTLINE</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">

					@if(Auth::check())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								Persiapan<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li>{!!link_to('currency', 'Data Mata Uang')!!}</li>
								<li>{!!link_to('perusahaan', 'Data Info Perusahaan')!!}</li>
								<li>{!!link_to('currency/kurs', 'Kurs')!!}</li>
								<li>{!!link_to('akun', 'Data Akun')!!}</li>
								<li>{!!link_to('tipeakun', 'Tipe Akun')!!}</li>
								<li>{!!link_to('#', 'Set Akun Default Mata Uang')!!}</li>
								<li>{!!link_to('syaratpembayaran', 'Data Syarat Pembayaran')!!}</li>
								<li>{!!link_to('pajak', 'Data Pajak')!!}</li>
								<li>{!!link_to('customer', 'Data Pelanggan')!!}</li>
								<li>{!!link_to('supplier', 'Data Pemasok')!!}</li>
								<li>{!!link_to('proyek', 'Data Proyek')!!}</li>
								<li>{!!link_to('departemen', 'Data Departemen')!!}</li>
								<li>{!!link_to('gudang', 'Data Gudang')!!}</li>
								<li>{!!link_to('#', 'Set Akun Default Gudang')!!}</li>
								<li>{!!link_to('barang', 'Data Barang')!!}</li>
								<li>{!!link_to('saldo', 'Multi Saldo Awal')!!}</li>
								<li>{!!link_to('#', 'Aktiva Tetap')!!}</li>
								<li>{!!link_to('karyawan', 'Kepegawaian')!!}</li>
                                <li>{!!link_to('jabatan', 'Jabatan')!!}</li>
								<li>{!!link_to('sales', 'Data Sales')!!}</li>
								<li>{!!link_to('#', 'Neraca Percobaan')!!}</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								Aktivitas<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li>{!!link_to('pembelian/pr/create', 'Permintaan Barang')!!}</li>
								<li>{!!link_to('pembelian/po/create', 'Pesanan Pembelian')!!}</li>
								<li>{!!link_to('pembelian/ro/create', 'Penerimaan Barang')!!}</li>
								<li>{!!link_to('pembelian/pi/create', 'Faktur Pembelian')!!}</li>
								<li>{!!link_to('pembelian/pt/create', 'Retur Pembelian')!!}</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								Laporan<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li>{!!link_to('#', 'Laporan Keuangan')!!}</li>
								<li>{!!link_to('#', 'Buku Besar')!!}</li>
								<li>{!!link_to('#', 'Kas & Bank')!!}</li>
								<li>{!!link_to('#', 'Akun Piutang & Pemasok')!!}</li>
								<li>{!!link_to('#', 'Laporan Pembelian')!!}</li>
								<li>{!!link_to('#', 'Pembiayaan Pesanan')!!}</li>
								<li>{!!link_to('#', 'Aktiva Tetap')!!}</li>
								<li>{!!link_to('#', 'Persediaan')!!}</li>
								<li>{!!link_to('#', 'Gudang')!!}</li>
								<li>{!!link_to('#', 'Laporan Proyek')!!}</li>
								<li>{!!link_to('#', 'Laporan Departemen')!!}</li>
								<li>{!!link_to('#', 'Laporan Pemeriksaan')!!}</li>
								<li>{!!link_to('#', 'Laporan Lain-lain')!!}</li>
								<li>{!!link_to('#', 'Laporan Tersimpan...')!!}</li>
								<li>{!!link_to('#', 'Laporan Terdesain...')!!}</li>
							
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								Bantuan<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li>{!!link_to('#', 'Back Up')!!}</li>
								<li>{!!link_to('#', 'Restore')!!}</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								User<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li>{!!link_to('user', 'User')!!}</li>
								<li>{!!link_to('user/permission', 'Permission')!!}</li>
							</ul>
						</li>
					@endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li>{!!link_to('auth/login', 'Login')!!}</li>
						<li>{!!link_to('auth/register', 'Register')!!}</li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li>{!!link_to('auth/logout', 'Logout')!!}</li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		@yield('content')
	</div>

	<!-- Scripts -->
	{!! HTML::script('js/jquery.min.js') !!}
	{!! HTML::script('js/bootstrap.min.js') !!}
	{!! HTML::script('js/jasny-bootstrap.min.js') !!}
	{!! HTML::script('js/jquery-1.11.1.min.js') !!}
	{!! HTML::script('js/jquery-ui-1.11.1.min.js') !!}
	{!! HTML::script('js/jquery.appendGrid-1.5.2.js') !!}
	@yield('js')
</div>
</body>
</html>
