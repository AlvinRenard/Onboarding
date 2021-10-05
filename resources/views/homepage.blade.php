<!DOCTYPE html>
<html>
<head>
	<title>Interview Planner</title>
</head>
<body>
<header style= "vertical-align: middle">
 
<p>Hallo, {{Session::get('name')}}. Apakabar?</p>

<h2>* Email kamu : {{Session::get('email')}}</h2>
<h2>* Status Login : {{Session::get('login')}}</h2>
<a href="/logout" class="btn btn-primary btn-lg">Logout</a>
 <nav>
     <a href="/home">HOME</a>
     |
     <a href="/home/about">TENTANG</a>
     |
     <a href="/home/contact ">KONTAK</a>

     
 </nav>
</header>
<hr/>
<br/>
<br/>
    <!-- bagian judul halaman blog -->
	<h3> @yield('Halaman Kontak') </h3>
    <!-- bagian konten blog -->
    @yield('konten')


 <br/>
 <br/>
 <hr/>
 <footer>
     <p>&copy; Alvin Renard</a> - 2021</p>
 </footer>
</script>
</body>
</html>