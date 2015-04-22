<div class="form-group">

    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">
<<<<<<< HEAD
<input type="hidden" name="token" value="{{ csrf_token() }}">
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
=======

    {!! Form::hidden('_token', csrf_token(), ['class' => 'form-control']) !!}
>>>>>>> e529fdd76e5177bad206b1c8278f8219a74508c1

</div>

<div class="form-group">

    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}

</div>


<div class="form-group">

    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}

</div>

