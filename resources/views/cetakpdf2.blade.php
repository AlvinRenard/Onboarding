<html>
<head>
    <title>Contoh Surat Pernyataan</title>
    <meta charset="utf-8">
    <style>
        #judul{
            text-align:center;
        }

        #halaman{
            width: auto; 
            height: auto; 
            position: absolute; 
            border: 1px solid; 
            padding-top: 30px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
        }
		#halaman2{
            width: auto; 
            height: auto; 
            position: absolute; 
            border: 1px solid; 
            padding-top: 30px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
        }
		.page_break { 
			width: auto; 
            height: auto; 
            position: absolute; 
			border: 1px solid; 
            padding-top: 30px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
			page-break-before: always; 
		
		}

    </style>

</head>

<body>
    <div id=halaman>
        <h3 id=judul>SURAT PERJANJIAN KERJA KONTRAK</h3>
		<h3 id=judul>Nomer:</h3>

        <p>Saya yang bertanda tangan di bawah ini :</p>

        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$data['employee']->remuneration->nama}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Jabatan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$data['employee']->posisi}}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">Kampung Sambak RT 01 RW 09 Kelurahan Danyang 
                    Kecamatan Purwodadi Kabupaten Grobogan</td>
            </tr>
            <tr>
                <td style="width: 30%;">Pekerjaan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">Guru</td>
            </tr>
        </table>

        <p>Dalam  hal  ini  bertindak  atas  nama  direksi  ( ---nama  perusahaan---)  yang berkedudukan  di  ( ---alamat  lengkap  perusahaan---)  dan  selanjutnya  disebut PIHAK PERTAMA. </p>
		<table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$data['employee']->nama}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Jabatan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$data['employee']->posisi}}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">Kampung Sambak RT 01 RW 09 Kelurahan Danyang 
                    Kecamatan Purwodadi Kabupaten Grobogan</td>
            </tr>
            <tr>
                <td style="width: 30%;">Pekerjaan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">Guru</td>
            </tr>
        </table>
		<p>Dalam  hal  ini  bertindak  untuk  dan  atas  nama  diri  pribadi  dan  selanjutnya disebut PIHAK KEDUA. </p>

		<h3 id=judul>PASAL 1</h3>
		<h3 id=judul>MASA KERJA</h3>
		<h3 style="text-align: left"> Ayat 1 </h3>
		<p>PIHAK  PERTAMA menyatakan menerima PIHAK KEDUA sebagai karyawan kontrak (waktu   tertentu) di perusahaan ( ---nama   perusahaan---) yang berkedudukan di ( ---alamat  lengkap  perusahaan---) dan PIHAK KEDUA dengan ini menyatakan kesediaannya.</p>
		<h3 style="text-align: left"> Ayat 2 </h3>
		<p> Perjanjian  kerja  ini  berlaku  untuk  jangka  waktu  [( ------------)  ( ----waktudalam huruf---)],  terhitung  sejak  tanggal  ( ---tanggal,  bulan,  dan  tahun---)  dan  berakhir pada tanggal ( ---tanggal, bulan, dan tahun---).</p>
		<h3 style="text-align: left"> Ayat 3 </h3>
		<p>Selama    jangka    waktu    tersebut    masing-masing    pihak    dapat    memutuskan hubungan  kerja  dengan  pemberitahuan  secara  tertulis  minimal  [( ------------)  ( ----waktudalam huruf---)] hari kerja.  </p><br><br><br>
	</div>
	<div class="page_break">
		<h3 id=judul>PASAL 2</h3>
		<h3 id=judul>TATA TERTIB PERUSAHAAN</h3>
		<h3 style="text-align: left"> Ayat 1 </h3>
		<p>PIHAK   KEDUA menyatakan   kesediaannya   untuk   mematuhi   serta   mentaati seluruh    peraturan    tata    tertib    perusahaan    yang    telah    ditetapkan PIHAK PERTAMA.</p>
		<h3 style="text-align: left"> Ayat 2 </h3>
		<p>Pelanggaran  terhadap  peraturan-peraturan  tersebut  di  atas  dapat  mengakibatkan PIHAK KEDUAdijatuhi:</p>
		<ul>
			<li>1.Skorsing, atau</li>
			<li>2.Pemutusan Hubungan Pekerjaan (PHK), atau</li>
			<li>3.Hukuman  dalam  bentuk  lain  dengan  merujuk  kepada  Peraturan  Pemerintah yang mengaturnya.</li>
    </ul>
    <div style="width: 30%; text-align: left; float: right;">Purwodadi, 20 Januari 2020</div><br>
        <div style="width: 30%; text-align: left; float: right;">Yang bertanda tangan,</div><br>
    <div>
        <?php
$path = 'C:\xampp\htdocs\Onboarding_Renard\public\images\Tanda_tangan.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<img src="<?php echo $base64?>"style="width: 30%; float: right;" width="150" height="150"/>
    </div>
    </div>
    
</body>

</html>
</body>
</html>