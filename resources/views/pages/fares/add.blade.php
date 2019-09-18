@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Stacked form</h2>
  {{ Form::open(array('url' => 'admin/fares/add', 'id'=>'AdminFaresAddForm' ,'class'=>'needs-validation','novalidate'=>'novalidate','enctype'=>'multipart/form-data')) }}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_type','Vehicle Type:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Fare][vehicle_type]',$vehicles_type, '', $attributes=array('id'=>'vehicle_type','class'=>'form-control','required' => 'required'))}}  
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>     
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('fare_pr_km','Fare Per KM (in $):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Fare][fare_pr_km]', $value = null, $attributes =array('id'=>'fare_pr_km', 'class'=>'form-control isnumaric'))}}
           <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('minimum_fare','Minimum Fare (in $):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Fare][minimum_fare]', $value = null, $attributes =array('id'=>'minimum_fare', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('minimum_distance','Minimum Distance (in KM):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Fare][minimum_distance]', $value = null, $attributes =array('id'=>'minimum_distance', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('waiting_fare','Waiting Fare (in $):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Fare][waiting_fare]', $value = null, $attributes =array('id'=>'waiting_fare', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" data-form-id="AdminFaresAddForm">Submit</button>
 {{ Form::close() }}
</div>
@endsection
