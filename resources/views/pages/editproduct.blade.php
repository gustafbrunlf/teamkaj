@extends('master')

@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>Edit product</h2>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 form">

            {!! Form::model($product, ['method' => 'PATCH', 'files' => 'true', 'action' => ['ProductsController@update', $product->slug]]) !!}

            @include('pages._productform', ['submitButtonText' => 'Update product'])

            @if(Auth::check())
                <a href="{{ action('ProductsController@deleteproduct', $product->slug) }}" class="btn btn-danger form-control">Delete Product</a>
            @endif

            {!! Form::close() !!}

            <br>

            <a href="{{action('ProductsController@show', [$product->slug])}}">Back</a>

            @include('errors.list')

        </div>

    </div>

@endsection