@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Stacked form</h2>
  {{ Form::open(array('url' => 'admin/trips/add', 'id'=>'AdminTripAddForm' ,'class'=>'needs-validation','novalidate'=>'novalidate','enctype'=>'multipart/form-data')) }}

  <input type="hidden" name="previousLink" id="previousLink" value=""/>
  <input type="hidden" name="eBookingFrom" id="eBookingFrom" value="Admin" />
  <input type="hidden" name="backlink" id="backlink" value="cab_booking.php"/>
  <input type="hidden" name="distance" id="distance" value="">
  <input type="hidden" name="duration" id="duration" value="">
  <!-- form -->
  <input type="hidden" name="data[Trip][from_lat_long]" id="from_lat_long" value="" >
  <input type="hidden" name="data[Trip][from_lat]" id="from_lat" value="" >
  <input type="hidden" name="data[Trip][from_long]" id="from_long" value="" >
  <input type="hidden" name="data[Trip][to_lat_long]" id="to_lat_long" value="" >
  <input type="hidden" name="data[Trip][to_lat]" id="to_lat" value="" >
  <input type="hidden" name="data[Trip][to_long]" id="to_long" value="" >
  <!-- form  -->
  <input type="hidden" name="fNightPrice" id="fNightPrice" value="" >
  <input type="hidden" name="fPickUpPrice" id="fPickUpPrice" value="" >
  <input type="hidden" name="eFlatTrip" id="eFlatTrip" value="" >
  <input type="hidden" name="fFlatTripPrice" id="fFlatTripPrice" value="" >
  <input type="hidden" value="1" id="location_found" name="location_found">
  <input type="hidden" value="" id="user_type" name="user_type" >
  <input type="hidden" value="" id="iUserId" name="iUserId" >
  <input type="hidden" value="" id="eStatus" name="eStatus" >
  <input type="hidden" value="Pacific/Honolulu" id="vTimeZone" name="vTimeZone" >
  <input type="hidden" value="US" id="vRideCountry" name="vRideCountry" >
  <input type="hidden" value="" id="iCabBookingId" name="iCabBookingId" >
  <input type="hidden" value="AIzaSyCXxuaZD88IKBShrKBPezrE1dHho2hxuPs" id="google_server_key" name="google_server_key" >
  <input type="hidden" value="" id="getradius" name="getradius" >
  <input type="hidden" value="KMs" id="eUnit" name="eUnit" >
  <input type="hidden" name="fTollPrice" id="fTollPrice" value="">
  <input type="hidden" name="vTollPriceCurrencyCode" id="vTollPriceCurrencyCode" value="">
  <input type="hidden" name="eTollSkipped" id="eTollSkipped" value="">
  <input type="hidden" value="" id="eType" name="eType" />
  <input type="hidden" name="baseurl" id="baseurl" value="">
  <input type="hidden" name="iDriverId_temp" id="iDriverId_temp">
  <input type="hidden" name="newType" id="newType" value="">
  <input type="hidden" name="submitbtn" id="submitbtn">
  <!-- hidden  -->
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Name','Name:', array('class' => 'form-control-label'))}}
          {{Form::text('data[User][name]', $value = null, $attributes =array('id'=>'Name', 'class'=>'form-control','required' => 'required' ))}}
           <div class="invalid-feedback">Please fill out email this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div  class="col-md-6">
            <div class="form-group">     
              {{Form::label('status','Country:', array('class' => 'form-control-label'))}}
              {{Form::select('data[User][code]',[], '', $attributes=array('id'=>'countrycode','class'=>'form-control col-md-6'))}}    
            </div> 
          </div>
          <div  class="col-md-6">
            <div class="form-group">  
            {{Form::label('','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', array('class' => 'form-control-label'))}}   
              <input type="text" class="form-control col-md-6" id='Ccode' name="data[User][countrycode]" readonly="readonly">
            </div> 
          </div> 
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Phone','Phone:', array('class' => 'form-control-label'))}}
          {{Form::text('data[User][phone]', $value = null, $attributes =array('id'=>'Email', 'class'=>'form-control isnumaric','required' => 'required' ))}}
           <div class="invalid-feedback">Please fill out email this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Email','Email:', array('class' => 'form-control-label'))}}
          {{Form::text('data[User][email]', $value = null, $attributes =array('id'=>'Email', 'class'=>'form-control','required' => 'required' ))}}
           <div class="invalid-feedback">Please fill out email this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group locationField">
          {{Form::label('from','From:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Trip][from_]', $value = null, $attributes =array('id'=>'from', 'class'=>'form-control','required' => 'required' ))}}
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
      </div>
    <div class="row">
      <div class="col-md-12">
        <div id="map" style="width:100%;height: 500px;"></div>
      </div>
    </div>
    <div  class="row">
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('status','Status:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Trip][status]',$status, '', $attributes=array('id'=>'status','class'=>'form-control'))}}    
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Confirmed','Confirmed:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Trip][is_confirmed]',$confirm, '', $attributes=array('id'=>'Confirmed','class'=>'form-control'))}}    
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('driver_id','Select Driver:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Trip][driver_id]',$driver, '', $attributes=array('id'=>'driver_id','class'=>'form-control'))}}    
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
          {{Form::text('data[Trip][end_time]', $value = null, $attributes =array('id'=>'end_time', 'class'=>'form-control datepicker'))}}
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
