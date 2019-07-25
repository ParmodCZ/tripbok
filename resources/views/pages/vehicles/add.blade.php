@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Stacked form</h2>
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
          {{Form::text('data[Vehicle][model]', $value = null, $attributes =array('id'=>'vehicle_model', 'class'=>'form-control'))}}
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
          {{Form::label('insurance_renewal_date','Insurance Renewal Date:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][insurance_renewal_date]', $value = null, $attributes =array('id'=>'insurance_renewal_date', 'class'=>'form-control datepicker','required' => 'required'))}}
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
            <h4> Upload Image Here </h4>
            {{Form::file('image')}}
            <!-- <input type="file" name="data[Vehicle][image]" > -->
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" data-form-id="ShowAdminAddForm">Submit</button>
 {{ Form::close() }}
</div>
@endsection
