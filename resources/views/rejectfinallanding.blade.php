<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Day Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/vendor/aos/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/vendor/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/vendor/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/userlanding.css') }}">
</head>

<body>

    <body id="page-top">
        <!-- Masthead-->
        <header class="masthead" style="background-image:  url('{{asset('images/bg-masthead.jpg')}}')">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                    @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                        <h1 class="text-white font-weight-bold">Reason Rejected Employee</h1>
                        <h1 class="text-white font-weight-bold"> {{$data['employee']-> nama}}</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <form action="{{ '/rejectfinal/'.$data['employee']->id.'/'.$data['employee']->token }}" >
                            <div class="row justify-content-center">
                                <textarea rows="4" cols="50" id="reason"name="reason"placeholder="Enter text here..."></textarea>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5">
                <div class="small text-center text-muted">Copyright &copy; 2021 - Alvin Renard </div>
            </div>
        </footer>