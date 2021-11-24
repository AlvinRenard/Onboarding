<!DOCTYPE html>
<html>

<head>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css"
    integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"
    integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>
</head>

<body style="background-image:  url('{{asset('images/bg-masthead.jpg')}}')">
  <div class="container">
    <form action="{{ '/uploaddate/'.$data['employee']->id.'/'.$data['employee']->token }}" method="POST"
      enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row" style="margin-top: 100px;">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3>Please arrange employee first day time</h3>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label>Pick date and time below</label>
                <input type="text" class="form-control datetimepicker"  name="time">
              </div>
              <div class="row justify-content-center"style="padding-left:20px;">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script type="text/javascript">
    $(function() {
      $('.datetimepicker').datetimepicker({
    format: 'YY-MM-DD HH-mm',
  });
    
    });
  </script>
</body>

</html>