@extends('web.template.main')
@push('scripts')
@endpush
@section('title','Iniciar sesión')
@section('content')
    <div class="container-fluid p-0 bg-primary-light">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="card m-1 m-lg-5" style="border-radius: 20px">
                    <div class="card-body p-0">
                        <div class="row m-0">
                            <div class="col-12 text-center my-3">
                                <h1 class="color-primary">Iniciar sesión</h1>
                            </div>
                            <div class="col-12">
                                <form method="POST" action="{{ route('login_auth') }}">
                                    @csrf
                                    <input type="hidden" value="0" name="login-admin">
                                    <div class="form-group row">
                                        <div class="col-12 col-sm-12 col-md-6 mx-auto">
                                            <input id="email"
                                                   type="email"
                                                   class="form-control @error('email-login') is-invalid @enderror"
                                                   name="email-login"
                                                   value="{{ old('email') }}"
                                                   required
                                                   autocomplete="off"
                                                   autofocus
                                                   placeholder="Correo electrónico">

                                            @error('email-login')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12 col-sm-12 col-md-6 mx-auto">
                                            <input id="password"
                                                   type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password-login"
                                                   required
                                                   autocomplete="off"
                                                   placeholder="Contraseña">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row  my-3">
                                        <div class="col-6 text-right">
                                            <button type="submit" class="btn btn-primary">
                                                Iniciar sesión
                                            </button>
                                        </div>
                                        <div class="col-6 ">
                                            <a href="{{route('web_user_create')}}"  class="btn btn-outline-secondary"  >Crear cuenta
                                            </a>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
