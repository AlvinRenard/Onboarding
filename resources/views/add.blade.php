@extends('homepage')
 

@section('judul_halaman', 'Halaman Tentang')
 
 
@section('konten')
 
<h2><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>
	<h3>Data Pegawai</h3>
 
	<a href="/home"> Kembali</a>
	
	<br/>
	<br/>
 
	<form action="/home/dbinput" method="post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
		Nama <input type="text" name="nama" required="required"> <br/>
		Jabatan <input type="text" name="jabatan" required="required"> <br/>
		Umur <input type="number" name="umur" required="required"> <br/>
		Alamat <textarea name="alamat" required="required"></textarea> <br/>
		<input type="submit" value="Simpan Data">
	</form>
 
@endsection
 












