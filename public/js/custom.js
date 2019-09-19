// $(function () {
//     $(":file").change(function () {
//         if (this.files && this.files[0]) {
//             var reader = new FileReader();
//             reader.onload = imageIsLoaded;
//             reader.readAsDataURL(this.files[0]);
//         }
//     });
// });
// function imageIsLoaded(e) {
// 	$('#myImg').attr('src', e.target.result);
// };
$(function() {
  // Multiple images preview in browser
  var imagesPreview = function(input, placeToInsertImagePreview) {
    if (input.files) {
      var filesAmount = input.files.length;
      for (i = 0; i < filesAmount; i++) {
        var reader = new FileReader();
        reader.onload = function(event) {
          $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
        }
        reader.readAsDataURL(input.files[i]);
      }
    }
  };
  $('.file_upload').on('change', function() {
      imagesPreview(this, 'div.gallery');
  });
});

// Common AJAX function
function makeAjaxRequest(method, url, data){
  return $.ajax({
    type : method,
    url : APP_URL+url,
    data : data
  })
}
//delete module Ajax
function DeleteModuleAjax(data=null,url='',that=null,module='',tabledata=null){
  swal({
    title: "Are you sure?",
    text: "You will not be able to recover this data!",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Yes, delete it!",
    closeOnConfirm: false
    },
    function(isConfirm){
      if (isConfirm) {
        makeAjaxRequest('post', url, data)
        .done(function(response) {
          if(response.status == 'success'){
            swal({
              title: 'Deleted!', 
              text: 'The '+module+' has been deleted successfully.',
              type: 'success'
            });
            tabledata.row( $(that).parents('tr') ).remove().draw();
          }else{
            swal({
              title: 'Deleted!', 
              text: 'The '+module+' could not be deleted.',
              type: 'error'
            });
          }
        })
        .fail(function(xhr) {
            console.log('error callback ', xhr);
        });
      }
  });
      // End delete partner //
}

$(document).ready(function () {
  if($('#Validity0').is(':checked')) {
    $('.bannerActiveDate').css('display','block');
  }
  $('input:radio[name="data[Banner][validity]"]').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 0) {
         $('.bannerActiveDate').css('display','block');
        }else{
          $('.bannerActiveDate').css('display','none');
        }
    });

  //select country
  $('#selectcountry').flagStrap({
    placeholder: {
        value: "",
        text: "Country of origin"
    }
  });
   //select country code
  $('#countrycode').on('change', function() {
    //alert( this.value );
    $('#Ccode').val(this.value);
  });
  $.getJSON(APP_URL+'/public/countries/countries.json',function(data){
    var myCountry = '';
    var countrycode = '';
    $.each(data.countries, function(key,val){
      myCountry +='<option value="'+val.id+'">'+val.name+'</option>';
      countrycode +='<option value="'+val.phoneCode+'">'+val.name+'</option>';

    });
    $('#Ccode').val(data.countries[0].phoneCode);
    $('#myCountry').html(myCountry);
    $('#countrycode').html(countrycode);
  });

  $("#myCountry").change(function(){
    var thatval =  this.value;
    $.getJSON(APP_URL+'/public/countries/states.json',function(data){
      var returnedData = $.grep(data.states, function (element, index) {
        return element.country_id == thatval;
      });
      var myState = '';
      $.each(returnedData, function(key,val){
        myState +='<option value="'+val.id+'">'+val.name+'</option>';
      });
      $('#myState').html(myState);
    });
  });

  $("#myState").change(function(){
    var thatval =  this.value;
    $.getJSON(APP_URL+'/public/countries/cities.json',function(data){
      console.log(data);
      var returnedData = $.grep(data.cities, function (element, index) {
        return element.state_id == thatval;
      });
      console.log(returnedData);
      var myCity = '';
      $.each(returnedData, function(key,val){
        myCity +='<option value="'+val.id+'">'+val.name+'</option>';
      });
      $('#myCity').html(myCity);
    });
  });



  tinyTextEditor('full-featured','class');
    // date picker
    $('.datepicker').datepicker({
      format: 'yyyy/mm/dd',
      startDate: '+0d',
      autoclose: true
    });
    //end date picker
    // only numaric
    $(".isnumaric").keypress(function (e) {
      //if the letter is not digit then display error and don't type anything
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
         //display error message
         $(this).closest('.form-group').find('.invalid-feedback').css('display','block');
          return false;
     }else{
          $(this).closest('.form-group').find('.invalid-feedback').css('display','none');
          return true;
     }
    });
    //end only numaric

    //datatables 

    //vehicle
    VehilceTable = $('#vehilces_index').DataTable({
      "aaSorting": [],
      "processing": true,
      "serverSide": true,
      "stateSave" : true,
      "ajax": {"url":APP_URL+'/admin/vehicles/indexing',"type": "POST"},
      "columns": [
              {'data': 'media',orderable: false, searchable: false },
              {'data': 'vehicle_number','name':'vehicle_number' },
              {'data' : 'model','name':'model' },
              {'data' : 'type','name':'type' },
              {'data' : 'seats','name':'seats' },
              {"data": "actions",orderable: false, searchable: false}
            ],
      "columnDefs": [
              { orderable: false, targets: -1 }
          ]
    });

    //driver
    DriverTable = $('#drivers_index').DataTable({
     "aaSorting": [],
     "processing": true,
     "serverSide": true,
     "stateSave" : true,
     "ajax": {"url":APP_URL+'/admin/drivers/indexing',"type": "POST"},
     "columns": [
             {'data': 'media',orderable: false, searchable: false },
             {'data': 'name','name':'name' },
             {'data' : 'email','name':'email' },
             {'data' : 'phone','name':'phone' },
             {'data' : 'address','name':'address' },
             {"data": "actions",orderable: false, searchable: false}
           ],
     "columnDefs": [
             { orderable: false, targets: -1 }
         ]
   });
   //passenger
   PassengerTable = $('#passengers_index').DataTable({
    "aaSorting": [],
    "processing": true,
    "serverSide": true,
    "stateSave" : true,
    "ajax": {"url":APP_URL+'/admin/passengers/indexing',"type": "POST"},
    "columns": [
            {'data': 'media',orderable: false, searchable: false },
            {'data': 'name','name':'name' },
            {'data' : 'email','name':'email' },
            {'data' : 'phone','name':'phone' },
            {'data' : 'address','name':'address' },
            {"data": "actions",orderable: false, searchable: false}
          ],
    "columnDefs": [
            { orderable: false, targets: -1 }
        ]
  });
  //trip
  TripTable = $('#trips_index').DataTable({
    "aaSorting": [],
  "processing": true,
  "serverSide": true,
  "stateSave" : true,
  "ajax": {"url":APP_URL+'/admin/trips/indexing',"type": "POST"},
  "columns": [
          {'data': 'trip_id','name':'id'},
          {'data': 'driver_name','name':'driver_name' },
          {'data' : 'passenger_name','name':'passenger_name' },
          {'data' : 'form','name':'form'},
          {'data' : 'to','name':'to' },
          {"data": "actions",orderable: false, searchable: false}
        ],
  "columnDefs": [
          { orderable: false, targets: -1 }
      ]
  });

  //sent mails
  MailTable = $('#sent_index').DataTable({
    "aaSorting": [],
  "processing": true,
  "serverSide": true,
  "stateSave" : true,
  "ajax": {"url":APP_URL+'/admin/mails/sent',"type": "POST"},
  "columns": [
          {'data': 'to','name':'to'},
          {'data': 'cc','name':'cc' },
          {'data' : 'bcc','name':'bcc' },
          {'data' : 'subject','name':'subject' },
          {'data' : 'message','name':'message'},
          {"data": "actions",orderable: false, searchable: false}
        ],
  "columnDefs": [
          { orderable: false, targets: -1 }
      ]
  });
  //fares
  FareTable = $('#fares_index').DataTable({
    "aaSorting": [],
  "processing": true,
  "serverSide": true,
  "stateSave" : true,
  "ajax": {"url":APP_URL+'/admin/fares/indexing',"type": "POST"},
  "columns": [
          {'data': 'vehicle_type','name':'vehicle_type'},
          {'data': 'fare_pr_km','name':'fare_pr_km' },
          {'data' : 'minimum_fare','name':'minimum_fare' },
          {'data' : 'minimum_distance','name':'minimum_distance'},
          {'data' : 'waiting_fare','name':'waiting_fare' },
          {"data": "actions",orderable: false, searchable: false}
        ],
  "columnDefs": [
          { orderable: false, targets: -1 }
      ]
  });
  //coupons
  CouponTable = $('#coupons_index').DataTable({
    "aaSorting": [],
  "processing": true,
  "serverSide": true,
  "stateSave" : true,
  "ajax": {"url":APP_URL+'/admin/coupons/indexing',"type": "POST"},
  "columns": [
          {'data': 'coupon_code','name':'coupon_code'},
          {'data': 'discount','name':'discount' },
          {'data' : 'expired','name':'expired' },
          {"data": "actions",orderable: false, searchable: false}
        ],
  "columnDefs": [
          { orderable: false, targets: -1 }
      ]
  });
  //banners
  CouponTable = $('#banners_index').DataTable({
    "aaSorting": [],
  "processing": true,
  "serverSide": true,
  "stateSave" : true,
  "ajax": {"url":APP_URL+'/admin/banners/indexing',"type": "POST"},
  "columns": [
          {'data': 'media',orderable: false, searchable: false},
          {'data': 'title','name':'title' },
          {'data' : 'activation_date','name':'activation_date' },
          {'data' : 'expire_date','name':'expire_date' },
          {'data' : 'status','name':'status' },
          {"data": "actions",orderable: false, searchable: false}
        ],
  "columnDefs": [
          { orderable: false, targets: -1 }
      ]
  });

});

function deleteVehicle(id,that){
  if(id != '' || id != 0){
    var this_obj = that;          
    var data = {'id':id};
    var moduleUrl ='/admin/vehicles/delete';
    var moduleName ='Vehicle';
    DeleteModuleAjax(data,moduleUrl,this_obj,moduleName,VehilceTable);

  }
}
function deleteTrip(id,that){
  if(id != '' || id != 0){
    var this_obj = that;          
    var data = {'id':id };
    var moduleUrl ='/admin/trips/delete';
    var moduleName ='Trip';
    DeleteModuleAjax(data,moduleUrl,this_obj,moduleName,TripTable);
  }
}
function deleteDriver(id,that){
  if(id != '' || id != 0){
    var this_obj = that;          
    var data = {'id':id};
    var moduleUrl ='/admin/drivers/delete';
    var moduleName ='Driver';
    DeleteModuleAjax(data,moduleUrl,this_obj,moduleName,DriverTable);
  }
}
function deletePassenger(id,that){
  if(id != '' || id != 0){
    var this_obj = that;          
    var data = {'id':id};
    var moduleUrl ='/admin/passengers/delete';
    var moduleName ='Passenger';
    DeleteModuleAjax(data,moduleUrl,this_obj,moduleName,PassengerTable);
  }
}
function deleteFare(id,that){
  if(id != '' || id != 0){
    var this_obj = that;          
    var data = {'id':id};
    var moduleUrl ='/admin/fares/delete';
    var moduleName ='Fare';
    DeleteModuleAjax(data,moduleUrl,this_obj,moduleName,FareTable);
  }
}
function deleteCoupon(id,that){
  if(id != '' || id != 0){
    var this_obj = that;          
    var data = {'id':id};
    var moduleUrl ='/admin/coupons/delete';
    var moduleName ='Coupon';
    DeleteModuleAjax(data,moduleUrl,this_obj,moduleName,CouponTable);
  }
}
//delete banners
function deleteBanner(id,that){
  if(id != '' || id != 0){
    var this_obj = that;          
    var data = {'id':id};
    var moduleUrl ='/admin/banners/delete';
    var moduleName ='Banner';
    DeleteModuleAjax(data,moduleUrl,this_obj,moduleName,CouponTable);
  }
}

function deleteMail(id,that){
  if(id != '' || id != 0){
    var this_obj = that;          
    var data = {'id':id};
    // var moduleUrl ='/admin/coupons/delete';
    // var moduleName ='Coupon';
    // DeleteModuleAjax(data,moduleUrl,this_obj,moduleName,MailTable);
  }
}