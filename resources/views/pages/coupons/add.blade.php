@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Stacked form</h2>
  {{ Form::open(array('url' => 'admin/coupons/add', 'id'=>'AdminCouponAddForm' ,'class'=>'needs-validation','novalidate'=>'novalidate','enctype'=>'multipart/form-data')) }}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Number_of_coupons','Number of coupons:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Coupon][nubmerofconpon]',1, $attributes =array('id'=>'Number_of_coupons', 'class'=>'form-control isnumaric','data-max'=>50))}}
          <!-- <div class="valid-feedback">Valid.</div> -->
          <div class="invalid-feedback">Please fill numaric this field.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Length_of_coupons','Length of coupons:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Coupon][lengthofconpon]',6, $attributes =array('id'=>'Length_of_coupons', 'class'=>'form-control isnumaric'))}}
          <div class="invalid-feedback">Please fill numaric this field.</div>  
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Prefix','Prefix:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Coupon][prefix]', $value = null, $attributes =array('id'=>'Prefix', 'class'=>'form-control'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Suffix','Suffix:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Coupon][suffix]', $value = null, $attributes =array('id'=>'Suffix', 'class'=>'form-control'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Expired_Date','Expired Date:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Coupon][expired]', $value = null, $attributes =array('id'=>'Expired_Date', 'class'=>'form-control datepicker'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Discount','Discount In (%):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Coupon][discount]', $value = null, $attributes =array('id'=>'Suffix', 'class'=>'form-control'))}}
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" data-form-id="AdminCouponAddForm">Submit</button>
 {{ Form::close() }}
</div>
@endsection
