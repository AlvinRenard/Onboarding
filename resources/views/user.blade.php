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
    <script>

    </script>

<body id="page-top">
    <header class="masthead" style="background-image:  url('{{asset('images/indosat-ooredoo-office.jpg')}}')">
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
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress == 1 ? 'disabled' : ''}}"
                                    id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                                    aria-controls="home" aria-selected="true">Your Information</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{$data['employee'] -> progress -> progress < 1 ? 'disabled' : ''}}"
                                    id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                                    role="tab" aria-controls="profile" aria-selected="false">Document
                                    Submission</button>
                                    @if ($data['employee'] -> progress -> progress < 1 )
                                <a href=" {{ '/userlanding/'.$data['employee']->id.'/'.$data['employee']->token}}"class="btn btn-success disabled">Finalize</a>
                                @elseif ($data['employee'] -> progress -> progress > 1 )
                                <a href=" {{ '/userlanding/'.$data['employee']->id.'/'.$data['employee']->token}}"class="btn btn-success disabled">Finalize</a>
                                @else
                                <a href=" {{ '/userlanding/'.$data['employee']->id.'/'.$data['employee']->token}}"class="btn btn-success ">Finalize</a>
                                @endif
                                <div style="padding-bottom:80px;"></div>
                            </li>

                        </ul>
                    </div>
                    @if ($data['employee'] -> progress -> progress == "0")

                    <div class="form-body">
                        <div class="row">
                            <div class="form-holder">
                                <div class="form-content">
                                    <div class="form-items">
                                        <h4 class="section-heading text-uppercase" style=" padding-bottom: 2rem;">Fill
                                            in the data below</h4>

                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <form
                                                action="{{ '/empinformation/'.$data['employee']->id.'/'.$data['employee']->token }}"
                                                method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="col-md-12">
                                                    <label for="inputAddress">Full Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"pattern="[a-zA-Z]{2,}" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputAddress">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputAddress">City</label>
                                                    <input type="text" class="form-control" id="city" name="city">
  
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputAddress2">State</label>
                                                    <input type="text" class="form-control" id="state" name="state">
           
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-3">
                                                        <label for="inputCity">Postal Code</label>
                                                        <input type="text" class="form-control" id="postalcode"
                                                            name="postalcode">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <button type="submit" class="btn btn-primary" style="width:100%;">Submit</button></div>
                                            </form>

                                            @elseif ($data['employee'] -> progress -> progress == "1")
                                            <div class="card">
                                                <div class="card-body p-0">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <th class="text-center" scope="col">No</th>
                                                            <th class="text-center" scope="col">Document Name</th>
                                                            <th class="text-center" scope="col">Document Upload Rule
                                                            </th>
                                                            <th class="text-center" scope="col">Document Upload</th>
                                                            <th class="text-center" scope="col">Document Uploaded
                                                            </th>
                                                            <div class="row mt-3">
                                                                <tr>

                                                                    <td class="text-center">1</td>
                                                                    <td class="text-center">CV</td>
                                                                    <td class="text-center">PDF</td>
                                                                    <td class="text-center">
                                                                        <form
                                                                            action="{{ '/uploaddatabase1/'.$data['employee']->id.'/'.$data['employee']->token }}"
                                                                            method="post" enctype="multipart/form-data">
                                                                            {{ csrf_field() }}

                                                                            <input type="hidden" name="id"
                                                                                value="{{$data['employee']->id}}">
                                                                            <div class="form-group">
                                                                                <input name="file" type="file"
                                                                                    class="form-control"><br />
                                                                            </div>
                                                                            <div class="row justify-content-center">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary btn-lg">Submit</button>
                                                                            </div>
                                                                        </form>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        {{$file['type']->file_cv}}
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">2</td>
                                                                    <td class="text-center">Form Permohonan Kerja</td>
                                                                    <td class="text-center">PDF</td>
                                                                    <td class="text-center">
                                                                        <form
                                                                            action="{{ '/uploaddatabase2/'.$data['employee']->id.'/'.$data['employee']->token }}"
                                                                            method="post" enctype="multipart/form-data">
                                                                            {{ csrf_field() }}

                                                                            <input type="hidden" name="id"
                                                                                value="{{$data['employee']->id}}">

                                                                            <div class="form-group">
                                                                                <input name="file" type="file"
                                                                                    class="form-control"><br />
                                                                            </div>
                                                                            <div class="row justify-content-center">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary btn-lg">Submit</button>
                                                                            </div>
                                                                        </form>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        {{$file['type']->file_fpk}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">3</td>
                                                                    <td class="text-center">Ijazah</td>
                                                                    <td class="text-center">PDF
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <form
                                                                            action="{{ '/uploaddatabase3/'.$data['employee']->id.'/'.$data['employee']->token }}"
                                                                            method="post" enctype="multipart/form-data">
                                                                            {{ csrf_field() }}

                                                                            <input type="hidden" name="id"
                                                                                value="{{$data['employee']->id}}">

                                                                            <div class="form-group">
                                                                                <input name="file" type="file"
                                                                                    class="form-control"><br />
                                                                            </div>
                                                                            <div class="row justify-content-center">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary btn-lg">Submit</button>
                                                                            </div>
                                                                        </form>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        {{$file['type']->file_ijazah}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">4</td>
                                                                    <td class="text-center">Foto Bewarna</td>
                                                                    <td class="text-center">jpg/png</td>
                                                                    <td class="text-center">
                                                                        <form
                                                                            action="{{ '/uploaddatabase4/'.$data['employee']->id.'/'.$data['employee']->token }}"
                                                                            method="post" enctype="multipart/form-data">
                                                                            {{ csrf_field() }}

                                                                            <input type="hidden" name="id"
                                                                                value="{{$data['employee']->id}}">

                                                                            <div class="form-group">
                                                                                <input name="file" type="file"
                                                                                    class="form-control"><br />
                                                                            </div>
                                                                            <div class="row justify-content-center">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary btn-lg">Submit</button>
                                                                            </div>
                                                                        </form>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        {{$file['type']->file_photo}}
                                                                    </td>
                                                                </tr>

                                                            </div>
                                                </div>
                                            </div>
                                            @elseif ($data['employee'] -> progress -> progress == "2")
                                            <h2 class="section-heading text-uppercase" style=" padding-bottom: 5rem;">
                                                You already
                                                submitted required
                                                documents!</h2>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
            </script>

</html>