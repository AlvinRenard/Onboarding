<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Onboard</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/styles.css') }}">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <body id="page-top">
        <header class="masthead"style="background-image:  url('{{asset('images/header-bg.jpg')}}')">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Studio!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                <hr class="divider" />
                <div class="masthead-heading text-uppercase"> {{$data['employee']-> nama}}</div>
            </div>
        </header>
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center"style=" padding-bottom: 14rem;">
                    <h2 class="section-heading text-uppercase"style=" padding-bottom: 5rem;">Your Progress</h2>
                    <ul class="progressbar">
      @if ($data['employee'] -> progress -> progress == "1")
          <li class="active">Submit CV Document</li>
          <li>Submit FPK Document</li>
          <li>Submit Ijazah Document</li>
          <li>Submit Photo</li>
          @elseif ($data['employee'] -> progress -> progress == "2")
          <li class="active">Submit CV Document</li>
          <li class="active">Submit FPK Document</li>
          <li>Submit Ijazah Document</li>
          <li>Submit Photo</li>
          @elseif ($data['employee'] -> progress -> progress == "3")
          <li class="active">Submit CV Document</li>
          <li class="active">Submit FPK Document</li>
          <li class="active">Submit Ijazah Document</li>
          <li>Submit Photo</li>
          @elseif ($data['employee'] -> progress -> progress == "4")
          <li class="active">Submit CV Document</li>
          <li class="active">Submit FPK Document</li>
          <li class="active">Submit Ijazah Document</li>
          <li class="active">Submit Photo</li>
          
          @else
          <li>Submit CV Document</li>
          <li>Submit FPK Document</li>
          <li>Submit Ijazah Document</li>
          <li>Submit Photo</li>
      @endif
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-12 text-center">
                <form action="/uploaddatabase" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$data['employee']->id}}">
                <div class="form-group">
                    <input name="file" type="file" class="form-control"><br/>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                    </div>
                </div>
                </form>
                </div>
            </div>