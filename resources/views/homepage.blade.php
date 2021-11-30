@extends('master')
@section('konten')

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
            <li class="nav-item">
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
        <th class="text-center" scope="col">First name</th>
        <th class="text-center" scope="col">Job</th>
        <th class="text-center" scope="col">Grade</th>
        <th class="text-center" scope="col">Progress</th>
        <th class="text-center" scope="col">Status</th>
        <th class="text-center" scope="col">Reason</th>
        <th class="text-center" scope="col">Idcard</th>
        @foreach($user2 as $s2)
        <tr>
          <td class="text-center">{{ $s2->id }}</td>
          <td class="text-center">{{ $s2->nama }}</td>
          <td class="text-center">{{ $s2->posisi }}</td>
          <td class="text-center">{{ $s2->grade}}</td>
          <td class="text-center">
            <ul class="progressbar">
              @if ($s2 -> progress -> progress == "2")
              <div class="row mt-3">
                <li class="active">Documents Submission</li>
                <li class="active">Documents Complete</br>
                  <a href="{{ '/docs/'.$s2->id.'/'.$s2->token  }}">See Details</a>
                </li>
                <li>Approval by Remuneration<br>
                  <a href="{{ '/sendemail/'.$s2->id.'/'.$s2->token }}">Send Email</a></li>

                <li>Approved by Payroll team</li>
                <li>Approved by Respective Manager</li>
                <li>Employee time arrangement</br>
                <li>Send Employee Contract</br>
          <td class="text-center">{{ $s2->status }}</td>
          <td> </td>
          <td class="text-center"><a href="{{ '/idcard/'.$s2->id.'/'.$s2->token }}" class="btn btn-primary disabled"
        target="_blank">Preview</a></td>
  </div>
  @elseif ($s2 -> progress -> progress == "3")
  <div class="row mt-3">
    <li class="active">Documents Submission</li>
    <li class="active">Documents Complete</br>
      <a href="{{ '/docs/'.$s2->id.'/'.$s2->token  }}">See Details</a>
    </li>
    <li class="active">Accepted by Remuneration</li>
    <li>Approved by Payroll team</li>
    <li>Approved by Respective Manager</li>
    <li>Employee time arrangement</br>
    <li>Send Employee Contract</br>
      <td class="text-center">{{ $s2->status }}</td>
      <td> </td>
      <td class="text-center"><a href="{{ '/idcard/'.$s2->id.'/'.$s2->token }}" class="btn btn-primary disabled"
          target="_blank">Preview</a></td>
  </div>
  @elseif ($s2 -> progress -> progress == "4")
  <div class="row mt-3">
    <li class="active">Documents Submission</li>
    <li class="active">Documents Complete</br>
      <a href="{{ '/docs/'.$s2->id.'/'.$s2->token  }}">See Details</a>
    </li>
    <li class="active">Accepted by Remuneration</li>
    <li>Approved by Payroll team</li>
    <li>Approved by Respective Manager</li>
    <li>Employee time arrangement</br>
    <li>Send Employee Contract</br>
      <td class="text-center">{{ $s2->status }}</td>
      <td> </td>
      <td class="text-center"><a href="{{ '/idcard/'.$s2->id.'/'.$s2->token }}" class="btn btn-primary disabled"
          target="_blank">Preview</a></td>
  </div>
  @elseif ($s2 -> progress -> progress == "5")
  <div class="row mt-3">
    <li class="active">Documents Submission</li>
    <li class="active">Documents Complete</br>
      <a href="{{ '/docs/'.$s2->id.'/'.$s2->token  }}">See Details</a>
    </li>
    <li class="active">Accepted by Remuneration</li>
    <li>Approved by Payroll team</li>
    <li>Approved by Respective Manager</li>
    <li>Employee time arrangement</br>
    <li>Send Employee Contract</br>
      <td class="text-center">{{ $s2->status }}</td>
      <td> </td>
      <td class="text-center"><a href="{{ '/idcard/'.$s2->id.'/'.$s2->token }}" class="btn btn-primary disabled"
          target="_blank">Preview</a></td>
  </div>
  @elseif ($s2 -> progress -> progress == "6")
  <div class="row mt-3">
    <li class="active">Documents Submission</li>
    <li class="active">Documents Complete</br>
      <a href="{{ '/docs/'.$s2->id.'/'.$s2->token  }}">See Details</a>
    </li>
    <li class="active">Accepted by Remuneration</li>
    <li class="active">Approved by Payroll team</li>
    <li>Approved by Respective Manager</li>
    <li>Employee time arrangement</br>
    <li>Send Employee Contract</br>
      <td class="text-center">{{ $s2->status }}</td>
    </li>
    <td> </td>
    <td class="text-center"><a href="{{ '/idcard/'.$s2->id.'/'.$s2->token }}" class="btn btn-primary disabled"
        target="_blank">Preview</a></td>
  </div>
  @elseif ($s2 -> progress -> progress == "7")
  <div class="row mt-3">
    <li class="active">Documents Submission</li>
    <li class="active">Documents Complete</br>
      <a href="{{ '/docs/'.$s2->id.'/'.$s2->token  }}">See Details</a>
    </li>
    <li class="active">Accepted by Remuneration</li>
    <li class="active">Approved by Payroll team </li>
    <li class="active">Approved by Respective Manager</li>
    <li class="active">Employee time arrangement</br>
    <a href="{{ '/datetime/'.$s2->id.'/'.$s2->token  }}">Arrange Time</a>
    <li>Send Employee Contract</br>
    </li>
    <td class="text-center">{{ $s2->status }}</td>
    <td> </td>
    <td class="text-center"><a href="{{ '/idcard/'.$s2->id.'/'.$s2->token }}" class="btn btn-primary "
        target="_blank">Preview</a></td>
  </div>
  @elseif ($s2 -> progress -> progress == "8")
  <div class="row mt-3">
    <li class="active">Documents Submission</li>
    <li class="active">Documents Complete</br>
      <a href="{{ '/docs/'.$s2->id.'/'.$s2->token  }}">See Details</a>
    </li>
    <li class="active">Accepted by Remuneration</li>
    <li class="active">Approved by Payroll team </li>
    <li class="active">Approved by Respective Manager</li>
    <li class="active">Employee time arrangement</br>
    <li class="active">Send Employee Contract</br>
    @if( empty($s2->files->file_photo))
      <a href="{{ '/filenotcomplete/'.$s2->id.'/'.$s2->token  }}">Send Email</a>
      @else
      <a href="{{ '/empcontractemail/'.$s2->id.'/'.$s2->token  }}">Send Email</a>
      @endif
    </li>
    <td class="text-center">{{ $s2->status }}</td>
    <td> </td>
    <td class="text-center"><a href="{{ '/idcard/'.$s2->id.'/'.$s2->token }}" class="btn btn-primary "
        target="_blank">Preview</a></td>
  </div>
  @else
  <div class="row mt-3">
    <li>Documents Submission</br>
      <a href="{{ '/empemail/'.$s2->id.'/'.$s2->token }}">Send Email</a>
    </li>
    <li>Documents Complete</li>
    <li>Accepted by Remuneration</li>
    <li>Approved by Payroll team</li>
    <li>Approved by Respective Manager</li>
    <li>Send Employee Contract</br>
      <td class="text-center">{{ $s2->status }}</td>
      @if(isset($s2->rejected->reason ))
      <td class="text-center">{{ $s2->rejected->reason }}</td>
      @else
      <td></td>
      @endif
  </div>
  <td class="text-center"><a href="{{ '/idcard/'.$s2->id.'/'.$s2->token }}" class="btn btn-primary disabled"
      target="_blank">Preview</a></td>
  @endif
  </tr>
  @endforeach
  </thead>
  </table>
  {{ $pegawai->links() }}
</div>
</div>
@endsection