@extends('master')



@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>All of our fucking {{$category->name}} Products</h2>
        </div>
    </div>
    
    @if(count($products))

    @include('pages._productlist')

    @else

    There's no {{$category->name}} products yet...

    @endif


@endsection