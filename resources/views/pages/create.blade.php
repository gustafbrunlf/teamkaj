@extends('master')

@section('body')

<div class="row">

    <div class="col-md-8">

        <h1>Create product</h1>

        {!! Form::open(['url' => 'pages']) !!}

        @include('pages.partials.form', ['submitButtonText' => 'Add product'])

        {!! Form::close() !!}

        <br>

        <a href=" {{ action('ProductsController@index') }} ">Back</a>

        @include('errors.list')

    </div>

</div>

@endsection