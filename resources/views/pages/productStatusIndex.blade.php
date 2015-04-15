@extends('master')


@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>Mangage our fucking products</h2>
        </div>
    </div>
    
    @if(count($products)) 
    <h3>Our latest unpublished products</h3>
	{!!Form::open()!!}
	<div class="form-group">
    	@foreach($products as $product)   
 

		{!!Form::checkbox($product->name, null,false)!!}
		{!! Form::label($product->name,null,['class' => 'form-control-inline'])!!}
		<br> 
		@endforeach
	{!!Form::close()!!}
</div>
    @endif

@endsection