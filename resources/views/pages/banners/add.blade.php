@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Add Banners</h2>
  {{ Form::open(array('url' => 'admin/banners/add', 'id'=>'BannerAddForm' ,'class'=>'needs-validation','novalidate'=>'novalidate','enctype'=>'multipart/form-data')) }}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('banner_title','Advertisement Name:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Banner][title]', $value = null, $attributes =array('id'=>'banner_title', 'class'=>'form-control','required' => 'required'))}}
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('order','Display Order:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Banner][display_order]', $value = null, $attributes =array('id'=>'order', 'class'=>'form-control'))}}
          <!-- isnumaric -->
         <!--  <div class="invalid-feedback">Please fill numaric in this field.</div> -->
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('url','Redirect Url:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Banner][url]', $value = null, $attributes =array('id'=>'url', 'class'=>'form-control'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('status','Price Per Min(in $):', array('class' => 'form-control-label'))}}
          {{Form::select('data[Banner][status]',$status,'', $attributes =array('id'=>'status', 'class'=>'form-control'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Validity_time','Validity:', array('class' => 'form-control-label'))}}
          <div class="custom-control custom-radio custom-control-inline">
            {{Form::radio('data[Banner][validity]',1, true, array('class'=>'custom-control-input', 'id'=>'Validity1','value'=>1))}} 
            {{Form::label('Validity1', 'Permanent', array('class' => 'custom-control-label'))}}
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            {{Form::radio('data[Banner][validity]',0,false,array('class'=>'custom-control-input', 'id'=>'Validity0','value'=>0))}}
            {{Form::label('Validity0', 'Custom', array('class' => 'custom-control-label'))}}
        </div>
        </div>
      </div>
    </div>
      <div class="row bannerActiveDate" style="display: none;">
        <div class="col-md-6">
          <div class="form-group">
            {{Form::label('ActivationDate','Activation Date:', array('class' => 'form-control-label'))}}
            {{Form::text('data[Banner][activation_date]', $value = null, $attributes =array('id'=>'ActivationDate', 'class'=>'form-control datepicker','required' => 'required'))}}
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            {{Form::label('ExpiryDate','Expiry Date:', array('class' => 'form-control-label'))}}
            {{Form::text('data[Banner][expire_date]', $value = null, $attributes =array('id'=>'ExpiryDate', 'class'=>'form-control datepicker','required' => 'required'))}}
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <div class="file_upload_div">
            <h4> Upload Image Here </h4>
            {{Form::file('data[Banner][image]',['class'=>"file_upload",'id'=>''])}}
            <div class="gallery"></div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" data-form-id="BannerAddForm">Submit</button>
 {{ Form::close() }}
</div>
@endsection
