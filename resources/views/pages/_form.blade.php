<div class="form-group">

    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

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

    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}

</div>