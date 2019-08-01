@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Stacked form</h2>
  {{ Form::open(array('url' => 'admin/passengers/add', 'id'=>'AdminPassengerAddForm' ,'class'=>'needs-validation','novalidate'=>'novalidate','enctype'=>'multipart/form-data')) }}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('name','Name:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Passenger][name]', $value = null, $attributes =array('id'=>'name', 'class'=>'form-control','required' => 'required'))}}
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('gender','Gender:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Passenger][gender]',$gender, '', $attributes=array('id'=>'gender','class'=>'form-control'))}}    
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('email','Email:', array('class' => 'form-control-label'))}}
          {{Form::email('data[Passenger][email]', $value = null, $attributes =array('id'=>'email', 'class'=>'form-control','required' => 'required' ))}}
           <div class="invalid-feedback">Please fill out email this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('password','Password:', array('class' => 'form-control-label'))}}
          {{Form::password('data[Passenger][password]',['id'=>'password', 'class'=>'form-control','required' => 'required'])}}
         <div class="invalid-feedback">Please fill out password this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('address','Address:', array('class' => 'form-control-label'))}}
          {{Form::textarea('data[Passenger][address]', $value = null, $attributes =array('id'=>'address', 'class'=>'form-control','rows'=>3))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('city','City:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Passenger][city]', $value = null, $attributes =array('id'=>'city', 'class'=>'form-control'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('country','Country:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Passenger][country]', $value = null, $attributes =array('id'=>'country', 'class'=>'form-control'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('zip','Zip:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Passenger][zip]', $value = null, $attributes =array('id'=>'zip', 'class'=>'form-control'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('phone','Phone:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Passenger][phone]', $value = null, $attributes =array('id'=>'phone', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <div class="file_upload_div">
            <h4> Upload Image Here </h4>
            {{Form::file('data[Passenger][image]',['class'=>"file_upload",'id'=>'file_upload'])}}
            <div class="gallery"></div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" data-form-id="AdminPassengerAddForm">Submit</button>
 {{ Form::close() }}
</div>
@endsection
