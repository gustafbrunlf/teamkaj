@extends('master')


@section('dropdown')

 <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories<span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
       
    @foreach($categories as $categories)
       <li><a href="{{action('ProductsController@category', $categories->slug)}}">{{$categories->name}}</a></li>
    @endforeach

    </ul>
</li>

@endsection


@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>All of our fucking Products</h2>
        </div>
    </div>
    
    @if(count($products))

    @include('pages.productlist')

    @endif


@endsection