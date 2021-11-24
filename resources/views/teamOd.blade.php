<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Responsive Table + Detail View</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/table.css') }}">

  <script>
function myFunction() {
   var element = document.getElementById("myDIV");
   element.classList.toggle("mystyle");
}
</script>
</head>

<body style ="background-image: url('{{asset('images/indosatbg.png')}}'); 
    background-repeat:no-repeat;
    background-size: 100%;
    background-position: center;">
  <h1>
  OD TEAM
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
      <th class="text-center" scope="col">Position Code</th>
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
  <form action="{{ '/kodeposisi/'.$data['employee']->id }}" method="post">
  {{ csrf_field() }}
    <input type="text" pattern="[A-Z0-9]{2,}" placeholder=" {{ $data['employee']->nama }} " id="kode" name="kode">
    <input type="hidden" name="id" value="{{$data['employee']->id}}">
    <input type="submit" value="Submit">
  </form>
        </td>
      </tr>
    </tbody>
  </table>
  </div>
</main>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script type="text/javascript" src="{{ URL::asset('dist/table.js') }}"></script>

</body>
</html>

