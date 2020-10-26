@extends('web.template.main')
@push('scripts')
@endpush
@section('title','Crear cuenta')
@section('content')

    <form id="form-create-profile" action="{{route('web_user_create')}}" method="POST">
        @csrf
        <div class="row  justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">

            </div>
        </div>
        <div class="row mt-2 justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">

            </div>
        </div>
        <div class="row mt-2 justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">

            </div>

        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <button class="btn btn-primary">Crear cuenta</button>
            </div>
        </div>
    </form>


@endsection
