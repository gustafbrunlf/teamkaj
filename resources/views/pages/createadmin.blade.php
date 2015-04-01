@extends('master')

@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>Create Admin</h2>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 form">

            {!! Form::open(['url' => 'admin']) !!}

            <div class="form-group">

            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}

            </div>

            <div class="form-group">

                {!! Form::label('email', 'E-mail:') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}

            </div>

            <div class="form-group">

                {!! Form::label('password', 'Password:') !!}
                {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
            
            </div>

            <div class="form-group">

                {!! Form::submit('Add admin', ['class' => 'btn btn-primary form-control']) !!}

            </div>

            {!! Form::close() !!}

            <br>

            <a href=" {{ action('ProductsController@index') }} ">Back</a>

            @include('errors.list')

        </div>

    </div>

@endsection