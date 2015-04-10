@extends('master')

@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>Create Admin</h2>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 form">

            {!! Form::open(['url' => 'superadmin']) !!}

            @include('pages._adminform', ['submitButtonText' => 'Create admin'])

            {!! Form::close() !!}

            <br>

            <a href=" {{ action('AdminController@index') }} ">Back</a>

            @include('errors.list')

        </div>

    </div>

@endsection