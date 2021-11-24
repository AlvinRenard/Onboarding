<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Responsive Table + Detail View</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
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

  <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/table.css') }}">
  <style>
    .button1 {
      color: #fff !important;
      text-transform: uppercase;
      text-decoration: none;
      background: #60a3bc;
      padding: 10px;
      border-radius: 50px;
      display: inline-block;
      border: none;
      transition: all 0.4s ease 0s;
    }

    .accept {
      color: #fff !important;
      text-transform: uppercase;
      text-decoration: none;
      background: green;
      padding: 10px;
      border-radius: 50px;
      display: inline-block;
      border: none;
      transition: all 0.4s ease 0s;
    }

    .reject {
      color: #fff !important;
      text-transform: uppercase;
      text-decoration: none;
      background: red;
      padding: 10px;
      border-radius: 50px;
      display: inline-block;
      border: none;
      transition: all 0.4s ease 0s;
    }

    #select {
      color: #fff !important;
      text-transform: uppercase;
      text-decoration: none;
      background: #60a3bc;
      padding: 15px;
      border-radius: 50px;
      display: inline-block;
      border: none;
      transition: all 0.4s ease 0s;
    }

    .button {
      font-size: 16px;
    }

    td {
      text-align: center;
      vertical-align: middle;
    }

    dt {
      text-align: center;
    }

    dl {
      text-align: center;
    }
  </style>
</head>

<body style="background-image: url('{{asset('images/indosatbg.png')}}'); 
    background-repeat:no-repeat;
    background-size: 100%;
    background-position: center;">
  <h1>
    Remuneration
  </h1>
  <p>
    Ready to be reviewed
  </p>
  <main>
    <table>
      <thead>
        <tr>
          <th class="text-center" scope="col">#</th>
          <th class="text-center" scope="col">Name</th>
          <th class="text-center" scope="col">Address</th>
          <th class="text-center" scope="col">Details</th>
          <th class="text-center" scope="col">Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan='3'>

          </th>
        </tr>
      </tfoot>
      <tbody>
        <tr>
          <td data-title='ID'>
            {{ $data['employee']->id }}
          </td>
          <td data-title='E-mail'>
            {{ $data['employee']->nama }}
          </td>
          <td data-title='E-mail'>
            {{ $data['employee']->email }}
          </td>
          <td class='select'>
            <a class='button' id="select" href='#'>
              Preview
            </a>
          </td>
          <!-- <td class='select'>
        <a class="button1" href="{{ '/sendemailod/'.$data['employee']->id.'/'.$data['employee']->token}}">Send Email</a>
  <!-- <form action="{{ '/kodeposisi/'.$data['employee']->id }}" method="post">
  {{ csrf_field() }}
    <input type="text"  placeholder=" {{ $data['employee']->nama }} " id="kode" name="kode">
    <input type="hidden" name="id" value="{{$data['employee']->id}}">
    <input type="submit" value="Submit">
  </form>
        </td> -->
          <td class='action'>

            <a class="accept" onclick="return confirm('Are you sure?')" href="{{ '/accept/'.$data['employee']->id }}">
              Accept
            </a>
            <a class="reject" href="{{ '/rejectlanding/'.$data['employee']->id.'/'.$data['employee']->token }}">
              Reject
            </a>
          </td>
        </tr>
      </tbody>
    </table>
    <div class='detail'>
      <div class='detail-container'>
        <dl>
          <dt>
            Full Name
          </dt>
          <dd>
            {{ $data['employee']->nama }}
          </dd>
          <dt>
            Position
          </dt>
          <dd>
            {{ $data['employee']->posisi }}
          </dd>
          <dt>
            E-mail
          </dt>
          <dd>
            {{ $data['employee']->email }}
          </dd>
          <dt>
            Address
          </dt>
          <dd>
            {{ $data['employee']->userinformation->address }}
          </dd>
          <dt>
            City
          </dt>
          <dd>
            {{ $data['employee']->userinformation->city }}
          </dd>
          <dt>
            Grade
          </dt>
          <dd>
            {{ $data['employee']->grade }}
          </dd>
          <dt>
            State
          </dt>
          <dd>
            {{ $data['employee']->userinformation->state }}
          </dd>
          <dt>
            Post Code
          </dt>
          <dd>
            {{ $data['employee']->userinformation->postalcode }}
          </dd>

          @if($data['employee'] -> files-> file_cv != Null)
          <dt>
            CV Document
          </dt>
          <dd>
            <a class="btn btn-success" href="{{ '/downloadcv/'.$data['employee']->id }}">Download</a>
          </dd>
          @endif
          @if($data['employee'] -> files-> file_fpk != Null)
          <dt>
            FPK Document
          </dt>
          <dd>
            <a class="btn btn-success" href="{{ '/downloadfpk/'.$data['employee']->id }}">Download</a>
          </dd>
          @endif
          @if($data['employee'] -> files-> file_ijazah != Null)
          <dt>
            Ijazah Document
          </dt>
          <dd>
            <a class="btn btn-success" href="{{ '/downloadijazah/'.$data['employee']->id }}">Download</a>
          </dd>
          @endif
          @if($data['employee'] -> files->file_photo != Null)
          <dt>
            Photo Document
          </dt>
          <dd>
            <a class="btn btn-success" href="{{ '/downloadphoto/'.$data['employee']->id }}">Download</a>
          </dd>
          @endif

        </dl>
      </div>
      <div class='detail-nav'>
        <button class='close'>
          Close
        </button>
      </div>
    </div>
  </main>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script type="text/javascript" src="{{ URL::asset('dist/table.js') }}"></script>

</body>

</html>

<!-- 
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="ion ion-clipboard mr-1"></i>
          Employee Onboarding Ticket
        </h3>
        <div class="card-tools">
        </div>
      </div>
      <div class="card">
        <div class="card-body p-0">
          <table class="table table-striped">
            <thead>
              <th class="text-center" scope="col">#</th>
              <th class="text-center" scope="col">First name</th>
              <th class="text-center" scope="col">Job</th>
              <th class="text-center" scope="col">Progress</th>
              <th class="text-center" scope="col">Finalize</th>
              <tr>
                <td class="text-center">{{ $data['employee']->id }}</td>
                <td class="text-center">{{ $data['employee']->nama }}</td>
                <td class="text-center">{{ $data['employee']->alamat }}</td>
                <td class="text-center">
                  <ul class="progressbar">
                    <li class="active">Submit CV Document</br>
                      <a href="{{ '/downloadcv/'.$data['employee']->id }}">Download</a>
                    </li>
                    <li class="active">Submit FPK Document</br>
                      <a href="{{ '/downloadfpk/'.$data['employee']->id }}">Download</a>
                    </li>
                    <li class="active">Submit Ijazah Document</br>
                      <a href="{{ '/downloadijazah/'.$data['employee']->id }}">Download</a>
                    </li>
                    <li class="active">Submit Photo</br>
                      <a href="{{ '/downloadphoto/'.$data['employee']->id }}">Download</a>
                    </li>
                </td>
                <td class="text-center">

                </td>
              </tr>
            </thead>
          </table>
        </div> -->