<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Responsive Table + Detail View</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/table.css') }}">

  
</head>

<body>
  <h1>
  Remuneration
</h1>
<p>
All Set! Ready to be reviewed
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
        {{ $data['employee']->alamat }}
        </td>
        <td class='select'>
          <a class='button' href='#'>
            Select
          </a>
        </td>
        <td class='action'>
          <a href="{{ '/accept/'.$data['employee']->id }}">
            Accept
          </a>
          <a href="{{ '/reject/'.$data['employee']->id }}">
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
          E-mail
        </dt>
        <dd>
        {{ $data['employee']->alamat }}
        </dd>
        <dt>
          City
        </dt>
        <dd>
        {{ $data['employee']->alamat }}
        </dd>
        <dt>
          Phone-Number
        </dt>
        <dd>
        {{ $data['employee']->alamat }}
        </dd>
        <dt>
          CV Document
        </dt>
        <dd>
        <a href="{{ '/downloadcv/'.$data['employee']->id }}">Download</a>
        </dd>
        <dt>
          FPK Document
        </dt>
        <dd>
        <a href="{{ '/downloadfpk/'.$data['employee']->id }}">Download</a>
        </dd>
        <dt>
          Ijazah Document
        </dt>
        <dd>
        <a href="{{ '/downloadijazah/'.$data['employee']->id }}">Download</a>
        </dd>
        <dt>
          Photo Document
        </dt>
        <dd>
        <a href="{{ '/downloadphoto/'.$data['employee']->id }}">Download</a>
        </dd>
        <dt>
          Notes
        </dt>
        <dd>
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
        </dd>
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
    