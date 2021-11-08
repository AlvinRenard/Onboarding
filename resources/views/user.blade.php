<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Onboard</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/styles.css') }}">
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body id="page-top">
    <header class="masthead" style="background-image:  url('{{asset('images/header-bg.jpg')}}')">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Studio!</div>
            <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
            <hr class="divider" />
            <div class="masthead-heading text-uppercase"> {{$data['employee']-> nama}}</div>
        </div>
    </header>
    <section class="page-section" id="services">
        <div class="container">
        <div class="text-center" style=" padding-bottom: 6rem;">
                    @if ($data['employee'] -> progress -> progress == "0")
                    <h2 class="section-heading text-uppercase" style=" padding-bottom: 5rem;">Your Progress</h2>
                    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
                <ul class="progressbar">
                    <div class="tab" role="tabpanel">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Submit CV</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 1 ? 'disabled' : ''}}"
                                    id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                                    role="tab" aria-controls="profile" aria-selected="false">Submit FPK</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 2 ? 'disabled' : ''}}"
                                    id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                                    role="tab" aria-controls="contact" aria-selected="false">Submit Ijazah</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 3 ? 'disabled' : ''}}"
                                    id="s-tab" data-bs-toggle="tab" data-bs-target="#s" type="button" role="tab"
                                    aria-controls="s" aria-selected="false">Submit Photo</button>
                            </li>
                        </ul>
                    </div>
                    <div style=" padding-bottom: 1rem"></div>
                    <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="{{ '/uploaddatabase1/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="1">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="{{ '/uploaddatabase2/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="2">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <form action="{{ '/uploaddatabase3/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="3">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="s" role="tabpanel" aria-labelledby="s-tab">
                    <form action="{{ '/uploaddatabase4/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="4">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="text-center" style=" padding-bottom: 6rem;">
                    @elseif ($data['employee'] -> progress -> progress == "1")
                    <h2 class="section-heading text-uppercase" style=" padding-bottom: 5rem;">Your Progress</h2>
                    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
                <ul class="progressbar">
                    <div class="tab" role="tabpanel">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item active" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Submit CV</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 1 ? 'disabled' : ''}}"
                                    id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                                    role="tab" aria-controls="profile" aria-selected="false">Submit FPK</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 2 ? 'disabled' : ''}}"
                                    id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                                    role="tab" aria-controls="contact" aria-selected="false">Submit Ijazah</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 3 ? 'disabled' : ''}}"
                                    id="s-tab" data-bs-toggle="tab" data-bs-target="#s" type="button" role="tab"
                                    aria-controls="s" aria-selected="false">Submit Photo</button>
                            </li>
                        </ul>
                    </div>
                    <div style=" padding-bottom: 1rem"></div>
                    <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="{{ '/uploaddatabase1/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                  
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="1">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="{{ '/uploaddatabase2/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="2">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <form action="{{ '/uploaddatabase3/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                       
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="3">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="s" role="tabpanel" aria-labelledby="s-tab">
                    <form action="{{ '/uploaddatabase4/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="4">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
                    @elseif ($data['employee'] -> progress -> progress == "2")
                    <h2 class="section-heading text-uppercase" style=" padding-bottom: 5rem;">Your Progress</h2>
                    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
                <ul class="progressbar">
                    <div class="tab" role="tabpanel">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item active" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Submit CV</button>
                            </li>
                            <li class="nav-item active" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 1 ? 'disabled' : ''}}"
                                    id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                                    role="tab" aria-controls="profile" aria-selected="false">Submit FPK</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 2 ? 'disabled' : ''}}"
                                    id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                                    role="tab" aria-controls="contact" aria-selected="false">Submit Ijazah</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 3 ? 'disabled' : ''}}"
                                    id="s-tab" data-bs-toggle="tab" data-bs-target="#s" type="button" role="tab"
                                    aria-controls="s" aria-selected="false">Submit Photo</button>
                            </li>
                        </ul>
                    </div>
                    <div style=" padding-bottom: 1rem"></div>
                    <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="{{ '/uploaddatabase1/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                     
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="1">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="{{ '/uploaddatabase2/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                  
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="2">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <form action="{{ '/uploaddatabase3/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                   
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="3">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="s" role="tabpanel" aria-labelledby="s-tab">
                    <form action="{{ '/uploaddatabase4/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                     
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="4">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
                    @elseif ($data['employee'] -> progress -> progress == "3")
                    <h2 class="section-heading text-uppercase" style=" padding-bottom: 5rem;">Your Progress</h2>
                    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
                <ul class="progressbar">
                    <div class="tab" role="tabpanel">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item active" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Submit CV</button>
                            </li>
                            <li class="nav-item active" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 1 ? 'disabled' : ''}}"
                                    id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                                    role="tab" aria-controls="profile" aria-selected="false">Submit FPK</button>
                            </li>
                            <li class="nav-item active" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 2 ? 'disabled' : ''}}"
                                    id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                                    role="tab" aria-controls="contact" aria-selected="false">Submit Ijazah</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 3 ? 'disabled' : ''}}"
                                    id="s-tab" data-bs-toggle="tab" data-bs-target="#s" type="button" role="tab"
                                    aria-controls="s" aria-selected="false">Submit Photo</button>
                            </li>
                        </ul>
                    </div>
                    <div style=" padding-bottom: 1rem"></div>
                    <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="{{ '/uploaddatabase1/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="1">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="{{ '/uploaddatabase2/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                     
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="2">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <form action="{{ '/uploaddatabase3/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="3">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="s" role="tabpanel" aria-labelledby="s-tab">
                    <form action="{{ '/uploaddatabase4/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                       
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="4">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
                    @elseif ($data['employee'] -> progress -> progress == "4")
                    <h2 class="section-heading text-uppercase" style=" padding-bottom: 5rem;">Your Progress</h2>
                    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
                <ul class="progressbar">
                    <div class="tab" role="tabpanel">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item active" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Submit CV</button>
                            </li>
                            <li class="nav-item active" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 1 ? 'disabled' : ''}}"
                                    id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                                    role="tab" aria-controls="profile" aria-selected="false">Submit FPK</button>
                            </li>
                            <li class="nav-item active" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 2 ? 'disabled' : ''}}"
                                    id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                                    role="tab" aria-controls="contact" aria-selected="false">Submit Ijazah</button>
                            </li>
                            <li class="nav-item active" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 3 ? 'disabled' : ''}}"
                                    id="s-tab" data-bs-toggle="tab" data-bs-target="#s" type="button" role="tab"
                                    aria-controls="s" aria-selected="false">Submit Photo</button>
                            </li>
                        </ul>
                    </div>
                    <a href="{{ '/userlanding/'.$data['employee']->id}}"class="btn btn-success">Finalize</a>
                    <div style=" padding-bottom: 3rem"></div>
                    <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="{{ '/uploaddatabase1/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="1">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="{{ '/uploaddatabase2/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                     
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="2">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <form action="{{ '/uploaddatabase3/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                       
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="3">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="s" role="tabpanel" aria-labelledby="s-tab">
                    <form action="{{ '/uploaddatabase4/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="4">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
                    @elseif ($data['employee'] -> progress -> progress == "5")
                    <h2 class="section-heading text-uppercase" style=" padding-bottom: 5rem;">You already submitted required documents!</h2>
                <ul class="progressbar">
                    @else
                    <div class="tab" role="tabpanel">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Submit CV</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 1 ? 'disabled' : ''}}"
                                    id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                                    role="tab" aria-controls="profile" aria-selected="false">Submit FPK</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 2 ? 'disabled' : ''}}"
                                    id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                                    role="tab" aria-controls="contact" aria-selected="false">Submit Ijazah</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 3 ? 'disabled' : ''}}"
                                    id="s-tab" data-bs-toggle="tab" data-bs-target="#s" type="button" role="tab"
                                    aria-controls="s" aria-selected="false">Submit Photo</button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="{{ '/uploaddatabase1/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                       
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="1">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="{{ '/uploaddatabase2/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="2">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <form action="{{ '/uploaddatabase3/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="3">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="s" role="tabpanel" aria-labelledby="s-tab">
                    <form action="{{ '/uploaddatabase4/'.$data['employee']->id.'/'.$data['employee']->token }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                         
                        <input type="hidden" name="id" value="{{$data['employee']->id}}">
                        <input type="hidden" name="process" value="4">
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br />
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
                    @endif
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

</html>