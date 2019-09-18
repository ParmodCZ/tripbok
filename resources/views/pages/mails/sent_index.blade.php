@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <table id="sent_index" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                <th>To</th>
                <th>Cc</th>
                <th>Bcc</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Action</th>
              </tr>
          </thead>
      </table>
    </div>
</div><!-- end row -->
</div>
@endsection
