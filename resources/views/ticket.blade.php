@extends('master')
@section('konten')
<div class="card">
  <div class="card-body p-0">
    <table class="table table-striped">
      <thead>
        <th class="text-center" scope="col">#</th>
        <th class="text-center" scope="col">First name</th>
        <th class="text-center" scope="col">Position</th>
        <th class="text-center" scope="col">Email</th>
        <th class="text-center" scope="col">Grade</th>
        <th class="text-center" scope="col">Kode</th>
        <th class="text-center" scope="col">Status</th>
        <th class="text-center" scope="col">Job Contract</th>

        @foreach($empdata as $dd)
        <tr>
          @if ($dd->odprogress == "1")
          <td class="text-center">{{ $dd->EmployeeId }}</td>
          <td class="text-center">{{ $dd->nama }}</td>
          <td class="text-center">{{ $dd->posisi }}</td>
          <td class="text-center">{{ $dd->email}}</td>
          <td class="text-center">{{ $dd->grade}}</td>
          <td class="text-center">
            <ul class="progressbar2">
              <div class="row mt-3">
                <li>Request Sent to OD</br>
                <a href="{{ '/sendemailod/'.$dd->EmployeeId.'/'.$dd->token}}">Request OD</a></li>
                <li>Code Position Filled</br>
                </li>
                <li>Approved by Respective Manager<br>
              </div>
          </td>
          <td class="text-center">{{ $dd->status }}</td>
          <td class="text-center"><a href="{{ '/certif/'.$dd->EmployeeId.'/'.$dd->token }}"
              class="btn btn-primary disabled " target="_blank">Preview</a></td>
              @elseif ($dd->odprogress == "2")
          <td class="text-center">{{ $dd->EmployeeId }}</td>
          <td class="text-center">{{ $dd->nama }}</td>
          <td class="text-center">{{ $dd->posisi }}</td>
          <td class="text-center">{{ $dd->email}}</td>
          <td class="text-center">{{ $dd->grade}}</td>
          <td class="text-center">
            <ul class="progressbar2">
              <div class="row mt-3">
              <li class="active">Request Sent to OD
              <a href="{{ '/sendemailod/'.$dd->EmployeeId.'/'.$dd->token}}">Request OD</a></li>
                <li>Code Position Filled</li>
                <li>Approved by Respective Manager</li>
              </div>
          </td>
          <td class="text-center">{{ $dd->status }}</td>
          <td class="text-center"><a href="{{ '/certif/'.$dd->EmployeeId.'/'.$dd->token }}" class="btn btn-primary disabled "
              target="_blank">Preview</a></td>
          @elseif ($dd->odprogress == "3")
          <td class="text-center">{{ $dd->EmployeeId }}</td>
          <td class="text-center">{{ $dd->nama }}</td>
          <td class="text-center">{{ $dd->posisi }}</td>
          <td class="text-center">{{ $dd->email}}</td>
          <td class="text-center">{{ $dd->grade}}</td>
          <td class="text-center">
            <ul class="progressbar2">
              <div class="row mt-3">
              <li class="active">Request Sent to OD</li>
                <li class="active">Code Position Filled</br></li>
                <li>Approved by Respective Manager<br>
                @if ($dd->grade == "1")
                <a href="{{ '/finalapproval1/'.$dd->EmployeeId.'/'.$dd->token}}">Send Email</a></li>
                @elseif ($dd->grade == "2")
                <a href="{{ '/finalapproval1/'.$dd->EmployeeId.'/'.$dd->token}}">Send Email</a></li>
                @elseif ($dd->grade == "3")
                <a href="{{ '/finalapproval2/'.$dd->EmployeeId.'/'.$dd->token}}">Send Email</a></li>
                @elseif ($dd->grade == "4")
                <a href="{{ '/finalapproval2/'.$dd->EmployeeId.'/'.$dd->token}}">Send Email</a></li>
                @elseif ($dd->grade == "5")
                <a href="{{ '/finalapproval3/'.$dd->EmployeeId.'/'.$dd->token}}">Send Email</a></li>
                @endif
                </li>
              </div>
          </td>
          <td class="text-center">{{ $dd->status }}</td>
          <td class="text-center"><a href="{{ '/certif/'.$dd->EmployeeId.'/'.$dd->token }}" class="btn btn-primary disabled "
              target="_blank">Preview</a></td>
          @elseif ($dd->odprogress == "4")
          <td class="text-center">{{ $dd->EmployeeId }}</td>
          <td class="text-center">{{ $dd->nama }}</td>
          <td class="text-center">{{ $dd->posisi }}</td>
          <td class="text-center">{{ $dd->email}}</td>
          <td class="text-center">{{ $dd->grade}}</td>
          <td class="text-center">
            <ul class="progressbar2">
              <div class="row mt-3">
              <li class="active">Request Sent to OD</li>
                <li class="active">Code Position Filled</br></li>
                <li class="active">Approved by Respective Manager<br></li>
              </div>
          </td>
          <td class="text-center">{{ $dd->status }}</td>
          <td class="text-center"><a href="{{ '/certif/'.$dd->EmployeeId.'/'.$dd->token }}" class="btn btn-primary "
              target="_blank">Preview</a></td>
          @elseif ($dd->odprogress == "0")
          <td class="text-center">{{ $dd->EmployeeId }}</td>
          <td class="text-center">{{ $dd->nama }}</td>
          <td class="text-center">{{ $dd->posisi }}</td>
          <td class="text-center">{{ $dd->email}}</td>
          <td class="text-center">{{ $dd->grade}}</td>
          <td class="text-center">{{ $dd->status }}</td>
          <td></td>
          <td></td>
          @else
          <td class="text-center">{{ $dd->EmployeeId }}</td>
          <td class="text-center">{{ $dd->nama }}</td>
          <td class="text-center">{{ $dd->posisi }}</td>
          <td class="text-center">{{ $dd->email}}</td>
          <td class="text-center">{{ $dd->grade}}</td>

        
          </td>
          <td class="text-center">{{ $dd->status }}</td>
          <td class="text-center"><a href="{{ '/certif/'.$dd->EmployeeId.'/'.$dd->token }}" class="btn btn-primary"
              target="_blank">Preview</a></td>
          @endif

        </tr>
        @endforeach
      </thead>
    </table>
    {{ $pegawai->links() }}
  </div>
  <!-- /.card-header -->
  </section>
  @endsection