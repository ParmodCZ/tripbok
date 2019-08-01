@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Stacked form</h2>
  {{ Form::open(array('url' => 'admin/trips/add', 'id'=>'AdminTripAddForm' ,'class'=>'needs-validation','novalidate'=>'novalidate','enctype'=>'multipart/form-data')) }}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('from','From:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Trip][from]', $value = null, $attributes =array('id'=>'form', 'class'=>'form-control','required' => 'required' ))}}
           <div class="invalid-feedback">Please fill out email this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('to','To:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Trip][to]', $value = null, $attributes =array('id'=>'to', 'class'=>'form-control','required' => 'required'))}}
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('status','Status:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Trip][status]',$status, '', $attributes=array('id'=>'status','class'=>'form-control'))}}    
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('status','Status:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Trip][is_confirmed]',$confirm, '', $attributes=array('id'=>'status','class'=>'form-control'))}}    
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('start_time','Start Time:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Trip][start_time]', $value = null, $attributes =array('id'=>'start_time', 'class'=>'form-control datepicker','required' => 'required'))}}
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('end_time','End Time:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Trip][end_time]', $value = null, $attributes =array('id'=>'end_time', 'class'=>'form-control datepicker','required' => 'required'))}}
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('fare','Fare In Doller ($):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Trip][fare]', $value = null, $attributes =array('id'=>'fare', 'class'=>'form-control'))}}
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" data-form-id="AdminTripAddForm">Submit</button>
 {{ Form::close() }}
</div>
@endsection
