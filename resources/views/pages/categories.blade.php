@extends('master')



@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>All of our fucking {{$category->name}} Products</h2>
        </div>
    </div>
    
    @if(count($products))

    {!! Form::open(['url' => "categories/$category->slug/sort"]) !!}

            <div class="form-group">

                {!! Form::select('sort', array(
                    'created_at' => 'Created',
                    'price' => 'Price',
                    'name' => 'Name'
                    ), "$sort") !!}
                {!! Form::submit('Sort', ['class' => 'btn btn-default']) !!}

            </div>

            {!! Form::close() !!}

    @include('pages._productlist')

    @else

    There's no {{$category->name}} products yet...

    @endif


@endsection