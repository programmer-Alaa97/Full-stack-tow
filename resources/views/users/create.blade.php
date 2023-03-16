@extends('include.master')

@section('title')

@stop

@section('css')

@endsection

@section('header-name')

@endsection



@section('content')


 
 <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create User!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('user.store') }}">
                        @csrf

                        <div class="form-group row">
                            {{--  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>  --}}

                                <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name"
                                placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group row">
                            {{--  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>  --}}

                            
                                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
                        </div>

                        <div class="form-group row">
                            {{--  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>  --}}

                            
                                <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" 
                                 placeholder="Password"name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group row">
                            {{--  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>  --}}

                            
                                <input id="password-confirm" type="password" class="form-control form-control-user" 
                                placeholder="Repeat Password" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>

                        <div class="form-group row mb-0">
                           
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                  Create
                                </button>
                         
                        </div>
                    </form>
                            <hr>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection




@section('js')

@endsection
