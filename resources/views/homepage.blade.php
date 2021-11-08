@extends('master')
@section('konten')
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
        @foreach($user2 as $s2)
        <tr>
          <td class="text-center">{{ $s2->id }}</td>
          <td class="text-center">{{ $s2->nama }}</td>
          <td class="text-center">{{ $s2->posisi }}</td>
          <td class="text-center">{{ $s2->grade}}</td>
          <td class="text-center">
            <ul class="progressbar">
          @if ($s2 -> progress -> progress == "5")
          <div class="row mt-3">
            <li class="active">Documents Submission</li>
            <li class="active">Documents Complete</br>
              <a href="{{ '/docs/'.$s2->id.'/'.$s2->token  }}">See Details</a>
            </li>
            <li>Accepted by Remuneration<br>
            <a href="{{ '/sendemail/'.$s2->id.'/'.$s2->token }}">Send Email</a></li>
            <li>Approved by Respective Manager</li>
            <li>Approved by Payroll team</li>

            <td class="text-center">{{ $s2->status }}</td>
          </div>
          @elseif ($s2 -> progress -> progress == "6")
          <div class="row mt-3">
            <li class="active">Documents Submission</li>
            <li class="active">Documents Complete</br>
              <a href="{{ '/docs/'.$s2->id.'/'.$s2->token  }}">See Details</a>
            </li>
            <li class="active">Accepted by Remuneration</li>
            <li>Approved by Respective Manager</li>
            <li>Approved by Payroll team</li>

            <td class="text-center">{{ $s2->status }}</td>
          </div>
          @elseif ($s2 -> progress -> progress == "7")
          <div class="row mt-3">
            <li class="active">Documents Submission</li>
            <li class="active">Documents Complete</br>
              <a href="{{ '/docs/'.$s2->id.'/'.$s2->token  }}">See Details</a>
            </li>
            <li class="active">Accepted by Remuneration</li>
            <li class="active">Approved by Respective Manager</li>
            <li>Approved by Payroll team</li>

            <td class="text-center">{{ $s2->status }}</td>
          </div>
          @else
          <div class="row mt-3">
            <li class="active">Documents Submission</br>
              <a href="{{ '/empemail/'.$s2->id.'/'.$s2->token }}">Send Email</a>
            </li>
            <li>Documents Complete</li>
            <li>Accepted by Remuneration</li>
            <li>Approved by Respective Manager</li>
            <li>Approved by Payroll team</li>

            <td class="text-center">{{ $s2->status }}</td>
          </div>
          @endif
          </td>
        </tr>
        @endforeach
      </thead>
    </table>
    {{ $pegawai->links() }}
  </div>
</div>
@endsection