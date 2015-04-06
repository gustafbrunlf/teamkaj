@extends('master')



@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>All of our fucking Products</h2>
        </div>
    </div>
    
    @if(count($products))

    @include('pages._productlist')

    @endif


@endsection