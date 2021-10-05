<!DOCTYPE html>
<html>
<head>
	<title>Interview Planner</title>
</head>
<body>
    <h1> Selamat datang </h1>
    <h3>
        <p>Nama : {{ $nama }}</p> 
        <p>Alamat : {{$alamat}}</p>
    </h3>
	<h4>Your Progress</h4>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porta est non magna euismod luctus. Vivamus tristique purus aliquet porttitor cursus. In volutpat scelerisque accumsan.</p>
    <button id="myButton" class="float-left submit-button" >Home</button>
    <script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "{{ url('/form/interview/pegawai') }}";
    };
</script>
</body>
</html>