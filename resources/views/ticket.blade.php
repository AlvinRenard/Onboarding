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
          @if ($dd->progress->progress == "3")
          <td class="text-center">{{ $dd->EmployeeId }}</td>
          <td class="text-center">{{ $dd->nama }}</td>
          <td class="text-center">{{ $dd->posisi }}</td>
          <td class="text-center">{{ $dd->email}}</td>
          <td class="text-center">{{ $dd->grade}}</td>
          <td class="text-center">
            <ul class="progressbar2">
              <div class="row mt-3">
                <li>Request Sent to OD</br>
                  <a href="{{ '/sendemailod/'.$dd->remuneration->EmployeeId.'/'.$dd->token}}">Request OD</a></li>
                <li>Code Position Filled</br>
                </li>
                <li>Approved by Finance<br></li>
                <li>Approved by Respective Manager<br>

              </div>
          </td>
          <td class="text-center">{{ $dd->remuneration->status }}</td>
          <td class="text-center"><a href="{{ '/certif/'.$dd->EmployeeId.'/'.$dd->remuneration->token }}"
              class="btn btn-primary disabled " target="_blank">Preview</a></td>
          @elseif ($dd->progress->progress == "4")
          <td class="text-center">{{ $dd->EmployeeId }}</td>
          <td class="text-center">{{ $dd->nama }}</td>
          <td class="text-center">{{ $dd->posisi }}</td>
          <td class="text-center">{{ $dd->email}}</td>
          <td class="text-center">{{ $dd->grade}}</td>
          <td class="text-center">
            <ul class="progressbar2">
              <div class="row mt-3">
                <li class="active">Request Sent to OD</br>
                  <a href="{{ '/sendemailod/'.$dd->remuneration->EmployeeId.'/'.$dd->token}}">Request OD</a></li>
                <li>Code Position Filled</li>
                <li>Approved by Finance<br></li>
                <li>Approved by Respective Manager</li>

              </div>
          </td>
          <td class="text-center">{{ $dd->remuneration->status }}</td>
          <td class="text-center"><a href="{{ '/certif/'.$dd->remuneration->EmployeeId.'/'.$dd->token }}"
              class="btn btn-primary disabled " target="_blank">Preview</a></td>
          @elseif ($dd->progress->progress == "5")
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
                <li>Approved by Finance</br>
                <a href="{{ '/financeapproval/'.$dd->remuneration->EmployeeId.'/'.$dd->token}}">Send Email</a></li>
                <li>Approved by Respective Manager</li>
              </div>
            </ul>

          </td>
          <td class="text-center">{{ $dd->remuneration->status }}</td>
          <td class="text-center"><a href="{{ '/certif/'.$dd->remuneration->EmployeeId.'/'.$dd->token }}"
              class="btn btn-primary disabled " target="_blank">Preview</a></td>
          @elseif ($dd->progress->progress == "6")
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
                <li  class="active">Approved by Finance</li>
                <li>Approved by Respective Manager<br>
                  @if ($dd->grade == "1")
                  <a href="{{ '/finalapproval1/'.$dd->remuneration->EmployeeId.'/'.$dd->token}}">Send Email</a></li>
                @elseif ($dd->grade == "2")
                <a href="{{ '/finalapproval1/'.$dd->remuneration->EmployeeId.'/'.$dd->token}}">Send Email</a></li>
                @elseif ($dd->grade == "3")
                <a href="{{ '/finalapproval2/'.$dd->remuneration->EmployeeId.'/'.$dd->token}}">Send Email</a></li>
                @elseif ($dd->grade == "4")
                <a href="{{ '/finalapproval2/'.$dd->remuneration->EmployeeId.'/'.$dd->token}}">Send Email</a></li>
                @elseif ($dd->grade == "5")
                <a href="{{ '/finalapproval3/'.$dd->remuneration->EmployeeId.'/'.$dd->token}}">Send Email</a></li>
                @endif
                </li>
              </div>
          </td>
          <td class="text-center">{{ $dd->remuneration->status }}</td>
          <td class="text-center"><a href="{{ '/certif/'.$dd->remuneration->EmployeeId.'/'.$dd->token }}" class="btn btn-primary disabled "
              target="_blank">Preview</a></td>
          @elseif ($dd->progress->progress == "7")
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
                <li class="active">Approved by Finance<br>
                <li class="active">Approved by Respective Manager<br></li>
              </div>
          </td>
            @if(isset($dd->remuneration->status))
           <td class="text-center">{{ $dd->remuneration->status }}</td>
            @else
           <td></td>
            @endif
            @if(isset($dd->remuneration->EmployeeId))
          <td class="text-center"><a href="{{ '/certif/'.$dd->remuneration->EmployeeId.'/'.$dd->token }}" class="btn btn-primary "    target="_blank">Preview</a></td>
            @else
           <td></td>
            @endif
          
          @elseif ($dd->progress->progresss == "0")
          <td class="text-center">{{ $dd->EmployeeId }}</td>
          <td class="text-center">{{ $dd->nama }}</td>
          <td class="text-center">{{ $dd->posisi }}</td>
          <td class="text-center">{{ $dd->email}}</td>
          <td class="text-center">{{ $dd->grade}}</td>
          <td class="text-center">
            <ul class="progressbar2">
              <div class="row mt-3">
                <li>Request Sent to OD
                <li>Code Position Filled</li>
                <li>Approved by Finance</li>
                <li>Approved by Respective Manager</li>
              </div>
          </td>
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
          @if(isset($dd->remuneration->status))
           <td class="text-center">{{ $dd->remuneration->status }}</td>
            @else
           <td> </td>
           @endif
           <td> </td>
          <td class="text-center"><a href="{{ '/certif/'.$dd->id.'/'.$dd->token }}" class="btn btn-primary disabled"
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