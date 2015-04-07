@extends('master')

@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>Create product</h2>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 form">

            {!! Form::open(['url' => 'products', 'files' => 'true']) !!}

            @include('pages._form', ['submitButtonText' => 'Add product'])

            {!! Form::close() !!}

            @include('errors.list')

            <br>

            <a href=" {{ action('ProductsController@index') }} ">Back</a>


        </div>

    </div>

@endsection