<!DOCTYPE html>
 <html lang="en">
<!-- Main Section -->

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Renard - Onboarding</title>
   <link rel="stylesheet" type="text/css" href="{{ asset('/css/adminlte.min.css') }}">
 </head>
<body class="hold-transition login-page">
<section class="main-section">
    <!-- Add Your Content Inside -->
    <div class="content">
        <!-- Remove This Before You Start -->
        <h1>Register New User</h1>
        <hr>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ '/edituserPost/'.$id }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="alamat">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="alamat">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
            <div class="input_field select_option">
            <label for="alamat">Status:</label>
                <select class="form-control" id="status" name="status">
                <option value="" disabled selected>Select Employee Role</option>
                  <option>Admin</option>
                  <option>Human Resource Development</option>
                  <option>Remuneration</option>
               
                </select>
                <div class="select_arrow"></div>
              </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-md btn-primary">Submit</button>
            </b> ||
                <a href="/adminpage">Back to Homepage</button>
            </div>
        </form>
    </div>
    <!-- /.content -->
</section>
</body>
<!-- /.main-section -->
</html>


