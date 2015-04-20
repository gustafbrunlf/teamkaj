@extends('master')


@section('body')
@if(count($published))
@include("pages._publishedForm",["status" => 0,"published"=> $published,"button" => "Publish"])
@endif

@if(count($unpublished))
@include("pages._publishedForm",["status" => 1,"published"=> $unpublished,"button" => "UnPublish"])
@endif


@stop