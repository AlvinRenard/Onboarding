 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Renard - Onboarding</title>
   <link rel="stylesheet" type="text/css" href="{{ asset('/css/adminlte.min.css') }}">
 </head>

 <body class="hold-transition login-page">
   <div class="login-box">
     <div class="login-logo">
       <a href="../../index2.html"><b>HR |</b>|Onboarding</a>
     </div>

     <div class="card">
       <div class="card-body login-card-body">
         <p class="login-box-msg">Sign in to start your session</p>
         @if(\Session::has('alert'))
         <div class="alert alert-danger">
           <div>{{Session::get('alert')}}</div>
         </div>
         @endif
         @if(\Session::has('alert-success'))
         <div class="alert alert-success">
           <div>{{Session::get('alert-success')}}</div>
         </div>
         @endif
         <form action="{{ url('/loginPost') }}" method="post">
           {{ csrf_field() }}
           <div class="input-group mb-3">
             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
               value="{{ old('email') }}" required autocomplete="email" autofocus>

             @error('email')
             <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
             </span>
             @enderror
             <div class="input-group-append">
               <div class="input-group-text">
                 <span class="fas fa-envelope"></span>
               </div>
             </div>
           </div>
           <div class="input-group mb-3">
             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
               name="password" required autocomplete="current-password">

             @error('password')
             <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
             </span>
             @enderror
             <div class="input-group-append">
               <div class="input-group-text">
                 <span class="fas fa-lock"></span>
               </div>
             </div>
           </div>
           <div class="row">
             <div class="col-8">

               <button type="submit" class="btn btn-primary btn-block">Sign In</button>
             </div>

           </div>
         </form>
       </div>
     </div>
   </div>


 </body>

 </html>