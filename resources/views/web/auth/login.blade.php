@extends('web.template.main')
@section('content')

    <div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 50px);">

        <div class="row w-card-login">
            <div class="col-12">
                <div class="card card-login">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login_auth') }}">
                            @csrf
                            <input type="hidden" value="0" name="login-admin">
                            <div class="form-group row">
                                <div class="col-12 col-sm-12 col-md-6 mx-auto">
                                    <input id="email"
                                           type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email-login"
                                           value="{{ old('email') }}"
                                           required
                                           autocomplete="off"
                                           autofocus
                                           placeholder="Correo electrónico">

                                    @error('email')
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

                            <div class="row text-center my-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        Iniciar sesión
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
