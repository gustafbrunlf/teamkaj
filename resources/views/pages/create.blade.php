@extends('master')

@section('body')

<h1>Create product</h1>

{!! Form::open(['url' => 'products']) !!}

{!! Form::label('name', 'Name;') !!}
{!! Form:text('name', null, ['class' => 'form-control']) !!}

{!! Form::label('price', 'Price;') !!}
{!! Form:text('price', null, ['class' => 'form-control']) !!}

{!! Form::label('stock', 'Stock;') !!}
{!! Form:text('stock', null, ['class' => 'form-control']) !!}

{!! Form::label('description', 'Description;') !!}
{!! Form:textarea('description', null, ['class' => 'form-control']) !!}

{!! Form::close() !!}


@endsection