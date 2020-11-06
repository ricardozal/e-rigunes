@extends('web.template.main')
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset("/commons/form_tools.js")}}"></script>
<script src="{{asset('js/web/login/index.js')}}"></script>
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
                                <h1 class="color-primary">Iniciar sesión</h1>
                            </div>
                            <div class="col-12">
                                <form id="form-create-profile" action="{{route('web_user_create_post')}}" method="POST">
                                    @csrf
                                    <div class="row  justify-content-center">

                                        <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                                            <div class="form-group">
                                                <input type="text" name="email" id="email" class="form-control mb-4"
                                                       placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                                            <div class="form-group">
                                                <input type="password" name="password" id="password"
                                                       class="form-control mb-4" placeholder="Contraseña">
                                            </div>
                                        </div>



                                        <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" class="form-control mb-4"
                                                       placeholder="Nombre">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                                            <div class="form-group">
                                                <input type="text" name="father_last_name" id="father_last_name"
                                                       class="form-control mb-4" placeholder="Apellido Paterno">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2 justify-content-center">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                                            <div class="form-group">
                                                <input type="text" name="mother_last_name" id="mother_last_name"
                                                       class="form-control mb-4" placeholder="Apellido Materno">
                                            </div>
                                        </div>


                                    </div>


                                    <div class="row mt-2 justify-content-center">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 text-center">
                                            <div class="form-group">
                                                <input type="date" name="birthday" id="birthday"
                                                       class="form-control mb-4" placeholder="Cumpleaños">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                                            <div class="form-group">
                                                <input type="text" name="phone" id="phone" class="form-control mb-4"
                                                       placeholder="Telefono">
                                            </div>
                                        </div>




                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary">Crear cuenta</button>
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
