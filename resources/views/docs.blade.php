<html>
<header>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <style>
        body {
            background: rgb(99, 39, 120)
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>

    <body>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-6 border-right"style="width:100%;">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Name</label><input type="text"
                                    class="form-control" placeholder="first name" value="{{ $data['employee']->nama }}"
                                    disabled></div>
                            <div class="col-md-6"><label class="labels">Nickname</label><input type="text"
                                    class="form-control" value="{{ $data['employee']->nama }}" placeholder="surname"
                                    disabled></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Address Line</label><input type="text"
                                    class="form-control" value="{{ $data['employee']->userinformation->address }}" disabled></div>
                            <div class="col-md-12"><label class="labels">Postcode</label><input type="text"
                                    class="form-control"value="{{ $data['employee']->userinformation->postalcode }}" disabled></div><br>
                        </div>
                        <div class="row mt-2">
                            @if($data['employee'] -> files-> file_cv != Null)
                            <div class="col-md-3 "><label class="labels">CV Document</label><br><a
                                    class="btn btn-primary profile-button"
                                    href="{{ '/downloadcv/'.$data['employee']->id }}">Download</a></div><br>
                                    @endif
                                    @if($data['employee']  -> files-> file_fpk != Null)
                            <div class="col-md-3"><label class="labels">FPK Document</label><br><a
                                    class="btn btn-primary profile-button"
                                    href="{{ '/downloadfpk/'.$data['employee']->id }}">Download</a></div><br>
                                    @endif
                                    @if($data['employee']  -> files-> file_ijazah != Null)
                            <div class="col-md-3 "><label class="labels">Ijazah Document</label><br><a
                                    class="btn btn-primary profile-button"
                                    href="{{ '/downloadijazah/'.$data['employee']->id }}">Download</a></div><br>
                                    @endif
                                    @if($data['employee'] -> files->file_photo != Null)
                            <div class="col-md-3 "><label class="labels">Photo Document</label><br><a
                                    class="btn btn-primary profile-button"
                                    href="{{ '/downloadphoto/'.$data['employee']->id }}">Download</a></div><br>
                                    @endif
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">City</label><input type="text"
                                    class="form-control" value="{{$data['employee']->userinformation->city}}" disabled></div>
                            <div class="col-md-6"><label class="labels">State/Region</label><input type="text"
                                    class="form-control" value="{{$data['employee']->userinformation->state}}" placeholder="state" disabled></div>
                            <div class="mt-5 text-center"><a class="btn btn-primary profile-button" href="/home">Back to
                                Homepage</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </body>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>