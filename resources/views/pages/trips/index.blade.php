@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <table id="trips_index" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                <th>Trip ID</th>
                <th>Driver Name</th>
                <th>Passenger Name</th>
                <th>Form</th>
                <th>To</th>
                <th>Action</th>
              </tr>
          </thead>
      </table>
    </div>
</div><!-- end row -->
</div>
@endsection
