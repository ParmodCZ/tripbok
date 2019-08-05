@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Add Vehicle</h2>
  {{ Form::open(array('url' => 'admin/vehicles/add', 'id'=>'VehileAddForm' ,'class'=>'needs-validation','novalidate'=>'novalidate','enctype'=>'multipart/form-data')) }}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_number','Vehicle Number:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][vehicle_number]', $value = null, $attributes =array('id'=>'vehicle_number', 'class'=>'form-control','required' => 'required'))}}
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_type','Vehicle Type:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Vehicle][type]',$vehicles_type, '', $attributes=array('id'=>'vehicle_type','class'=>'form-control','required' => 'required'))}}  
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>     
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_model','Vehicle Model:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Vehicle][model]',$model, '', $attributes=array('id'=>'vehicle_model','class'=>'form-control','required' => 'required'))}}  
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>     
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_company','Company:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Vehicle][company_id]',$company, '', $attributes=array('id'=>'vehicle_company','class'=>'form-control','required' => 'required'))}}  
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>     
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_driver','Driver:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Vehicle][driver_id]',$drivers, '', $attributes=array('id'=>'vehicle_driver','class'=>'form-control','required' => 'required'))}}  
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>     
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_seats','Seating Capacity:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][seats]', $value = null, $attributes =array('id'=>'vehicle_seats', 'class'=>'form-control isnumaric'))}}
           <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_price_km','Price Per K/M(in $):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][price_pr_km]', $value = null, $attributes =array('id'=>'vehicle_price_km', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_price_min','Price Per Min(in $):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][price_pr_min]', $value = null, $attributes =array('id'=>'vehicle_price_min', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('mini_fare','Minimum Fare(in $):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][mini_fare]', $value = null, $attributes =array('id'=>'mini_fare', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_name','Commission(in %):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][commission]', $value = null, $attributes =array('id'=>'vehicle_name', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('passenger_cancellation_time','Passenger Cancellation Time Limit(in Hours):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][passenger_cancellation_time]', $value = null, $attributes =array('id'=>'passenger_cancellation_time', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('passenger_cancellation_charges','Passenger Cancellation Charges(in $):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][passenger_cancellation_charges]', $value = null, $attributes =array('id'=>'passenger_cancellation_charges', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Waiting_time_limt','Waiting Time Limit ( in minute ):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][waiting_time_limt]', $value = null, $attributes =array('id'=>'Waiting_time_limt', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Waiting_charge','Waiting Charges (Price In USD):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][waiting_charge]', $value = null, $attributes =array('id'=>'Waiting_charge', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('fTripHoldFees','InTransit Waiting Fee per minute (Price In USD):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][trip_hold_fees]', $value = null, $attributes =array('id'=>'fTripHoldFees', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('insurance_renewal_date','Insurance Renewal Date:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][insurance_renewal_date]', $value = null, $attributes =array('id'=>'insurance_renewal_date', 'class'=>'form-control datepicker','required' => 'required'))}}
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <div class="file_upload_div">
            <h4> Upload Image Here </h4>
            {{Form::file('data[Vehicle][image]',['class'=>"file_upload",'id'=>'file_upload'])}}
            <div class="gallery"></div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" data-form-id="VehileAddForm">Submit</button>
 {{ Form::close() }}
</div>
@endsection
