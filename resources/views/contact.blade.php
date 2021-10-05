<!-- Menghubungkan dengan view template master -->
@extends('homepage')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Kontak')

<p>Judul yea</p>
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
<html>
<head>
    <title>Laravel 8 CRUD Application - ItSolutionStuff.com</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    
<div class="container">
    <h1>List of Pegawai Applied</h1>
    <h3>Data Pegawai</h3>
 
	<a href="/home/add"> + Tambah Pegawai Baru</a>
	
	<br/>
 
	<table class="table table-bordered">
		<tr>
			<th>Nama</th>
			<th>Jabatan</th>
			<th>Umur</th>
			<th>Alamat</th>
			<th>Opsi</th>
		</tr>
		@foreach($listpegawai as $p)
		<tr>
			<td>{{ $p->pegawai_nama }}</td>
			<td>{{ $p->pegawai_jabatan }}</td>
			<td>{{ $p->pegawai_umur }}</td>
			<td>{{ $p->pegawai_alamat }}</td>
			<td>
				<button type="button" class="btn btn-primary onclick="location.href='/pegawai/edit/{{ $p->pegawai_id }}'"">Edit</button>
				|
				<button type="button" class="btn btn-danger"onclick="location.href='/pegawai/hapus/{{ $p->pegawai_id }}'">Delete</button>
			</td>
		</tr>
                @endforeach
        </tbody>
    </table>
	</br>
	Halaman : {{ $listpegawai->currentPage() }} <br/>
	Jumlah Data : {{ $listpegawai->total() }} <br/>
	Data Per Halaman : {{ $listpegawai->perPage() }} <br/>
 
 
	{!! $listpegawai->appends(['sort' => 'votes'])->links() !!}
</div>
     
</body>
</html>
@endsection