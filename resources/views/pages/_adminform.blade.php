<div class="form-group">

    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::hidden('_token', csrf_token(), ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}

</div>


<div class="form-group">

    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}

</div>

