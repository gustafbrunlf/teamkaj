@extends('master')

@section('body')
{!! Form::open(['url' => 'categories']) !!}
@include('pages._createCategoryForm',['submitButtonText' => 'Create Category'])
{!! Form::close()!!}
@include('errors.list')
@stop
