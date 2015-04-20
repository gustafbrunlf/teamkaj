@extends('master')


@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>All of our fucking Products</h2>
        </div>
        <div class="col-xs-12">

            {!! Form::open(['url' => 'sort']) !!}

            <div class="form-group">

                {!! Form::select('sort', array('created_atDesc' => 'Newest', 'created_atAsc' => 'Oldest', 'priceAsc' => 'Lowest Price', 'priceDesc' => 'Highest Price', 'nameAsc' => 'Name A-Z', 'nameDesc' => 'Name Z-A'), "$sort") !!}
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