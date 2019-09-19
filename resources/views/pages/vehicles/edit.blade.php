@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Edit Vehicle</h2>
  {{ Form::open(array('url' => 'admin/vehicles/edit/'.$vehicle_detail->id, 'id'=>'VehileEditForm' ,'class'=>'needs-validation','novalidate'=>'novalidate','enctype'=>'multipart/form-data')) }}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_number','Vehicle Number:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][vehicle_number]', $vehicle_detail->vehicle_number, $attributes =array('id'=>'vehicle_number', 'class'=>'form-control','required' => 'required'))}}
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_type','Vehicle Type:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Vehicle][type]',$vehicles_type,$vehicle_detail->type, $attributes=array('id'=>'vehicle_type','class'=>'form-control','required' => 'required'))}}  
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>     
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_model','Vehicle Model:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Vehicle][model]',$model,$vehicle_detail->model, $attributes=array('id'=>'vehicle_model','class'=>'form-control','required' => 'required'))}}  
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>     
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_company','Company:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Vehicle][company_id]',$company,$vehicle_detail->company_id, $attributes=array('id'=>'vehicle_company','class'=>'form-control','required' => 'required'))}}  
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>     
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('vehicle_driver','Driver:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Vehicle][driver_id]',$drivers,$vehicle_detail->driver_id, $attributes=array('id'=>'vehicle_driver','class'=>'form-control','required' => 'required'))}}  
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>     
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
          {{Form::label('Waiting_time_limt','Waiting Time Limit ( in minute ):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][waiting_time_limt]',$vehicle_detail->waiting_time_limt, $attributes =array('id'=>'Waiting_time_limt', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Waiting_charge','Waiting Charges (Price In USD):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][waiting_charge]',$vehicle_detail->waiting_charge, $attributes =array('id'=>'Waiting_charge', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('fTripHoldFees','InTransit Waiting Fee per minute (Price In USD):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Vehicle][trip_hold_fees]',$vehicle_detail->trip_hold_fees, $attributes =array('id'=>'fTripHoldFees', 'class'=>'form-control isnumaric'))}}
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
      <div class="col-md-12">
        <div class="form-group">
          <div class="file_upload_div">
            <h4> Upload Image Here </h4>
            {{Form::file('data[Vehicle][image]',['class'=>"file_upload",'id'=>'file_upload2'])}}
            <div class="gallery"></div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" data-form-id="VehileEditForm">Submit</button>
 {{ Form::close() }}
</div>
@endsection
