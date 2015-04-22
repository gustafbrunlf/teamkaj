@extends('master');

@section('body')

<div class="row">
    <div class="col-xs-12">
        <h2>Products</h2>
    </div>
</div>


<div class="form-group block">
	{!! Form::open(['url' => 'products/overview']) !!}

        {!! Form::select('sort', array('created_atAsc' => 'Oldest', 'created_atDesc' => 'Newest', 'priceAsc' => 'Lowest Price', 'priceDesc' => 'Highest Price', 'nameAsc' => 'Name A-Z', 'nameDesc' => 'Name Z-A'), "$sort") !!}
        {!! Form::submit('Sort', ['class' => 'btn btn-default']) !!}

	{!! Form::close() !!}
</div>
<div class="form-group block">
	{!! Form::open(['url' => 'products/overview']) !!}

	    {!! Form::select('filter', array('all' => 'All products', 'user' => 'My products', 'published' => 'Published', 'unpublished' => 'Unpublished'), "$filter") !!}
	    {!! Form::submit('Filter', ['class' => 'btn btn-default']) !!}

	{!! Form::close() !!}
</div>

<div class="row">
	<div class="col-xs-12 prod-table">
		<table>
			<thead>
				<th>Name</th>
				<th>Art. No.</th>
				<th>Price</th>
				<th>Stock</th>
				<th>Created</th>
				<th>Updated</th>
				<th>Created By</th>
				<th>Published</th>
			</thead>

			@foreach($products as $product)

				@if ($product->published)
					<tr>
				@else
					<tr class="unpubl">
				@endif

					<td>{{ $product->name }}</td>
					<td>{{ $product->artNo }}</td>
					<td>{{round($product->price, 2)}}</td>
					<td>{{ $product->stock }}</td>
					<td>{{ $product->created_at }}</td>
					<td>{{ $product->updated_at }}</td>

					@if ($product->user_id != null)
						<td>{{ $users[$product->user_id-1]->name }}</td>
					@else
						<td>Unowned</td>
					@endif


					@if ($product->published)
						<td>published</td>
					@else
						<td> <span class="italic">unpublished</span> </td>
					@endif

					@if (Auth::user()->user_type == 0 || Auth::user()->id  == $product->user_id)

						<td class="button"><a href="{{action('ProductsController@edit', [$product->slug])}}" class="btn btn-default">Edit</a></td>
					
					@endif

				</tr>

			@endforeach
		</table>
        
    </div>
</div>


@endsection