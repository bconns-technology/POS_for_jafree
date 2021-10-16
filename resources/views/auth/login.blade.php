@extends('layouts.app')

@section('content')
<!-- <div class="container">
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
</div> -->

 @guest

    <div class="card">
    <div class="card-title">
        <h1 class="text-center">JAFREE MACHINERY & TOOLS </h1>  
<br>
<br>
        <h3 class="text-center"> Welcome to Sign In  </h3>         
    </div>
    
 <div class="card-body" > 

                 
            <div class="row justify-content-center">
                <div class="col-lg-6  bg-primary">

                <form class="form-horizontal m-t-20" method="POST" action="{{route('login') }}">
                    @csrf

                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        @foreach($errors->all() as $error)
                        <strong>{{$error}}</strong>
                        @endforeach

                    </div>
                    @endif
                    
                    <div class="form-group ">
                        <div class="col-md-12">
                            <label for="email" class="col-md-4 col-form-label text-left">{{ __('E-Mail Address') }}</label>
                            
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email Address"autofocus>

                            <!--  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="password" class="col-md-4 col-form-label text-left">{{ __('Password') }}</label>
                             
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Password">

                               <!--  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary">
                            

                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                            </div>

                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button  class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                             @if (Route::has('password.request'))
                                    <a style="color:white;" class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                    </div>

                    <div class="form-group">
                        
                        <div class="col-md-12 text-right">
                            <a style="color:white;" href="{{ route('register') }}">Create an account</a>
                        </div>
                    </div>
                </form> 
                                                
                </div>
            </div>
        </div>
</div>

     @else

     
@endguest





@endsection
