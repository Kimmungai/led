@extends('layouts.app')

@section('content')
<body class="sign-in-up">
   <section>
     <div id="page-wrapper" class="sign-in-wrapper">
       <div class="graphs">
         <div class="sign-in-form">
           <div class="sign-in-form-top">
             <p><span> Password reset</span> <a href="/"> {{env('APP_NAME','ledamcha')}}</a></p>
           </div>
           <div class="signin">

             <form method="POST" action="{{ route('password.email') }}">
                 @csrf
             <div class="row">

               <div class=" form-group @error('email') has-error @enderror">
         				<div class="col-md-10">
         					<div class="input-group input-icon right in-grp1">
         						<span class="input-group-addon">
         							<i class="fas fa-envelope"></i>
         						</span>
         						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email" autofocus>
         					</div>
         				</div>
         				<div class="col-sm-2">

                  @error('email')
                    <p class="help-block">{{ $message }}</p>
                  @enderror

         				</div>

         			</div>
              <div class="clearfix"> </div>
             </div>



             <input class="mt-2" type="submit" value="Send Password Reset Link">


           </form>
           </div>

         </div>
       </div>
     </div>

@endsection
