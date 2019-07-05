@extends('layouts.app')

@section('content')
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
<body class="sign-in-up">
   <section>
     <div id="page-wrapper" class="sign-in-wrapper">
       <div class="graphs">
         <div class="sign-in-form">
           <div class="sign-in-form-top">
             <p><span>{{env('APP_NAME','ledamcha')}}</span> <a href="#">Login</a></p>
           </div>
           <div class="signin">

             <form method="POST" action="{{ route('login') }}">
                 @csrf
             <div class="row">

               <div class=" form-group @error('email') has-error @enderror">
         				<div class="col-md-10">
         					<div class="input-group input-icon right in-grp1">
         						<span class="input-group-addon">
         							<i class="fa fa-envelope-o"></i>
         						</span>
         						<input id="email" type="email" class="form-control1 @error('email') has-error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your email" autofocus>
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

             <div class="row mt-2">

               <div class=" form-group @error('password') has-error @enderror">
         				<div class="col-md-10">
         					<div class="input-group input-icon right in-grp1">
         						<span class="input-group-addon">
         							<i class="fa fa-key"></i>
         						</span>
         						<input id="password" type="password" class="form-control @error('password') has-error @enderror" name="password" required placeholder="Your password" autocomplete="current-password">
         					</div>
         				</div>
         				<div class="col-sm-2">

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
