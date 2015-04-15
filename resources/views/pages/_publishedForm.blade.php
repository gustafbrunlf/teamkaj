
<div class="form-group">
{!! Form::model($published,['method' => 'PATCH', 'action' => ['ProductsController@updatePublishDashboard']])!!}	
{!! Form::input("hidden","published",$status)!!}
@foreach($published as $publish)
<p>{!! Form::input("checkbox","name[]",$publish->name,["id" => $publish->name])!!}
{!! Form::label($publish->name, $publish->name) !!}
</p>

@endforeach
{!! Form::submit($button,["class" => "btn btn-primary form-control"]) !!}
{!! form::close()!!}
</div>