@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <table id="coupons_index" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                <th>Coupon Code</th>
                <th>Discount</th>
                <th>Expire Date</th>
                <th>Action</th>
              </tr>
          </thead>
      </table>
    </div>
</div><!-- end row -->
</div>
@endsection
