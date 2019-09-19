@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <table id="fares_index" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                <th>Vehicle Type</th>
                <th>Fare pr Km</th>
                <th>Minimum Fare</th>
                <th>Minimum Distance</th>
                <th>Waiting Fare</th>
                <th>Action</th>
              </tr>
          </thead>
      </table>
    </div>
</div><!-- end row -->
</div>
@endsection
