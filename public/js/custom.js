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

});