@extends('master')

@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>Edit product</h2>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 form">

            {!! Form::model($product, ['method' => 'PATCH', 'files' => 'true', 'action' => ['ProductsController@update', $product->id]]) !!}

            @include('pages._form', ['submitButtonText' => 'Update product'])

            {!! Form::close() !!}

            <br>

            <a href=" {{ action('ProductsController@index') }} ">Back</a>

            @include('errors.list')

        </div>

    </div>

@endsection