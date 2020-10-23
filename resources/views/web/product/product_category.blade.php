@extends('web.template.main')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>{{$category->name}}</h1>
            </div>
        </div>

        <div class="row justify-content-around">
{{--            @include('web.components.card')--}}

        </div>

    </div>


@endsection
