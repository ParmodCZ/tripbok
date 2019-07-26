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
  $('#file_upload').on('change', function() {
      imagesPreview(this, 'div.gallery');
  });
});

$(document).ready(function () {
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
    $('#vehilces_index').DataTable({
       // "aaSorting": [],
      "processing": true,
      "serverSide": true,
      // "stateSave" : true,
      "ajax": {"url":APP_URL+'/admin/vehicles/indexing',"type": "POST"},
      "columns": [
              {'data': 'media',orderable: false, searchable: false },
              {'data': 'vehicle_number' },
              {'data' : 'model' },
              {'data' : 'type' },
              {'data' : 'seats' },
              {"data": "actions",orderable: false, searchable: false}
            ],
      "columnDefs": [
              { orderable: false, targets: -1 }
          ]
    });

    //driver
    $('#drivers_index').DataTable({
      // "aaSorting": [],
     "processing": true,
     "serverSide": true,
     // "stateSave" : true,
     "ajax": {"url":APP_URL+'/admin/drivers/indexing',"type": "POST"},
     "columns": [
             {'data': 'media',orderable: false, searchable: false },
             {'data': 'name' },
             {'data' : 'email' },
             {'data' : 'phone' },
             {'data' : 'address' },
             {"data": "actions",orderable: false, searchable: false}
           ],
     "columnDefs": [
             { orderable: false, targets: -1 }
         ]
   });
  //trip
  $('#trips_index').DataTable({
    // "aaSorting": [],
  "processing": true,
  "serverSide": true,
  // "stateSave" : true,
  "ajax": {"url":APP_URL+'/admin/trips/indexing',"type": "POST"},
  "columns": [
          {'data': 'media',orderable: false, searchable: false },
          {'data': 'name' },
          {'data' : 'email' },
          {'data' : 'phone' },
          {'data' : 'address' },
          {"data": "actions",orderable: false, searchable: false}
        ],
  "columnDefs": [
          { orderable: false, targets: -1 }
      ]
  });

});