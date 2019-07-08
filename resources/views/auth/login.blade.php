@extends('layouts.app')

@section('content')
<body class="sign-in-up">
   <section>
     <div id="page-wrapper" class="sign-in-wrapper">
       <div class="graphs">
         <div class="sign-in-form">
           <div class="sign-in-form-top">
             <p><span>Login </span> <a href="/">{{env('APP_NAME','ledamcha')}}</a></p>
           </div>
           <div class="signin">

             <form method="POST" action="{{ route('login') }}">
                 @csrf
             <div class="row">

               <div class=" form-group @error('email') has-error @enderror">
         				<div class="col-md-12">
         					<div class="input-group input-icon right in-grp1">
         						<span class="input-group-addon">
         							<i class="fas fa-envelope"></i>
         						</span>
         						<input id="email" type="email" class="form-control1 @error('email') has-error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your email" autofocus>
         					</div>

         				</div>

         			</div>
              <div class="clearfix"> </div>
             </div>

             <div class="row mt-2">

               <div class=" form-group @error('password') has-error @enderror @error('email') has-error @enderror">
         				<div class="col-md-12">
         					<div class="input-group input-icon right in-grp1">
         						<span class="input-group-addon">
         							<i class="fa fa-key"></i>
         						</span>
         						<input id="password" type="password" class="form-control1 @error('password') has-error @enderror" name="password" required placeholder="Your password" autocomplete="current-password">
         					</div>

                  @error('email')
                    <p class="help-block">{{ $message }}</p>
                  @enderror

                  @error('password')
                    <p class="help-block">{{ $message }}</p>
                  @enderror

         				</div>

         			</div>
              <div class="clearfix"> </div>
             </div>

             <input class="mt-2" type="submit" value="Login to your account">

             <div class="mt-1">
               <div class="signin-rit">
                 <span class="checkbox1">
                    <label class="checkbox"><input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember me ?</label>
                 </span>
                 <div class="clearfix"> </div>
               </div>
               <p><a href="{{ route('password.request') }}">Click here to reset your password</a> </p>
               <div class="clearfix"> </div>
             </div>
           </form>
           </div>

         </div>
       </div>
     </div>
@endsection
