@extends('layouts.app')

@section('content')


<div class="page-header header-filter" style="background-image: url('../assets/img/bg7.jpg'); background-size: cover; background-position: top center;">

<div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">

      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
    
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group mb-3">
              <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="material-icons">mail</i>
                </div>
              </div>
            @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="input-group mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Senha">
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="material-icons">lock_outline</i>
                </div>
              </div>
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
             @enderror

            </div>
            <div class="row">

              <!-- /.col -->
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
 
          </p> 
        </div>
        <!-- /.login-card-body -->
      </div>





    </div>
    </div>
    <!-- /.login-box -->
  </div>
</div>
@endsection
