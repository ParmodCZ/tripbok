$(document).ready(function () {
    // date picker
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
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

     $('#vehilces_index').DataTable({
       processing: true,
       serverSide: true,
       "ajax": {"url":APP_URL+'/admin/vehicles/indexing',"type": "POST",},
       // "columns": [
       //           { data: 'image', name: 'image' },
       //          { data: 'id', name: 'id' },
       //          { data: 'name', name: 'name' },
       //          { data: 'model', name: 'model' },
       //          { data: 'type', name: 'type' },
       //          { data: "price_pr_km", "name": "actions" }
       //       ]
    });

});