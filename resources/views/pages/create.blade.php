@extends('master')

@section('body')

<h1>Create product</h1>

{!! Form::open(['url' => 'pages']) !!}

<div class="form-group">

{!! Form::label('name', 'Name:') !!}
{!! Form::text('name', null, ['class' => 'form-control']) !!}

{!! Form::label('price', 'Price:') !!}
{!! Form::input('number', 'price', null, ['class' => 'form-control']) !!}

{!! Form::label('stock', 'Stock:') !!}
{!! Form::input('number', 'stock', null, ['class' => 'form-control']) !!}

{!! Form::label('description', 'Description:') !!}
{!! Form::textarea('description', null, ['class' => 'form-control']) !!}



</div>

{!! Form::submit('Add product') !!}

{!! Form::close() !!}

@if ($errors->any())

	<ul class="alert alert-danger">

		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach

	</ul>

@endif

@endsection