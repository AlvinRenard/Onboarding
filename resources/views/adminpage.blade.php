@extends('masteradmin')
@section('konten')
<div class="card">
            <div class="card-header">
            <div class="row mt-2">
                            <div class="col-md-6"> <h3 class="card-title"style="padding-top:10px;">
                <i class="ion ion-clipboard mr-1"></i>
                Registered User
              </h3></div>
                            <div class="col-md-6"> <a style="margin-left:88%;"href="{{url('register')}}" class="btn btn-success">Add User</a></div>
                        </div>
             
             
            </div>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">HR Onboarding</span>
      </a>


      <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a class="d-block">{{Session::get('name')}}</a>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="/adminpage" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Admin Panel</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/home" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item  disabled">
              <a href="/ticket" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Ticket Status</p>
              </a>
            </li>
            <li>
            </li>
            <li class="nav-item">
              <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
                <p style="color:white;"><b>Logout</b></p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
<div class="card">
  <div class="card-body p-0">
    <table class="table table-striped">
      <thead>
        <th class="text-center" scope="col">#</th>
        <th class="text-center" scope="col">Name</th>
        <th class="text-center" scope="col">Email</th>
        <th class="text-center" scope="col">Division</th>
        <th class="text-center" scope="col">Delete User</th>
        <th class="text-center" scope="col">Edit User</th>

        @foreach($user2 as $s2)
        <tr>
          <td class="text-center">{{ $s2->id }}</td>
          <td class="text-center">{{ $s2->name }}</td>
          <td class="text-center">{{ $s2->email }}</td>
          <td class="text-center">{{ $s2->status }}</td>
          @if( $s2->status  == "admin")
          <td class="text-center"><a class="btn btn-danger disabled"onclick="return confirm('Are you sure?')" href="{{ '/deleteuser/'.$s2->id }}">
              Delete
            </a></td>
            <td class="text-center"><a class="btn btn-primary" href="{{ '/edituser/'.$s2->id }}">
              Edit
            </a></td>
            @else
            <td class="text-center"><a class="btn btn-danger"onclick="return confirm('Are you sure?')" href="{{ '/deleteuser/'.$s2->id }}">
              Delete
            </a></td>
            <td class="text-center"><a class="btn btn-primary" href="{{ '/edituser/'.$s2->id }}">
              Edit
            </a></td>
          @endif
           
 
  </tr>
  @endforeach
  </thead>

  </table>
  {{ $pegawai->links() }}
</div>
</div>
@endsection