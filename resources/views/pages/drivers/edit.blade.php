@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Add Driver</h2>
  {{ Form::open(array('url' => 'admin/drivers/add', 'id'=>'AdminDriverAddForm' ,'class'=>'needs-validation','novalidate'=>'novalidate','enctype'=>'multipart/form-data')) }}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('name','Name:', array('class' => 'form-control-label'))}}
          {{Form::text('data[User][name]', $value = null, $attributes =array('id'=>'name', 'class'=>'form-control','required' => 'required'))}}
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('gender','Gender:', array('class' => 'form-control-label'))}}
          {{Form::select('data[User][gender]',$gender, '', $attributes=array('id'=>'gender','class'=>'form-control'))}}    
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('email','Email:', array('class' => 'form-control-label'))}}
          {{Form::email('data[User][email]', $value = null, $attributes =array('id'=>'email', 'class'=>'form-control','required' => 'required' ))}}
           <div class="invalid-feedback">Please fill out email this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('password','Password:', array('class' => 'form-control-label'))}}
          {{Form::password('data[User][password]',['id'=>'password', 'class'=>'form-control','required' => 'required'])}}
         <div class="invalid-feedback">Please fill out password this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('address','Address:', array('class' => 'form-control-label'))}}
          {{Form::textarea('data[User][address]', $value = null, $attributes =array('id'=>'address', 'class'=>'form-control','rows'=>3))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('myCountry','Country:', array('class' => 'form-control-label'))}}
          {{Form::select('data[User][country]',[], '', $attributes=array('id'=>'myCountry','class'=>'form-control'))}} 
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('myState','State:', array('class' => 'form-control-label'))}}
          {{Form::select('data[User][state]',[], '', $attributes=array('id'=>'myState','class'=>'form-control'))}} 
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('myCity','City:', array('class' => 'form-control-label'))}}
          {{Form::select('data[User][city]',[], '', $attributes=array('id'=>'myCity','class'=>'form-control'))}} 
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('zip','Zip:', array('class' => 'form-control-label'))}}
          {{Form::text('data[User][zip]', $value = null, $attributes =array('id'=>'zip', 'class'=>'form-control'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('phone','Phone:', array('class' => 'form-control-label'))}}
          {{Form::text('data[User][phone]', $value = null, $attributes =array('id'=>'phone', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Company','Company:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Driver][company_id]',[], '', $attributes=array('id'=>'Company','class'=>'form-control'))}} 
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Language','Language:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Driver][language]',[], '', $attributes=array('id'=>'Language','class'=>'form-control'))}} 
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Currency','Currency:', array('class' => 'form-control-label'))}}
          {{Form::select('data[Driver][currency]',[], '', $attributes=array('id'=>'Currency','class'=>'form-control'))}} 
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Payment_email','Payment Email:', array('class' => 'form-control-label'))}}
          {{Form::email('data[Driver][payment_email]', $value = null, $attributes =array('id'=>'Payment_email', 'class'=>'form-control'))}}
           <div class="invalid-feedback">Please fill out email this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Account_holder_name','Account Holder Name:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Driver][account_holder_name]', $value = null, $attributes =array('id'=>'Account_holder_name', 'class'=>'form-control'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Account_number','Account Numbere:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Driver][account_number]', $value = null, $attributes =array('id'=>'Account_number', 'class'=>'form-control'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Bank_name','Bank Name:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Driver][bank_name]', $value = null, $attributes =array('id'=>'Bank_name', 'class'=>'form-control'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Bank_location','Bank Location:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Driver][bank_location]', $value = null, $attributes =array('id'=>'Bank_location', 'class'=>'form-control'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('BIC_SWIFT_code','BIC/SWIFT Code:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Driver][BIC_SWIFT_code]', $value = null, $attributes =array('id'=>'BIC_SWIFT_code', 'class'=>'form-control'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('license','License:', array('class' => 'form-control-label'))}}
           {{Form::file('data[Driver][license]',['class'=>"form-control",'id'=>'license'])}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('insurance','Insurance:', array('class' => 'form-control-label'))}}
           {{Form::file('data[Driver][insurance]',['class'=>"form-control",'id'=>'insurance'])}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <div class="file_upload_div">
            <h4> Upload Image Here </h4>
            {{Form::file('data[User][image]',['class'=>"file_upload",'id'=>'file_upload'])}}
            <div class="gallery"></div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" data-form-id="AdminDriverAddForm">Submit</button>
 {{ Form::close() }}
</div>
@endsection
