<div class="form-group">

    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">
<input type="hidden" name="token" value="{{ csrf_token() }}">
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}

</div>

@if(Request::path() === 'superadmin/create')
    <div class="form-group">

        {!! Form::label('password', 'Password:') !!}
        {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}

    </div>
@endif

<div class="form-group">

    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}

</div>