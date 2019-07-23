@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Stacked form</h2>
  {{ Form::open(array('url' => 'admin/vehicles/edit/'.$vehicle_detail->id, 'id'=>'VehileEditForm' ,'class'=>'needs-validation','novalidate'=>'novalidate')) }}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_name','Vehicle Name:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][name]', $vehicle_detail->name, $attributes =array('id'=>'vehicle_name', 'class'=>'form-control','required' => 'required'))}}
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_type','Vehicle Type:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Vehicle][type]',$vehicles_type, $vehicle_detail->type, $attributes=array('id'=>'vehicle_type','class'=>'form-control','required' => 'required'))}}  
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>     
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_model','Vehicle Model:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][model]',$vehicle_detail->model, $attributes =array('id'=>'vehicle_model', 'class'=>'form-control'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_seats','Seating Capacity:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][seats]',$vehicle_detail->seats, $attributes =array('id'=>'vehicle_seats', 'class'=>'form-control isnumaric'))}}
           <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_price_km','Price Per K/M(in $):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][price_pr_km]',$vehicle_detail->price_pr_km, $attributes =array('id'=>'vehicle_price_km', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_price_min','Price Per Min(in $):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][price_pr_min]',$vehicle_detail->price_pr_min, $attributes =array('id'=>'vehicle_price_min', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('mini_fare','Minimum Fare(in $):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][mini_fare]',$vehicle_detail->mini_fare, $attributes =array('id'=>'mini_fare', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_name','Commission(in %):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][commission]',$vehicle_detail->commission, $attributes =array('id'=>'vehicle_name', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('passenger_cancellation_time','Passenger Cancellation Time Limit(in Hours):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][passenger_cancellation_time]',$vehicle_detail->passenger_cancellation_time, $attributes =array('id'=>'passenger_cancellation_time', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('passenger_cancellation_charges','Passenger Cancellation Charges(in $):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][passenger_cancellation_charges]',$vehicle_detail->passenger_cancellation_charges, $attributes =array('id'=>'passenger_cancellation_charges', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <?php $string_date = strtotime($vehicle_detail->insurance_renewal_date); ?>
          {{Form::label('insurance_renewal_date','Insurance Renewal Date:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][insurance_renewal_date]', date('m/d/Y', $string_date), $attributes =array('id'=>'insurance_renewal_date', 'class'=>'form-control datepicker','required' => 'required'))}}
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" data-form-id="VehileEditForm">Submit</button>
 {{ Form::close() }}
</div>
@endsection
