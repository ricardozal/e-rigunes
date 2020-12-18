@extends('web.template.main')
@push('scripts')
<script src="{{asset('js/web/login/index.js?v=2')}}"></script>
@endpush
@section('title','Crear cuenta')
@section('content')
    <div class="container-fluid p-0 bg-primary-light">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="card m-1 m-lg-5" style="border-radius: 20px">
                    <div class="card-body p-0">
                        <div class="row m-0">
                            <div class="col-12 text-center my-3">
                                <h1 class="color-primary">Crear cuenta</h1>
                            </div>
                            <div class="col-12">
                                <form id="form-create-profile" action="{{route('web_user_create_post')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="email">Correo electrónico</label>
                                                <input id="email"
                                                       type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       name="email"
                                                       value="{{ old('email') }}"
                                                       autocomplete="off"
                                                       placeholder="Correo electrónico">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="phone">Teléfono</label>
                                                <input id="phone"
                                                       type="text"
                                                       class="form-control @error('phone') is-invalid @enderror"
                                                       name="phone"
                                                       value="{{ old('phone') }}"
                                                       autocomplete="off"
                                                       placeholder="Teléfono">
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="birthday">Fecha de nacimiento</label>
                                                <input id="birthday"
                                                       type="date"
                                                       class="form-control @error('birthday') is-invalid @enderror"
                                                       name="birthday"
                                                       value="{{ old('birthday') }}"
                                                       autocomplete="off"
                                                       placeholder="Fecha de nacimiento">
                                                @error('birthday')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 my-3">
                                            <div class="form-group">
                                                <label for="password">Contraseña</label>
                                                <input id="password"
                                                       type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       name="password"
                                                       autocomplete="off"
                                                       placeholder="Contraseña">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 my-3">
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirmar contraseña</label>
                                                <input id="password_confirmation"
                                                       type="password"
                                                       class="form-control @error('password_confirmation') is-invalid @enderror"
                                                       name="password_confirmation"
                                                       autocomplete="off"
                                                       placeholder="Confirmar contraseña">
                                                @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Nombre</label>
                                                <input id="name"
                                                       type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name"
                                                       value="{{ old('name') }}"
                                                       autocomplete="off"
                                                       placeholder="Nombre">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="father_last_name">Apellido Paterno</label>
                                                <input id="father_last_name"
                                                       type="text"
                                                       class="form-control @error('father_last_name') is-invalid @enderror"
                                                       name="father_last_name"
                                                       value="{{ old('father_last_name') }}"
                                                       autocomplete="off"
                                                       placeholder="Apellido Paterno">
                                                @error('father_last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="mother_last_name">Apellido Materno</label>
                                                <input id="mother_last_name"
                                                       type="text"
                                                       class="form-control @error('mother_last_name') is-invalid @enderror"
                                                       name="mother_last_name"
                                                       value="{{ old('mother_last_name') }}"
                                                       autocomplete="off"
                                                       placeholder="Apellido Materno">
                                                @error('mother_last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-5">
                                        <div class="col-12">
                                            @error('error-general')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary sent-data">Crear cuenta</button>
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
