<div class="form-group">

    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('artNo', 'Article Number:') !!}
    {!! Form::text('artNo', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('price', 'Price:') !!}
    {!! Form::input('number', 'price', null, ['class' => 'form-control',"step" => "any"]) !!}

</div>

<div class="form-group">

    {!! Form::label('stock', 'Stock:') !!}
    {!! Form::input('number', 'stock', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group categories">

    {!! Form::label('category_list', 'Category:')  !!}

    <ul>
        @foreach($categories as $category)
            <li>
            {!! Form::checkbox('category_list[]', "$category->id") !!}
            {{$category->name}}
            </li>
        @endforeach
    </ul>

</div>
<div class="form-group">

    {!! Form::label('yes', 'Publish: YES') !!}
    
    {!! Form::radio('published', '1',true,["id" => "yes"]) !!}
    
    {!! Form::label('no', 'NO') !!}
    
    {!! Form::radio('published', '0',null,["id" => "no"]) !!}

</div>

@if(Auth::user()->user_type == 0)

<div class="form-group">

    {!! Form::label('user_id', 'Select owner:')  !!}

    {!! Form::select('user_id', $usernames) !!}


</div>

@endif

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">

		{!! Form::label('imageupload','Image:') !!}
		{!! Form::file('picture',['style' => 'display:none;', 'id' => 'hiddenUploadImage']) !!}
		<div id="UploadImage" name="imageupload" class="btn btn-primary form-control">Upload Image</div>
</div>

<div class="form-group">

    {!! Form::submit($submitButtonText, ['class' => 'btn btn-default form-control']) !!}

</div>