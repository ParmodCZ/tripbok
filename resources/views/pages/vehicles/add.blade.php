@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Stacked form</h2>
  {{ Form::open(array('url' => 'admin/vehicles/add', 'id'=>'VehileAddForm')) }}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_name','Name:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][name]', $value = null, $attributes =array('id'=>'vehicle_name', 'class'=>'form-control required','placeholder'=>'vehicle name'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_type','Type:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Vehicle][type]',$vehicles_type, '', $attributes=array('id'=>'vehicle_type','class'=>'form-control'))}}       
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
 {{ Form::close() }}
</div>
@endsection
