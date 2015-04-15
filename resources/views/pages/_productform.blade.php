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
    {!! Form::input('number', 'price', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('stock', 'Stock:') !!}
    {!! Form::input('number', 'stock', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('category_list', 'Category:')  !!}
    {!! Form::select('category_list[]', $categories, null, ['class' => 'form-control', 'multiple']) !!}

</div>
<div class="form-group">

    {!! Form::label('yes', 'Publish: YES') !!}
    
    {!! Form::radio('published', '1',null,["id" => "yes"]) !!}
    
    {!! Form::label('no', 'NO') !!}
    
    {!! Form::radio('published', '0',null,["id" => "no"]) !!}

</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">

		{!! Form::label('imageupload','Image:') !!}
		{!! Form::file('picture',['style' => 'display:none;', 'id' => 'hiddenUploadImage']) !!}
		<div id="UploadImage" name="imageupload" class="btn btn-primary form-control">Upload Image</div>
</div>

<div class="form-group">

    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}

</div>