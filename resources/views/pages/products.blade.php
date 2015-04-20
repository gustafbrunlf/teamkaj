@extends('master')


@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>All of our fucking Products</h2>
        </div>
        <div class="col-xs-12">

            {!! Form::open(['url' => 'filter']) !!}

            <div class="form-group">

                {!! Form::select('filter', array(
                    'created_at' => 'Created',
                    'price' => 'Price',
                    'name' => 'Name'
                    )) !!}
                {!! Form::submit('Sort', ['class' => 'btn btn-default']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>
    
    @if(count($products))     

    @include('pages._productlist')


    <div> {!! $products->render() !!} </div>

    @endif



@endsection