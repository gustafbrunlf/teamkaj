@extends('master')

@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>Edit Admin</h2>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 form">

            {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminController@update', $user->id]]) !!}

            @include('pages._adminform', ['submitButtonText' => 'Add admin'])

            {!! Form::close() !!}

            <br>

            <a href=" {{ action('AdminController@index') }} ">Back</a>

            @include('errors.list')

        </div>

    </div>
@stop