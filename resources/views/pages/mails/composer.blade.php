@extends('layouts.app')
@section('content')
<div class="container">
  <h2>New Mail</h2>
  {{ Form::open(array('url' => 'admin/mails/composer', 'id'=>'AdminMailSendForm' ,'class'=>'needs-validation','novalidate'=>'novalidate','enctype'=>'multipart/form-data')) }}
  <div class="row">
  	<div class="col-md-6">
        <div class="form-group">
          {{Form::label('to','To:', array('class' => 'form-control-label'))}}
          {{Form::email('data[Mail][to]', $value = null, $attributes =array('id'=>'to', 'class'=>'form-control','required' => 'required'))}}
          <div class="compose-options">
            <a onclick="$(this).hide(); $('#cc').parent().removeClass('hidden'); $('#cc').focus();" href="javascript:;" id='cc-a'>Cc</a>
            <a onclick="$(this).hide(); $('#bcc').parent().removeClass('hidden'); $('#bcc').focus();" href="javascript:;"id='bcc-a'>Bcc</a>
          </div>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out email this field.</div>
        </div>
      </div>
  </div>
   <div class="row"> 
    <div class="col-md-6">
        <div class="form-group hidden">
          {{Form::label('cc','Cc:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Mail][cc]', $value = null, $attributes =array('id'=>'cc', 'class'=>'form-control'))}}
          <div class="remove-options">
            <a onclick="$('#cc').parent().addClass('hidden'); $('#cc-a').css('display','block');" href="javascript:;">X</a>
          </div>
        </div>
      </div>
  </div>
  <div class="row"> 
    <div class="col-md-6">
        <div class="form-group hidden">
           {{Form::label('bcc','Bcc:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Mail][bcc]', $value = null, $attributes =array('id'=>'bcc', 'class'=>'form-control'))}}
          <div class="remove-options">
            <a onclick="$('#bcc').parent().addClass('hidden'); $('#bcc-a').css('display','block');" href="javascript:;">X</a>
          </div>
        </div>
      </div>
  </div>
  <div class="row"> 
    <div class="col-md-6">
        <div class="form-group">
          {{Form::label('subject','Subject:', array('class' => 'form-control-label'))}}
          {{Form::text('data[Mail][subject]', $value = null, $attributes =array('id'=>'subject', 'class'=>'form-control'))}}
        </div>
      </div>
  </div>
  <div class="row"> 
    <div class="col-md-6">
        <div class="form-group">
          {{Form::textarea('data[Mail][message]', $value = null, $attributes =array('id'=>'message', 'class'=>'form-control full-featured'))}}
        </div>
      </div>
  </div>
  <button type="submit" class="btn btn-primary" data-form-id="AdminMailSendForm">Submit</button>
  {{ Form::close() }}
</div>
@endsection