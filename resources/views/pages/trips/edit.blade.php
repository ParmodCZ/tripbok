@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Stacked form</h2>
  {{ Form::open(array('url' => 'admin/trips/edit/'.$trip_detail->id, 'id'=>'AdminTripEditForm' ,'class'=>'needs-validation','novalidate'=>'novalidate','enctype'=>'multipart/form-data')) }}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('from','From:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Trip][from]',$trip_detail->from, $attributes =array('id'=>'form', 'class'=>'form-control','required' => 'required' ))}}
           <div class="invalid-feedback">Please fill out email this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('to','To:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Trip][to]',$trip_detail->to, $attributes =array('id'=>'to', 'class'=>'form-control','required' => 'required'))}}
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('status','Status:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Trip][status]',$status, $trip_detail->status, $attributes=array('id'=>'status','class'=>'form-control'))}}    
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('status','Status:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Trip][is_confirmed]',$confirm, $trip_detail->is_confirmed, $attributes=array('id'=>'status','class'=>'form-control'))}}    
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('start_time','Start Time:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Trip][start_time]',$trip_detail->start_time, $attributes =array('id'=>'start_time', 'class'=>'form-control datepicker','required' => 'required'))}}
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('end_time','End Time:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Trip][end_time]',$trip_detail->end_time, $attributes =array('id'=>'end_time', 'class'=>'form-control datepicker','required' => 'required'))}}
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('fare','Fare In Doller ($):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Trip][fare]',$trip_detail->fare, $attributes =array('id'=>'fare', 'class'=>'form-control'))}}
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" data-form-id="AdminTripEditForm">Submit</button>
 {{ Form::close() }}
</div>
@endsection
