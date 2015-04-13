@extends('master')


@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>Are you sure you want to delete product: {{ $product->name }}?</h2>
        </div>
    </div>

    {!! Form::open(['method' => 'DELETE', 'action' => ['ProductsController@destroy', $product->id]]) !!}

    <div class="btn-group">

        @if(Auth::user()->user_type == 0)
        {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
        @endif

        <a href={{ action('ProductsController@show', $product->artNo) }} class="btn btn-default">No</a>

    </div>

    {!! Form::close() !!}

@endsection