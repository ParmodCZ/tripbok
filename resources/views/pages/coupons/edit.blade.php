@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Stacked form</h2>
  {{ Form::open(array('url' => 'admin/coupons/edit/'.$coupon_detail->id, 'id'=>'AdminCouponEditForm' ,'class'=>'needs-validation','novalidate'=>'novalidate','enctype'=>'multipart/form-data')) }}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('coupon_code','Coupon Code:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Coupon][coupon_code]',$coupon_detail->coupon_code, $attributes =array('id'=>'coupon_code', 'class'=>'form-control','readonly'=>'readonly'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Expired_Date','Expired Date:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Coupon][expired]',$coupon_detail->expired, $attributes =array('id'=>'Expired_Date', 'class'=>'form-control datepicker'))}}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('Discount','Discount In (%):', array('class' => 'form-control-label'))}}
          {{Form::text('data[Coupon][discount]',$coupon_detail->discount, $attributes =array('id'=>'Suffix', 'class'=>'form-control'))}}
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" data-form-id="AdminCouponEditForm">Submit</button>
 {{ Form::close() }}
</div>
@endsection
