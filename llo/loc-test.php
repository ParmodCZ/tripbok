<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <title>CubeTaxiShark | Manual Booking</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport" />
      <link rel="stylesheet" href="css/select2/select2.min.css" type="text/css" >
      <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <![endif]-->
      <!-- GLOBAL STYLES -->
      <link rel="icon" href="../favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="http://cubetaxishark.bbcsproducts.com/assets/plugins/bootstrap/css/bootstrap.css" />
      <link rel="stylesheet" href="http://cubetaxishark.bbcsproducts.com/admin/css/main.css" />
      <link rel="stylesheet" href="http://cubetaxishark.bbcsproducts.com/assets/css/theme.css" />
      <link rel="stylesheet" href="http://cubetaxishark.bbcsproducts.com/assets/css/MoneAdmin.css" />
      <link rel="stylesheet" href="http://cubetaxishark.bbcsproducts.com/assets/plugins/Font-Awesome/css/font-awesome.css" />
      <link rel="stylesheet" href="http://cubetaxishark.bbcsproducts.com/assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" />
      <link rel="stylesheet" href="http://cubetaxishark.bbcsproducts.com/admin/css/style.css" />
      <script src="http://cubetaxishark.bbcsproducts.com/assets/plugins/jquery-2.0.3.min.js"></script> 
      <!--END GLOBAL STYLES -->
      <!-- PAGE LEVEL STYLES -->
      <!-- END PAGE LEVEL  STYLES -->
      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131543924-1"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         
         gtag('config', 'UA-131543924-1');
      </script><script>
         function checkAlls() {
             jQuery("#_list_form input[type=checkbox]").each(function () {
                 if ($(this).attr('disabled') != 'disabled') {
                     this.checked = 'true';
                 }
             });
         }
         
         function uncheckAlls() {
             jQuery("#_list_form input[type=checkbox]").each(function () {
                 this.checked = '';
             });
         }
         
         function ChangeStatusAll(statusNew) {
             if (statusNew != "") {
                 var status = statusNew;
                 var checked = $("#_list_form input:checked").length;
                 if (checked > 0) {
                     if (checked == 1) {
                         if ($("#_list_form input:checked").attr("id") == 'setAllCheck') {
                             $('#is_not_check_modal').modal('show');
                             $("#changeStatus").val('');
                             return false;
                         }
                     }
                     $("#statusVal").val(status);
                     if (status == 'Active') {
                         $('#is_actall_modal').modal('show');
                     } else if (status == 'Inactive') {
                         $('#is_inactall_modal').modal('show');
                     } else {
                         $('#is_dltall_modal').modal('show');
                     }
         
                     $(".action_modal_submit").unbind().click(function () {
                         var action = $("#pageForm").attr('action');
                         var formValus = $("#_list_form, #pageForm").serialize();
                         window.location.href = action + "?" + formValus;
                     });
                     $("#changeStatus").val('');
                 } else {
                     $('#is_not_check_modal').modal('show');
                     $("#changeStatus").val('');
                     return false;
                 }
             } else {
                 return false;
             }
         }
         
         
         function changeStatus(iAdminId, status) {
         //      $('html').addClass('loading');
             var action = $("#pageForm").attr('action');
             var page = $("#page").val();
             if (status == 'Active') {
                 status = 'Inactive';
             } else {
                 status = 'Active';
             }
             $("#page").val(page);
             $("#iMainId01").val(iAdminId);
             $("#status01").val(status);
             var formValus = $("#pageForm").serialize();
             window.location.href = action + "?" + formValus;
         }
         //make
         /* function changeStatus(iMakeId,status) {
          //     $('html').addClass('loading');
          var action = $("#pageForm").attr('action');
          var page = $("#page").val();
          if(status == 'Active') {
          status = 'Inactive';
          }else {
          status = 'Active';
          }
          $("#page").val(page);
          $("#iMainId01").val(iAdminId);
          $("#status01").val(status);
          var formValus = $("#pageForm").serialize();
          window.location.href = action+"?"+formValus;
          } */
         //make
         function changeStatusDelete(iAdminId) {
         
             $('#is_dltSngl_modal').modal('show');
         
             $(".action_modal_submit").unbind().click(function () {
         //          $('html').addClass('loading');
         
                 var action = $("#pageForm").attr('action');
         
                 var page = $("#pageId").val();
                 $("#pageId01").val(page);
                 $("#iMainId01").val(iAdminId);
                 $("#method").val('delete');
                 var formValus = $("#pageForm").serialize();
                 window.location.href = action + "?" + formValus;
         
             });
         }
         function changeStatusDeletevehicle(iAdminId, driverid) {
             $('#is_dltSngl_modal').modal('show');
             $(".action_modal_submit").unbind().click(function () {
         //          $('html').addClass('loading');
                 var action = $("#pageForm").attr('action');
                 var page = $("#pageId").val();
                 $("#pageId01").val(page);
                 $("#iMainId01").val(iAdminId);
                 $("#iDriverId").val(driverid);
                 $("#method").val('delete');
                 var formValus = $("#pageForm").serialize();
                 window.location.href = action + "?" + formValus;
         
             });
         }
         
         function changeStatusDeletecd(iAdminId) {
             $('#is_dltSngl_modal_cd').modal('show');
             $(".action_modal_submit").unbind().click(function () {
         //          $('html').addClass('loading');
                 var action = $("#pageForm").attr('action');
                 var page = $("#pageId").val();
                 $("#pageId01").val(page);
                 $("#iMainId01").val(iAdminId);
                 $("#method").val('delete');
                 var formValus = $("#pageForm").serialize();
                 window.location.href = action + "?" + formValus;
         
             });
         }
         
         
         function resetTripStatus(iAdminId) {
             $('#is_resetTrip_modal').modal('show');
             $(".action_modal_submit").unbind().click(function () {
         //          $('html').addClass('loading');
                 var action = $("#pageForm").attr('action');
                 var page = $("#pageId").val();
                 $("#pageId01").val(page);
                 $("#iMainId01").val(iAdminId);
                 $("#method").val('reset');
                 var formValus = $("#pageForm").serialize();
                 window.location.href = action + "?" + formValus;
             });
         }
         
         function showExportTypes(section) {
             if (section == 'store_review') {
                 $("#show_export_types_modal_excel").modal('show');
                 $("#export_modal_submit_excel").on('click', function () {
                     var action = "main_export.php";
                     var formValus = $("#_export_form, #pageForm, #show_export_modal_form_excel").serialize();
                     //alert(formValus);
                     window.location.href = action + '?section=' + section + '&' + formValus;
                     $("#show_export_types_modal_excel").modal('hide');
                     return false;
                 });
             } else {
                 $("#show_export_types_modal").modal('show');
                 $("#export_modal_submit").on('click', function () {
                     var action = "main_export.php";
                     var formValus = $("#_export_form, #pageForm, #show_export_modal_form").serialize();
                     window.location.href = action + '?section=' + section + '&' + formValus;
                     $("#show_export_types_modal").modal('hide');
                     return false;
                 });
             }
         }
         function Redirect(sortby, order) {
             //$('html').addClass('loading');
             $("#sortby").val(sortby);
             if (order == 0) {
                 order = 1;
             } else {
                 order = 0;
             }
             $("#order").val(order);
             $("#page").val('1');
             var action = $("#_list_form").attr('action');
             var formValus = $("#pageForm").serialize();
             //alert(formValus);
             window.location.href = action + "?" + formValus;
         }
         
         function reset_form(formId) {
             $("#" + formId).find("input[type=text],input[type=password],input[type=file], textarea, select").val("");
         }
         
         //function openHoverAction(openId) {
         $('.openHoverAction-class').click(function (e) {
             // openHoverAction-class
             //e.preventDefault();
             alert('hiii');
             // hide all span
             var $this = $(this).find('.show-moreOptions');
             $(".openHoverAction-class .show-moreOptions").not($this).hide();
         
             // here is what I want to do
             $this.toggle();
         
         //            if($(".openPops_"+openId).hasClass('active')) {
         //                $('.show-moreOptions').removeClass('active');
         //            }else {
         //                
         //            }
         //            $(".openPops_"+openId).addClass('active');
         });
         function reportExportTypes(section) {
             var action = "report_export.php";
             var formValus = $("#pageForm").serialize();
             //alert(formValus);
             window.location.href = action + '?section=' + section + '&' + formValus;
             return false;
         }
         
         function Paytodriver() {
             var checked = $("#_list_form input:checked").length;
             if (checked > 0) {
                 if (checked == 1) {
                     if ($("#_list_form input:checked").attr("id") == 'setAllCheck') {
                         $('#is_not_check_modal').modal('show');
                         $("#changeStatus").val('');
                         return false;
                     }
                 }
                 $('#is_payTo_modal').modal('show');
                 $(".action_modal_submit").unbind().click(function () {
                     $("#ePayDriver").val('Yes');
                     var action = $("#pageForm").attr('action');
                     var formValus = $("#_list_form, #pageForm").serialize();
                     window.location.href = action + "?" + formValus;
                 });
             } else {
                 $('#is_not_check_modal').modal('show');
                 return false;
             }
         }
         
         function PaytodriverforCancel() {
             var checked = $("#_list_form input:checked").length;
             if (checked > 0) {
                 if (checked == 1) {
                     if ($("#_list_form input:checked").attr("id") == 'setAllCheck') {
                         $('#is_not_check_modal').modal('show');
                         $("#changeStatus").val('');
                         return false;
                     }
                 }
                 $('#is_payTo_modal').modal('show');
                 $(".action_modal_submit").unbind().click(function () {
                     $("#ePayDriver").val('Yes');
                     var action = $("#pageForm").attr('action');
                     var formValus = $("#_list_form, #pageForm").serialize();
                     window.location.href = action + "?" + formValus;
                 });
             } else {
                 $('#is_not_check_modal').modal('show');
                 return false;
             }
         }
         function PaytoorganizationforCancel() {
             var checked = $("#_list_form input:checked").length;
             if (checked > 0) {
                 if (checked == 1) {
                     if ($("#_list_form input:checked").attr("id") == 'setAllCheck') {
                         $('#is_not_check_modal').modal('show');
                         $("#changeStatus").val('');
                         return false;
                     }
                 }
                 $('#is_payTo_organization_modal').modal('show');
                 $(".action_modal_submit").unbind().click(function () {
                     $("#ePayDriver").val('Yes');
                     var action = $("#pageForm").attr('action');
                     var formValus = $("#_list_form, #pageForm").serialize();
                     window.location.href = action + "?" + formValus;
                 });
             } else {
                 $('#is_not_check_modal').modal('show');
                 return false;
             }
         }
         
         function changeOrder(iAdminId) {
             $('#is_dltSngl_modal').modal('show');
             $(".action_modal_submit").unbind().click(function () {
                 var action = $("#pageForm").attr('action');
                 var page = $("#pageId").val();
                 $("#pageId01").val(page);
                 $("#iMainId01").val(iAdminId);
                 $("#method").val('delete');
                 var formValus = $("#pageForm").serialize();
                 window.location.href = action + "?" + formValus;
             });
         }
         
         function PaytoRestaurant() {
         
             var checked = $("#_list_form input:checked").length;
         
             if (checked > 0) {
                 if (checked == 1) {
         
                     if ($("#_list_form input:checked").attr("id") == 'setAllCheck') {
                         $('#is_not_check_modal').modal('show');
                         $("#changeStatus").val('');
                         return false;
                     }
                 }
                 $('#is_payTo_Res_modal').modal('show');
                 $(".action_modal_submit").unbind().click(function () {
                     $("#ePayRestaurant").val('Yes');
                     var action = $("#pageForm").attr('action');
                     var formValus = $("#_list_form, #pageForm").serialize();
                     window.location.href = action + "?" + formValus;
                 });
             } else {
                 $('#is_not_check_modal').modal('show');
                 return false;
             }
         }
         
      </script>
      <!-- Select Error -->
      <div data-backdrop="static" data-keyboard="false" class="modal fade" id="is_not_check_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4></h4>
               </div>
               <div class="modal-body">
                  <p>Please Check At Least One Record</p>
               </div>
               <div class="modal-footer"><button type="button" class="btn btn-danger btn-ok" data-dismiss="modal">OK</button></div>
            </div>
         </div>
      </div>
      <!-- Active Modal -->
      <div data-backdrop="static" data-keyboard="false" class="modal fade" id="is_actall_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4>Active Record(s) ?</h4>
               </div>
               <div class="modal-body">
                  <p id="new-msg-activeid">Are you sure you want to activate selected record(s)?</p>
               </div>
               <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button><a class="btn btn-success btn-ok action_modal_submit" >Yes</a></div>
            </div>
         </div>
      </div>
      <!-- Inactive Modal -->
      <div data-backdrop="static" data-keyboard="false" class="modal fade" id="is_inactall_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4>Inactive Record(s) ?</h4>
               </div>
               <div class="modal-body">
                  <p>Are you sure you want to inactivate selected record(s)?</p>
               </div>
               <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button><a class="btn btn-success btn-ok action_modal_submit" >Yes</a></div>
            </div>
         </div>
      </div>
      <!-- DeleteAll Modal -->
      <div data-backdrop="static" data-keyboard="false" class="modal fade" id="is_dltall_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4>Delete Record(s) ?</h4>
               </div>
               <div class="modal-body">
                  <p>Are you sure you want to delete selected records?</p>
               </div>
               <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button><a class="btn btn-success btn-ok action_modal_submit" >Yes</a></div>
            </div>
         </div>
      </div>
      <!-- Delete Single Modal -->
      <div data-backdrop="static" data-keyboard="false" class="modal fade" id="is_dltSngl_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4>Delete Record(s) ?</h4>
               </div>
               <div class="modal-body">
                  <p>Are you sure you want to delete this record?</p>
               </div>
               <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button><a class="btn btn-success btn-ok action_modal_submit" >Yes</a></div>
            </div>
         </div>
      </div>
      <div data-backdrop="static" data-keyboard="false" class="modal fade" id="is_dltSngl_modal_cd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4>Delete Record(s) ?</h4>
               </div>
               <div class="modal-body">
                  <p> This company contains drivers under it. If you delete company then all drivers will be assigned to default company. Confirm to delete company?</p>
               </div>
               <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button><a class="btn btn-success btn-ok action_modal_submit" >Yes</a></div>
            </div>
         </div>
      </div>
      <!-- Reset Trip Status Modal -->
      <div data-backdrop="static" data-keyboard="false" class="modal fade" id="is_resetTrip_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4>Reset Record(s) ?</h4>
               </div>
               <div class="modal-body">
                  <p>Are you sure? You want to reset selected account?</p>
               </div>
               <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button><a class="btn btn-success btn-ok action_modal_submit">Yes</a></div>
            </div>
         </div>
      </div>
      <!-- Export Modal -->
      <div class="modal fade" id="show_export_types_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4>Export to file : </h4>
               </div>
               <div class="modal-body">
                  <form name="show_export_modal_form" id="show_export_modal_form" action="" method="post" class="form-horizontal form-box remove-margin" enctype="multipart/form-data">
                     <div class="form-box-content export-popup">
                        <b>Select File type : </b>
                        <span><input type="radio" name="exportType" value="XLS" checked>Excel/CSV</span>
                        <span><input type="radio" name="exportType" value="PDF">PDF</span>
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <p style="text-align: left;">Please <a href="excelfilesteps.html" target="_blank">click here</a> to follow the steps, If your expoerted CSV files shows special characters corrupted.</a></p>
                  <br/>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><a id="export_modal_submit" class="btn btn-primary">Download</a>
               </div>
            </div>
         </div>
      </div>
      <!-- Export Excel Modal --><!-- For blocked To Driver/Rider Modal -->
      <div class="modal fade" id="show_export_types_modal_excel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4>Export to file : </h4>
               </div>
               <div class="modal-body">
                  <form name="show_export_modal_form_excel" id="show_export_modal_form_excel" action="" method="post" class="form-horizontal form-box remove-margin" enctype="multipart/form-data">
                     <div class="form-box-content export-popup">
                        <b>Select File type : </b>
                        <span><input type="radio" name="exportType" value="XLS" checked>Excel/CSV</span>
                        <!-- <span><input type="radio" name="exportType" value="PDF">PDF</span> -->
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <p style="text-align: left;">Please <a href="excelfilesteps.html" target="_blank">click here</a> and follow the steps, if the exported CVS file is corrupted or shows junk characters.</a></p>
                  <br/>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><a id="export_modal_submit_excel" class="btn btn-primary">Download</a>
               </div>
            </div>
         </div>
      </div>
      <!-- Pay To Driver Modal -->
      <div data-backdrop="static" data-keyboard="false" class="modal fade" id="is_payTo_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4>Pay to Driver(s) ?</h4>
               </div>
               <div class="modal-body">
                  <p>Are you sure you want to Pay To Driver(s)?</p>
               </div>
               <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button><a class="btn btn-success btn-ok action_modal_submit" >Yes</a></div>
            </div>
         </div>
      </div>
      <!-- Pay To Restaurant Modal -->
      <!-- Pay To Driver Modal -->
      <div data-backdrop="static" data-keyboard="false" class="modal fade" id="is_payTo_organization_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4>Pay by Organization(s) ?</h4>
               </div>
               <div class="modal-body">
                  <p>Are you sure you have collected amount from organization(s) ?</p>
               </div>
               <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button><a class="btn btn-success btn-ok action_modal_submit" >Yes</a></div>
            </div>
         </div>
      </div>
      <!-- Pay To Restaurant Modal -->
      <div data-backdrop="static" data-keyboard="false" class="modal fade" id="is_payTo_Res_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4>Pay to Restaurant(s) ?</h4>
               </div>
               <div class="modal-body">
                  <p>Are you sure you want to Pay To Restaurant(s)?</p>
               </div>
               <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button><a class="btn btn-success btn-ok action_modal_submit" >Yes</a></div>
            </div>
         </div>
      </div>
      <script src="//maps.google.com/maps/api/js?sensor=true&key=AIzaSyCXxuaZD88IKBShrKBPezrE1dHho2hxuPs&libraries=places" type="text/javascript"></script>
      <script type='text/javascript' src='http://cubetaxishark.bbcsproducts.com/assets/map/gmaps.js'></script>
      <script type='text/javascript' src='view-source:http://cubetaxishark.bbcsproducts.com/admin/add_booking.php'></script>
      <script type='text/javascript' src='../assets/js/bootbox.min.js'></script>
   </head>
   <body class="padTop53">
      <div id="wrap">
      <!-- HEADER SECTION -->
      <script>
         var _system_admin_url = 'http://cubetaxishark.bbcsproducts.com/admin/';
      </script>
      <script src="http://cubetaxishark.bbcsproducts.com/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <!-- test it -->
      <script src="http://cubetaxishark.bbcsproducts.com/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
      <!-- <script src="js/New/perfect-scrollbar.js"></script> -->
      <!-- END GLOBAL SCRIPTS -->
      <!-- END HEADER SECTION -->
      <link type="text/css" href="http://cubetaxishark.bbcsproducts.com/admin/css/admin_new/admin_style.css" rel="stylesheet" />
      <!--<link type="text/css" href="css/adminLTE/AdminLTE.min.css" rel="stylesheet" />-->
      <input type="hidden" name="baseurl" id="baseurl" value="">
      <div class="wrapper1">
         <div class="new-mobile001">
            <nav class="navbar navbar-inverse navbar-fixed-top" style="padding:7px 0;">
               <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#sidebar" id="menu-toggle"><i class="icon-align-justify"></i></a>
            </nav>
         </div>
         <header class="main_header">
            <div class="header clearfix">
               <a href="dashboard.php" title="" class="logo"> <span class="logo-mini"> <img src="images/logo-small.png" alt="" /> </span> <span class="logo-lg minus"> <img src="images/admin-logo.png" alt="" /> </span> </a>
               <nav class="navbar-static-top"> 
                  <a class="sidebar-toggle" href="javascript:void(0);" data-toggle="tooltip" data-placement="right" title="show / hide sidebar"></a>
                  <span style="margin: 26px 0 0 20px;float: left;">Main&nbsp;&nbsp;Admin</span>
               </nav>
               <div>
                  <a href="logout.php" title="Logout" class="header-top-button"><img src="images/logout-icon1.png" alt="" />Logout</a>
                  <!--<div id="google_translate_element" class="header-top-translate-button"></div>-->
               </div>
            </div>
         </header>
         <div class="main-sidebar">
            <section class="sidebar">
               <!-- Sidebar -->
               <div id="sidebar" class="test" >
                  <nav class="menu">
                     <ul class='sidebar-menu' style=''>
                        <li  class=''><a href='dashboard.php'><i class='fa fa-tachometer' aria-hidden='true'></i><span>Dashboard</span></a></li>
                        <li  class=''><a href='dashboard-a.php'><i class='fa fa-sitemap' aria-hidden='true'></i><span>Site Statistics</span></a></li>
                        <li  class='treeview'>
                           <a href='javascript:' class='expand'><i class='icon-user1' aria-hidden='true'><img src='images/icon/admin-icon.png' /></i><span>Admin</span></a>
                           <ul class='treeview-menu menu_drop_down' style='display:none'>
                              <li  class=''><a href='admin.php'><i class='fa fa-certificate' aria-hidden='true'></i>Admin Users</a></li>
                              <li  class=''><a href='admin_groups.php'><i class='fa fa-certificate' aria-hidden='true'></i>Admin Groups</a></li>
                           </ul>
                        </li>
                        <li  class=''><a href='company.php'><i class='fa fa-building-o' aria-hidden='true'></i><span>Company</span></a></li>
                        <li  class=''><a href='driver.php'><i class='icon-user1' aria-hidden='true'><img src='images/icon/driver-icon.png' /></i><span>Driver</span></a></li>
                        <li  class=''><a href='vehicles.php'><i class='fa fa-taxi' aria-hidden='true'></i><span>Driver Vehicles</span></a></li>
                        <li  class=''><a href='rental_vehicle_list.php'><i class='fa fa-dot-circle-o' aria-hidden='true'></i><span>Rental Packages</span></a></li>
                        <li  class=''><a href='vehicle_type.php'><i class='icon-user1' aria-hidden='true'><img src='images/icon/vehicle-type-icon.png' /></i><span>Vehicle Type</span></a></li>
                        <li  class=''><a href='rider.php'><i class='icon-group1' aria-hidden='true'><img src='images/rider-icon.png' /></i><span>Rider</span></a></li>
                        <li  class='active'><a href='add_booking.php'><i class='fa fa-taxi1' aria-hidden='true'><img src='images/manual-taxi-icon.png' /></i><span>Manual Booking</span></a></li>
                        <li  class=''><a href='cab_booking.php'><i class='icon-book1' aria-hidden='true'><img src='images/ride-later-bookings.png' /></i><span>Ride Later Bookings</span></a></li>
                        <li  class=''><a href='trip.php'><i class='fa fa-exchange1' aria-hidden='true'><img src='images/trips-icon.png' /></i><span>Trips</span></a></li>
                        <li  class=''><a href='coupon.php'><i class='fa fa-product-hunt1' aria-hidden='true'><img src='images/promo-code-icon.png' /></i><span>PromoCode</span></a></li>
                        <li  class=''><a href='map_godsview.php'><i class='icon-map-marker1' aria-hidden='true'><img src='images/god-view-icon.png' /></i><span>God's View</span></a></li>
                        <li  class=''><a href='heatmap.php'><i class='fa-header1' aria-hidden='true'><img src='images/heat-icon.png' /></i><span>Heat View</span></a></li>
                        <li  class=''><a href='review.php'><i class='icon-comments1' aria-hidden='true'><img src='images/reviews-icon.png' /></i><span>Reviews</span></a></li>
                        <li  class=''><a href='advertise_banners.php'><i class='fa fa-bullhorn' aria-hidden='true'></i><span>Advertisement Banners</span></a></li>
                        <li  class='treeview'>
                           <a href='javascript:' class='expand'><i class='fa fa-bullhorn' aria-hidden='true'></i><span>Decline/Cancelled Alert</span></a>
                           <ul class='treeview-menu menu_drop_down' style='display:none'>
                              <li  class=''><a href='blocked_driver.php'><i class='fa fa-user' aria-hidden='true'></i>Alert For Driver</a></li>
                              <li  class=''><a href='blocked_rider.php'><i class='fa fa-user' aria-hidden='true'></i>Alert For Rider</a></li>
                           </ul>
                        </li>
                        <li  class='treeview'>
                           <a href='javascript:' class='expand'><i class='icon-cogs1' aria-hidden='true'><img src='images/reports-icon.png' /></i><span>Reports</span></a>
                           <ul class='treeview-menu menu_drop_down' style='display:none'>
                              <li  class=''><a href='payment_report.php'><i class='icon-money' aria-hidden='true'></i>Payment Report</a></li>
                              <li  class=''><a href='hotel_payment_report.php'><i class='icon-money' aria-hidden='true'></i>Hotel Payment Report</a></li>
                              <li  class=''><a href='referrer.php'><i class='fa fa-hand-peace-o' aria-hidden='true'></i>Referral Report</a></li>
                              <li  class=''><a href='wallet_report.php'><i class='fa fa-google-wallet' aria-hidden='true'></i>User Wallet Report</a></li>
                              <li  class=''><a href='driver_pay_report.php'><i class='icon-money' aria-hidden='true'></i>Driver Payment Report</a></li>
                              <li  class=''><a href='driver_log_report.php'><i class='glyphicon glyphicon-list-alt' aria-hidden='true'></i>Driver Log Report</a></li>
                              <li  class=''><a href='cancelled_trip.php'><i class='fa fa-exchange' aria-hidden='true'></i>Cancelled Trip</a></li>
                              <li  class=''><a href='ride_acceptance_report.php'><i class='icon-group' aria-hidden='true'></i>Trip Acceptance Report</a></li>
                              <li  class=''><a href='driver_trip_detail.php'><i class='fa fa-taxi' aria-hidden='true'></i>Trip Time Variance</a></li>
                           </ul>
                        </li>
                        <li  class='treeview'>
                           <a href='javascript:' class='expand'><i class='fa fa-header1' aria-hidden='true'><img src='images/location-icon.png' /></i><span>Manage Locations</span></a>
                           <ul class='treeview-menu menu_drop_down' style='display:none'>
                              <li  class=''><a href='location.php'><i class='fa fa-map-marker' aria-hidden='true'></i>Geo Fence Location</a></li>
                              <li  class=''><a href='restricted_area.php'><i class='fa fa-map-signs' aria-hidden='true'></i>Restricted Area</a></li>
                              <li  class=''><a href='locationwise_fare.php'><i class='fa fa-map-signs' aria-hidden='true'></i>Locationwise Fare</a></li>
                              <li  class=''><a href='airport_surcharge.php'><i class='fa fa-map-signs' aria-hidden='true'></i>Airport Surcharge</a></li>
                           </ul>
                        </li>
                        <li  class='treeview'>
                           <a href='javascript:' class='expand'><i class='icon-cogs1' aria-hidden='true'><img src='images/settings-icon.png' /></i><span>Settings</span></a>
                           <ul class='treeview-menu menu_drop_down' style='display:none'>
                              <li  class=''><a href='general.php'><i class='fa-cogs fa' aria-hidden='true'></i>General</a></li>
                              <li  class=''><a href='email_template.php'><i class='fa fa-envelope' aria-hidden='true'></i>Email Templates</a></li>
                              <li  class=''><a href='sms_template.php'><i class='fa fa-comment' aria-hidden='true'></i>SMS Templates</a></li>
                              <li  class=''><a href='document_master_list.php'><i class='fa fa-file-text' aria-hidden='true'></i>Manage Documents</a></li>
                              <li  class=''><a href='languages.php'><i class='fa fa-language' aria-hidden='true'></i>Language Label</a></li>
                              <li  class=''><a href='currency.php'><i class='fa fa-usd' aria-hidden='true'></i>Currency</a></li>
                              <li  class=''><a href='seo_setting.php'><i class='fa fa-info' aria-hidden='true'></i>SEO Settings</a></li>
                           </ul>
                        </li>
                        <li  class='treeview'>
                           <a href='javascript:' class='expand'><i class='fa fa-wrench' aria-hidden='true'></i><span>Utility</span></a>
                           <ul class='treeview-menu menu_drop_down' style='display:none'>
                              <li  class='treeview'>
                                 <a href='javascript:' class='expand'><i class='fa fa-globe' aria-hidden='true'></i>Localization</a>
                                 <ul class='treeview-menu menu_drop_down' style='display:none'>
                                    <li  class=''><a href='country.php'><i class='fa fa-dot-circle-o' aria-hidden='true'></i>Country</a></li>
                                    <li  class=''><a href='state.php'><i class='fa fa-dot-circle-o' aria-hidden='true'></i>State</a></li>
                                    <li  class=''><a href='city.php'><i class='fa fa-dot-circle-o' aria-hidden='true'></i>City</a></li>
                                 </ul>
                              </li>
                              <li  class=''><a href='page.php'><i class='fa fa-file-text-o' aria-hidden='true'></i>Pages</a></li>
                              <li  class=''><a href='home_content.php'><i class='fa fa-file-text-o' aria-hidden='true'></i>Edit Home Page</a></li>
                              <li  class=''><a href='home_driver.php'><i class='fa fa-users' aria-hidden='true'></i>Our Driver</a></li>
                              <li  class=''><a href='make.php'><i class='fa fa-car' aria-hidden='true'></i>Vehicle Make</a></li>
                              <li  class=''><a href='model.php'><i class='fa fa-taxi' aria-hidden='true'></i>Vehicle Model</a></li>
                              <li  class=''><a href='visit.php'><i class='fa fa-map-marker' aria-hidden='true'></i>Visit Location</a></li>
                              <li  class=''><a href='news.php'><i class='fa fa-file-text-o' aria-hidden='true'></i>News</a></li>
                              <li  class=''><a href='newsletter.php'><i class='fa fa-file-text-o' aria-hidden='true'></i>Newsletter Subscribers</a></li>
                              <li  class=''><a href='faq.php'><i class='fa fa-question' aria-hidden='true'></i>Faq</a></li>
                              <li  class=''><a href='faq_categories.php'><i class='fa fa-question-circle-o' aria-hidden='true'></i>Faq Categories</a></li>
                              <li  class=''><a href='help_detail.php'><i class='fa fa-question' aria-hidden='true'></i>Help Topics</a></li>
                              <li  class=''><a href='help_detail_categories.php'><i class='fa fa-question-circle-o' aria-hidden='true'></i>Help Topic Categories</a></li>
                              <li  class=''><a href='cancellation_reason.php'><i class='fa fa-question' aria-hidden='true'></i>Cancel Reason</a></li>
                              <li  class=''><a href='send_notifications.php'><i class='fa fa-globe' aria-hidden='true'></i>Send Push-Notification</a></li>
                              <li  class=''><a href='backup.php'><i class='fa fa-database' aria-hidden='true'></i>DB Backup</a></li>
                              <li  class=''><a href='system_diagnostic.php'><i class='fa fa-sitemap' aria-hidden='true'></i>System Diagnostic</a></li>
                           </ul>
                        </li>
                        <li  class='treeview'>
                           <a href='javascript:' class='expand'><i class='fa fa-taxi' aria-hidden='true'></i><span>Manage Ride Profiles</span></a>
                           <ul class='treeview-menu menu_drop_down' style='display:none'>
                              <li  class=''><a href='organization.php'><i class='fa fa-globe' aria-hidden='true'></i>Organization</a></li>
                              <li  class=''><a href='user_profile_master.php'><i class='fa fa-file-text-o' aria-hidden='true'></i>Ride Profile Type</a></li>
                              <li  class=''><a href='trip_reason.php'><i class='fa fa-book' aria-hidden='true'></i>Business Trip Reason</a></li>
                              <li  class=''><a href='org_payment_report.php'><i class='fa fa-taxi' aria-hidden='true'></i>Organization Payment Report</a></li>
                           </ul>
                        </li>
                        <li  class=''><a href='logout.php'><i class='icon-signin1' aria-hidden='true'><img src='images/logout-icon.png' /></i><span>Logout</span></a></li>
                     </ul>
                  </nav>
               </div>
            </section>
         </div>
         <div class="loader-default"></div>
         <script>
            function setMenuEnable(id)
            {
                $.ajax({
                    method: "post",
                    url: _system_admin_url + "setMenuEnable.php",
                    data: "data=" + id,
                    cache: false,
                    dataType: 'html',
                    success: function (response) {
                    }
                });
            }
            $(document).ready(function () {
                $.sidebarMenu($('.sidebar-menu'));
                    $("body").removeClass("sidebar_hide");
                    $("body").removeClass("sidebar-minize");
                    $("body").removeClass("sidebar-collapse");
            });
            $.sidebarMenu = function (menu) {
                var animationSpeed = 300;
                $(menu).on('click', 'li a', function (e) {
                    var $this = $(this);
                    var checkElement = $this.next();
                    if (checkElement.is('.treeview-menu') && checkElement.is(':visible')) {
                        checkElement.slideUp(animationSpeed, function () {
                            checkElement.removeClass('menu-open');
                        });
                        checkElement.parent("li").removeClass("active");
                    }
                    //If the menu is not visible
                    else if ((checkElement.is('.treeview-menu')) && (!checkElement.is(':visible'))) {
                        //Get the parent menu
                        var parent = $this.parents('ul').first();
                        //Close all open menus within the parent
                        var ul = parent.find('ul:visible').slideUp(animationSpeed);
                        //Remove the menu-open class from the parent
                        ul.removeClass('menu-open');
                        //Get the parent li
                        var parent_li = $this.parent("li");
                        //Open the target menu and add the menu-open class
                        checkElement.slideDown(animationSpeed, function () {
                            //Add the class active to the parent li
                            checkElement.addClass('menu-open');
                            parent.find('li.active').removeClass('active');
                            parent_li.addClass('active');
                        });
                    }
                    //if this isn't a link, prevent the page from being redirected
                    if (checkElement.is('.treeview-menu')) {
                        e.preventDefault();
                    }
                });
            }
         </script>
         <!-- /footer -->
      </div>
      <!-- END HEADER SECTION -->
      <script type="text/javascript">
         $(document).ready(function () {
             if ($('#messagedisplay')) {
                 $('#messagedisplay').animate({opacity: 1.0}, 2000)
                 $('#messagedisplay').fadeOut('slow');
             }
             //for side bar menu
             $(".content-wrapper").css({'min-height': ($(".wrapper .main-sidebar").height() + 'px')});
             $('.sidebar-toggle').click(function () {
                 $("body").toggleClass("sidebar_hide");
                 if ($("body").hasClass("sidebar_hide")) {
                     $("body").addClass("sidebar-minize");
                     $("body").addClass("sidebar-collapse");
                     setMenuEnable(0);
                 } else {
                     $("body").removeClass("sidebar-minize");
                     $("body").removeClass("sidebar-collapse");
                     setMenuEnable(1);
                 }
             });
             $("#content").addClass('content_right');
             if ($(window).width() < 800) {
                 $('.sidebar-toggle').click(function () {
                     $("body").toggleClass("sidebar_hide");
                     if ($("body").hasClass("sidebar_hide")) {
                         $("body").addClass("sidebar-open");
                         $("body").removeClass("sidebar-collapse");
                         setMenuEnable(0);
                     } else {
                         $("body").removeClass("sidebar-open");
                         $("body").removeClass("sidebar-collapse");
                         setMenuEnable(1);
                     }
                 });
             }
             if ($(window).width() < 900) {
                 $("body").removeClass("sidebar-collapse");
                 $('.sidebar-toggle').click(function () {
                     $('body').toggleClass('sidebar-open');
                     if (sessionStorage.sidebarin == 0) {
                         $("body").addClass("sidebar-minize");
                         $("body").removeClass("sidebar-collapse");
                     } else {
                         $("body").removeClass("sidebar-minize");
                         $("body").removeClass("sidebar-collapse");
                     }
                 });
             }
         });
      </script>
      <script type="text/javascript">
         //===== Hide/show Menubar =====//
             $('.fullview').click(function () {
                 $("body").toggleClass("clean");
                 $('#sidebar').toggleClass("show-sidebar mobile-sidebar");
                 $('#content').toggleClass("full-content");
             });
             $(window).resize(function () {
                 if ($(window).width() < 900) {
                     if (sessionStorage.sidebarin == 0) {
                         $("body").addClass("sidebar-minize");
                         $("body").removeClass("sidebar-collapse");
                     } else {
                         $("body").removeClass("sidebar-minize");
                         $("body").removeClass("sidebar-collapse");
                     }
                 }
             });
      </script>
      <script>
         $(document).ready(function () {
             $('[data-toggle="tooltip"]').tooltip();
         });
         $(window).load(function () {
             $(".loader-default").fadeOut("slow");
         });
      </script>
      <!--<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
         <script type="text/javascript">
             function googleTranslateElementInit() {
                 new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
             }
         </script>-->
      <div id="content">
         <div class="inner" style="min-height: 700px;">
            <div class="row">
               <div class="col-lg-8">
                  <h1> Manual Taxi Dispatch </h1>
               </div>
               <div class="col-lg-4">
                  <h1 class="float-right"><a class="btn btn-primary how_it_work_btn" data-toggle="modal" data-target="#myModal"><i class="fa fa-question-circle" style="font-size: 18px;"></i> How it works?</a></h1>
               </div>
            </div>
            <hr />
            <form name="add_booking_form" id="add_booking_form" method="post" action="action_booking.php" >
               <div class="form-group" style="display: inline-block;">
                  <input type="hidden" name="previousLink" id="previousLink" value=""/>
                  <input type="hidden" name="eBookingFrom" id="eBookingFrom" value="Admin" />
                  <input type="hidden" name="backlink" id="backlink" value="cab_booking.php"/>
                  <input type="hidden" name="distance" id="distance" value="">
                  <input type="hidden" name="duration" id="duration" value="">
                  <input type="hidden" name="from_lat_long" id="from_lat_long" value="" >
                  <input type="hidden" name="from_lat" id="from_lat" value="" >
                  <input type="hidden" name="from_long" id="from_long" value="" >
                  <input type="hidden" name="to_lat_long" id="to_lat_long" value="" >
                  <input type="hidden" name="to_lat" id="to_lat" value="" >
                  <input type="hidden" name="to_long" id="to_long" value="" >
                  <input type="hidden" name="fNightPrice" id="fNightPrice" value="" >
                  <input type="hidden" name="fPickUpPrice" id="fPickUpPrice" value="" >
                  <input type="hidden" name="eFlatTrip" id="eFlatTrip" value="" >
                  <input type="hidden" name="fFlatTripPrice" id="fFlatTripPrice" value="" >
                  <input type="hidden" value="1" id="location_found" name="location_found">
                  <input type="hidden" value="" id="user_type" name="user_type" >
                  <input type="hidden" value="" id="iUserId" name="iUserId" >
                  <input type="hidden" value="" id="eStatus" name="eStatus" >
                  <input type="hidden" value="Pacific/Honolulu" id="vTimeZone" name="vTimeZone" >
                  <input type="hidden" value="US" id="vRideCountry" name="vRideCountry" >
                  <input type="hidden" value="" id="iCabBookingId" name="iCabBookingId" >
                  <input type="hidden" value="AIzaSyCXxuaZD88IKBShrKBPezrE1dHho2hxuPs" id="google_server_key" name="google_server_key" >
                  <input type="hidden" value="" id="getradius" name="getradius" >
                  <input type="hidden" value="KMs" id="eUnit" name="eUnit" >
                  <input type="hidden" name="fTollPrice" id="fTollPrice" value="">
                  <input type="hidden" name="vTollPriceCurrencyCode" id="vTollPriceCurrencyCode" value="">
                  <input type="hidden" name="eTollSkipped" id="eTollSkipped" value="">
                  <input type="hidden" value="" id="eType" name="eType" />
                  <div class="add-booking-form-taxi add-booking-form-taxi1 col-lg-12">
                     <span class="col0">
                        <select name="vCountry" id="vCountry" class="form-control form-control-select" onChange="changeCode(this.value, '');setDriverListing();" required>
                           <!-- <option value="">Select Country</option> -->
                           <option value="AL" 
                              >
                              Albania                                            
                           </option>
                           <option value="DZ" 
                              >
                              Algeria                                            
                           </option>
                           <option value="AS" 
                              >
                              American Samoa                                            
                           </option>
                           <option value="AD" 
                              >
                              Andorra                                            
                           </option>
                           <option value="AO" 
                              >
                              Angola                                            
                           </option>
                           <option value="AI" 
                              >
                              Anguilla                                            
                           </option>
                           <option value="AQ" 
                              >
                              Antarctica                                            
                           </option>
                           <option value="AG" 
                              >
                              Antigua and Barbuda                                            
                           </option>
                           <option value="AR" 
                              >
                              Argentina                                            
                           </option>
                           <option value="AM" 
                              >
                              Armenia                                            
                           </option>
                           <option value="AW" 
                              >
                              Aruba                                            
                           </option>
                           <option value="AU" 
                              >
                              Australia                                            
                           </option>
                           <option value="AT" 
                              >
                              Austria                                            
                           </option>
                           <option value="AZ" 
                              >
                              Azerbaijan                                            
                           </option>
                           <option value="BS" 
                              >
                              Bahamas                                            
                           </option>
                           <option value="BH" 
                              >
                              Bahrain                                            
                           </option>
                           <option value="BD" 
                              >
                              Bangladesh                                            
                           </option>
                           <option value="BB" 
                              >
                              Barbados                                            
                           </option>
                           <option value="BY" 
                              >
                              Belarus                                            
                           </option>
                           <option value="BE" 
                              >
                              Belgium                                            
                           </option>
                           <option value="BZ" 
                              >
                              Belize                                            
                           </option>
                           <option value="BJ" 
                              >
                              Benin                                            
                           </option>
                           <option value="BM" 
                              >
                              Bermuda                                            
                           </option>
                           <option value="BT" 
                              >
                              Bhutan                                            
                           </option>
                           <option value="BO" 
                              >
                              Bolivia                                            
                           </option>
                           <option value="BA" 
                              >
                              Bosnia and Herzegowina                                            
                           </option>
                           <option value="BW" 
                              >
                              Botswana                                            
                           </option>
                           <option value="BV" 
                              >
                              Bouvet Island                                            
                           </option>
                           <option value="BR" 
                              >
                              Brazil                                            
                           </option>
                           <option value="IO" 
                              >
                              British Indian Ocean Territory                                            
                           </option>
                           <option value="BN" 
                              >
                              Brunei Darussalam                                            
                           </option>
                           <option value="BG" 
                              >
                              Bulgaria                                            
                           </option>
                           <option value="BF" 
                              >
                              Burkina Faso                                            
                           </option>
                           <option value="BI" 
                              >
                              Burundi                                            
                           </option>
                           <option value="KH" 
                              >
                              Cambodia                                            
                           </option>
                           <option value="CM" 
                              >
                              Cameroon                                            
                           </option>
                           <option value="CA" 
                              >
                              Canada                                            
                           </option>
                           <option value="CV" 
                              >
                              Cape Verde                                            
                           </option>
                           <option value="KY" 
                              >
                              Cayman Islands                                            
                           </option>
                           <option value="CF" 
                              >
                              Central African Republic                                            
                           </option>
                           <option value="TD" 
                              >
                              Chad                                            
                           </option>
                           <option value="CL" 
                              >
                              Chile                                            
                           </option>
                           <option value="CN" 
                              >
                              China                                            
                           </option>
                           <option value="CX" 
                              >
                              Christmas Island                                            
                           </option>
                           <option value="CC" 
                              >
                              Cocos (Keeling) Islands                                            
                           </option>
                           <option value="CO" 
                              >
                              Colombia                                            
                           </option>
                           <option value="KM" 
                              >
                              Comoros                                            
                           </option>
                           <option value="CG" 
                              >
                              Congo                                            
                           </option>
                           <option value="CK" 
                              >
                              Cook Islands                                            
                           </option>
                           <option value="CR" 
                              >
                              Costa Rica                                            
                           </option>
                           <option value="CI" 
                              >
                              Cote D'Ivoire                                            
                           </option>
                           <option value="HR" 
                              >
                              Croatia                                            
                           </option>
                           <option value="CU" 
                              >
                              Cuba                                            
                           </option>
                           <option value="CY" 
                              >
                              Cyprus                                            
                           </option>
                           <option value="CZ" 
                              >
                              Czech Republic                                            
                           </option>
                           <option value="DK" 
                              >
                              Denmark                                            
                           </option>
                           <option value="DJ" 
                              >
                              Djibouti                                            
                           </option>
                           <option value="DM" 
                              >
                              Dominica                                            
                           </option>
                           <option value="DO" 
                              >
                              Dominican Republic                                            
                           </option>
                           <option value="TP" 
                              >
                              East Timor                                            
                           </option>
                           <option value="EC" 
                              >
                              Ecuador                                            
                           </option>
                           <option value="EG" 
                              >
                              Egypt                                            
                           </option>
                           <option value="SV" 
                              >
                              El Salvador                                            
                           </option>
                           <option value="GQ" 
                              >
                              Equatorial Guinea                                            
                           </option>
                           <option value="ER" 
                              >
                              Eritrea                                            
                           </option>
                           <option value="EE" 
                              >
                              Estonia                                            
                           </option>
                           <option value="ET" 
                              >
                              Ethiopia                                            
                           </option>
                           <option value="FK" 
                              >
                              Falkland Islands (Malvinas)                                            
                           </option>
                           <option value="FO" 
                              >
                              Faroe Islands                                            
                           </option>
                           <option value="FJ" 
                              >
                              Fiji                                            
                           </option>
                           <option value="FI" 
                              >
                              Finland                                            
                           </option>
                           <option value="FR" 
                              >
                              France                                            
                           </option>
                           <option value="FX" 
                              >
                              France, Metropolitan                                            
                           </option>
                           <option value="GF" 
                              >
                              French Guiana                                            
                           </option>
                           <option value="PF" 
                              >
                              French Polynesia                                            
                           </option>
                           <option value="TF" 
                              >
                              French Southern Territories                                            
                           </option>
                           <option value="GA" 
                              >
                              Gabon                                            
                           </option>
                           <option value="GM" 
                              >
                              Gambia                                            
                           </option>
                           <option value="GE" 
                              >
                              Georgia                                            
                           </option>
                           <option value="DE" 
                              >
                              Germany                                            
                           </option>
                           <option value="GH" 
                              >
                              Ghana                                            
                           </option>
                           <option value="GI" 
                              >
                              Gibraltar                                            
                           </option>
                           <option value="GR" 
                              >
                              Greece                                            
                           </option>
                           <option value="GL" 
                              >
                              Greenland                                            
                           </option>
                           <option value="GD" 
                              >
                              Grenada                                            
                           </option>
                           <option value="GP" 
                              >
                              Guadeloupe                                            
                           </option>
                           <option value="GU" 
                              >
                              Guam                                            
                           </option>
                           <option value="GT" 
                              >
                              Guatemala                                            
                           </option>
                           <option value="GN" 
                              >
                              Guinea                                            
                           </option>
                           <option value="GW" 
                              >
                              Guinea-bissau                                            
                           </option>
                           <option value="GY" 
                              >
                              Guyana                                            
                           </option>
                           <option value="HT" 
                              >
                              Haiti                                            
                           </option>
                           <option value="HM" 
                              >
                              Heard and Mc Donald Islands                                            
                           </option>
                           <option value="HN" 
                              >
                              Honduras                                            
                           </option>
                           <option value="HK" 
                              >
                              Hong Kong                                            
                           </option>
                           <option value="HU" 
                              >
                              Hungary                                            
                           </option>
                           <option value="IS" 
                              >
                              Iceland                                            
                           </option>
                           <option value="IN" 
                              >
                              India                                            
                           </option>
                           <option value="ID" 
                              >
                              Indonesia                                            
                           </option>
                           <option value="IR" 
                              >
                              Iran (Islamic Republic of)                                            
                           </option>
                           <option value="IQ" 
                              >
                              Iraq                                            
                           </option>
                           <option value="IE" 
                              >
                              Ireland                                            
                           </option>
                           <option value="IL" 
                              >
                              Israel                                            
                           </option>
                           <option value="IT" 
                              >
                              Italy                                            
                           </option>
                           <option value="JM" 
                              >
                              Jamaica                                            
                           </option>
                           <option value="JP" 
                              >
                              Japan                                            
                           </option>
                           <option value="JO" 
                              >
                              Jordan                                            
                           </option>
                           <option value="KZ" 
                              >
                              Kazakhstan                                            
                           </option>
                           <option value="KE" 
                              >
                              Kenya                                            
                           </option>
                           <option value="KI" 
                              >
                              Kiribati                                            
                           </option>
                           <option value="KP" 
                              >
                              Korea, Democratic People's Republic of                                            
                           </option>
                           <option value="KR" 
                              >
                              Korea, Republic of                                            
                           </option>
                           <option value="KW" 
                              >
                              Kuwait                                            
                           </option>
                           <option value="KG" 
                              >
                              Kyrgyzstan                                            
                           </option>
                           <option value="LA" 
                              >
                              Lao People's Democratic Republic                                            
                           </option>
                           <option value="LB" 
                              >
                              Lebanon                                            
                           </option>
                           <option value="LS" 
                              >
                              Lesotho                                            
                           </option>
                           <option value="LR" 
                              >
                              Liberia                                            
                           </option>
                           <option value="LY" 
                              >
                              Libyan Arab Jamahiriya                                            
                           </option>
                           <option value="LI" 
                              >
                              Liechtenstein                                            
                           </option>
                           <option value="LT" 
                              >
                              Lithuania                                            
                           </option>
                           <option value="LU" 
                              >
                              Luxembourg                                            
                           </option>
                           <option value="MO" 
                              >
                              Macau                                            
                           </option>
                           <option value="MK" 
                              >
                              Macedonia, The Former Yugoslav Republic of                                            
                           </option>
                           <option value="MG" 
                              >
                              Madagascar                                            
                           </option>
                           <option value="MW" 
                              >
                              Malawi                                            
                           </option>
                           <option value="MY" 
                              >
                              Malaysia                                            
                           </option>
                           <option value="MV" 
                              >
                              Maldives                                            
                           </option>
                           <option value="ML" 
                              >
                              Mali                                            
                           </option>
                           <option value="MT" 
                              >
                              Malta                                            
                           </option>
                           <option value="MH" 
                              >
                              Marshall Islands                                            
                           </option>
                           <option value="MQ" 
                              >
                              Martinique                                            
                           </option>
                           <option value="MR" 
                              >
                              Mauritania                                            
                           </option>
                           <option value="MU" 
                              >
                              Mauritius                                            
                           </option>
                           <option value="YT" 
                              >
                              Mayotte                                            
                           </option>
                           <option value="MX" 
                              >
                              Mexico                                            
                           </option>
                           <option value="FM" 
                              >
                              Micronesia, Federated States of                                            
                           </option>
                           <option value="MD" 
                              >
                              Moldova, Republic of                                            
                           </option>
                           <option value="MC" 
                              >
                              Monaco                                            
                           </option>
                           <option value="MN" 
                              >
                              Mongolia                                            
                           </option>
                           <option value="MS" 
                              >
                              Montserrat                                            
                           </option>
                           <option value="MA" 
                              >
                              Morocco                                            
                           </option>
                           <option value="MZ" 
                              >
                              Mozambique                                            
                           </option>
                           <option value="MM" 
                              >
                              Myanmar                                            
                           </option>
                           <option value="NA" 
                              >
                              Namibia                                            
                           </option>
                           <option value="NR" 
                              >
                              Nauru                                            
                           </option>
                           <option value="NP" 
                              >
                              Nepal                                            
                           </option>
                           <option value="NL" 
                              >
                              Netherlands                                            
                           </option>
                           <option value="AN" 
                              >
                              Netherlands Antilles                                            
                           </option>
                           <option value="NC" 
                              >
                              New Caledonia                                            
                           </option>
                           <option value="NZ" 
                              >
                              New Zealand                                            
                           </option>
                           <option value="NI" 
                              >
                              Nicaragua                                            
                           </option>
                           <option value="NE" 
                              >
                              Niger                                            
                           </option>
                           <option value="NG" 
                              >
                              Nigeria                                            
                           </option>
                           <option value="NU" 
                              >
                              Niue                                            
                           </option>
                           <option value="NF" 
                              >
                              Norfolk Island                                            
                           </option>
                           <option value="MP" 
                              >
                              Northern Mariana Islands                                            
                           </option>
                           <option value="NO" 
                              >
                              Norway                                            
                           </option>
                           <option value="OM" 
                              >
                              Oman                                            
                           </option>
                           <option value="PK" 
                              >
                              Pakistan                                            
                           </option>
                           <option value="PW" 
                              >
                              Palau                                            
                           </option>
                           <option value="PA" 
                              >
                              Panama                                            
                           </option>
                           <option value="PG" 
                              >
                              Papua New Guinea                                            
                           </option>
                           <option value="PY" 
                              >
                              Paraguay                                            
                           </option>
                           <option value="PE" 
                              >
                              Peru                                            
                           </option>
                           <option value="PH" 
                              >
                              Philippines                                            
                           </option>
                           <option value="PN" 
                              >
                              Pitcairn                                            
                           </option>
                           <option value="PL" 
                              >
                              Poland                                            
                           </option>
                           <option value="PT" 
                              >
                              Portugal                                            
                           </option>
                           <option value="PR" 
                              >
                              Puerto Rico                                            
                           </option>
                           <option value="QA" 
                              >
                              Qatar                                            
                           </option>
                           <option value="RE" 
                              >
                              Reunion                                            
                           </option>
                           <option value="RO" 
                              >
                              Romania                                            
                           </option>
                           <option value="RU" 
                              >
                              Russian Federation                                            
                           </option>
                           <option value="RW" 
                              >
                              Rwanda                                            
                           </option>
                           <option value="KN" 
                              >
                              Saint Kitts and Nevis                                            
                           </option>
                           <option value="LC" 
                              >
                              Saint Lucia                                            
                           </option>
                           <option value="VC" 
                              >
                              Saint Vincent and the Grenadines                                            
                           </option>
                           <option value="WS" 
                              >
                              Samoa                                            
                           </option>
                           <option value="SM" 
                              >
                              San Marino                                            
                           </option>
                           <option value="ST" 
                              >
                              Sao Tome and Principe                                            
                           </option>
                           <option value="SA" 
                              >
                              Saudi Arabia                                            
                           </option>
                           <option value="SN" 
                              >
                              Senegal                                            
                           </option>
                           <option value="SC" 
                              >
                              Seychelles                                            
                           </option>
                           <option value="SL" 
                              >
                              Sierra Leone                                            
                           </option>
                           <option value="SG" 
                              >
                              Singapore                                            
                           </option>
                           <option value="SK" 
                              >
                              Slovakia (Slovak Republic)                                            
                           </option>
                           <option value="SI" 
                              >
                              Slovenia                                            
                           </option>
                           <option value="SB" 
                              >
                              Solomon Islands                                            
                           </option>
                           <option value="SO" 
                              >
                              Somalia                                            
                           </option>
                           <option value="ZA" 
                              >
                              South Africa                                            
                           </option>
                           <option value="GS" 
                              >
                              South Georgia and the South Sandwich Islands                                            
                           </option>
                           <option value="ES" 
                              >
                              Spain                                            
                           </option>
                           <option value="LK" 
                              >
                              Sri Lanka                                            
                           </option>
                           <option value="SH" 
                              >
                              St. Helena                                            
                           </option>
                           <option value="PM" 
                              >
                              St. Pierre and Miquelon                                            
                           </option>
                           <option value="SD" 
                              >
                              Sudan                                            
                           </option>
                           <option value="SR" 
                              >
                              Suriname                                            
                           </option>
                           <option value="SJ" 
                              >
                              Svalbard and Jan Mayen Islands                                            
                           </option>
                           <option value="SZ" 
                              >
                              Swaziland                                            
                           </option>
                           <option value="SE" 
                              >
                              Sweden                                            
                           </option>
                           <option value="CH" 
                              >
                              Switzerland                                            
                           </option>
                           <option value="SY" 
                              >
                              Syrian Arab Republic                                            
                           </option>
                           <option value="TW" 
                              >
                              Taiwan                                            
                           </option>
                           <option value="TJ" 
                              >
                              Tajikistan                                            
                           </option>
                           <option value="TZ" 
                              >
                              Tanzania, United Republic of                                            
                           </option>
                           <option value="TH" 
                              >
                              Thailand                                            
                           </option>
                           <option value="TG" 
                              >
                              Togo                                            
                           </option>
                           <option value="TK" 
                              >
                              Tokelau                                            
                           </option>
                           <option value="TO" 
                              >
                              Tonga                                            
                           </option>
                           <option value="TT" 
                              >
                              Trinidad and Tobago                                            
                           </option>
                           <option value="TN" 
                              >
                              Tunisia                                            
                           </option>
                           <option value="TR" 
                              >
                              Turkey                                            
                           </option>
                           <option value="TM" 
                              >
                              Turkmenistan                                            
                           </option>
                           <option value="TC" 
                              >
                              Turks and Caicos Islands                                            
                           </option>
                           <option value="TV" 
                              >
                              Tuvalu                                            
                           </option>
                           <option value="UG" 
                              >
                              Uganda                                            
                           </option>
                           <option value="UA" 
                              >
                              Ukraine                                            
                           </option>
                           <option value="AE" 
                              >
                              United Arab Emirates                                            
                           </option>
                           <option value="GB" 
                              >
                              United Kingdom                                            
                           </option>
                           <option value="US" 
                              selected >
                              United States                                            
                           </option>
                           <option value="UM" 
                              >
                              United States Minor Outlying Islands                                            
                           </option>
                           <option value="UY" 
                              >
                              Uruguay                                            
                           </option>
                           <option value="UZ" 
                              >
                              Uzbekistan                                            
                           </option>
                           <option value="VU" 
                              >
                              Vanuatu                                            
                           </option>
                           <option value="VA" 
                              >
                              Vatican City State (Holy See)                                            
                           </option>
                           <option value="VE" 
                              >
                              Venezuela                                            
                           </option>
                           <option value="VN" 
                              >
                              Viet Nam                                            
                           </option>
                           <option value="VG" 
                              >
                              Virgin Islands (British)                                            
                           </option>
                           <option value="VI" 
                              >
                              Virgin Islands (U.S.)                                            
                           </option>
                           <option value="WF" 
                              >
                              Wallis and Futuna Islands                                            
                           </option>
                           <option value="EH" 
                              >
                              Western Sahara                                            
                           </option>
                           <option value="YE" 
                              >
                              Yemen                                            
                           </option>
                           <option value="YU" 
                              >
                              Yugoslavia                                            
                           </option>
                           <option value="ZR" 
                              >
                              Zaire                                            
                           </option>
                           <option value="ZM" 
                              >
                              Zambia                                            
                           </option>
                           <option value="ZW" 
                              >
                              Zimbabwe                                            
                           </option>
                           <option value="AF" 
                              >
                              Afghanistan                                            
                           </option>
                           <option value="BO" 
                              >
                              Bonaire                                            
                           </option>
                           <option value="05" 
                              >
                              brasil                                            
                           </option>
                           <option value="12" 
                              >
                              as                                            
                           </option>
                           <option value="+1" 
                              >
                              USA                                            
                           </option>
                        </select>
                     </span>
                     <span class="col6">
                     <input type="text" class="form-control add-book-input" name="vPhoneCode" id="vPhoneCode" value="*****1" readonly />
                     </span>
                     <span class="col2">
                     <input type="text" pattern="[0-9]{1,}" title="Enter Mobile Number." class="form-control add-book-input" name="vPhone"  id="vPhone" value="" placeholder="Enter Phone Number" onKeyUp="return isNumberKey(event)"  onblur="return isNumberKey(event)"  required  />
                     </span> 
                     <span class="col3">
                     <input type="text" class="form-control first-name1" name="vName"  id="vName" value="" placeholder="First Name" required />
                     <input type="text" class="form-control last-name1" name="vLastName"  id="vLastName" value="" placeholder="Last Name" required />
                     </span> 
                     <span class="col4" style="margin: 0px;">
                        <input type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" class="form-control" name="vEmail" id="vEmail" value="" placeholder="Email" required >
                        <div id="emailCheck"></div>
                     </span>
                  </div>
               </div>
               <div class="form-group">
               </div>
               <div class="map-main-page-inner">
                  <div class="map-main-page-inner-tab">
                     <div class="col-lg-12 map-live-hs-mid">
                     </div>
                     <div class="col-lg-12 map-live-hs-mid">
                        <span class="col5">
                        <input type="text" class="ride-location1 highalert txt_active form-control first-name1" name="vSourceAddresss"  id="from" value="" placeholder="Pick up location" required onpaste="checkrestrictionfrom('from');">
                        <input type="text" class="ride-location1 highalert txt_active form-control last-name1" name="tDestAddress"  id="to" value="" placeholder="Drop Off Location" required onpaste="checkrestrictionto('to');">
                        </span>
                        <span>
                        <input type="text" class="form-control form-control14" name="dBooking_date"  id="datetimepicker4" value="" placeholder="Select Date / Time" onBlur="getFarevalues('');" required>
                        </span>
                        <span>
                           <select class="form-control form-control-select form-control14" name='iVehicleTypeId' id="iVehicleTypeId" required onChange="showAsVehicleType(this.value)">
                              <option value="" >Select Vehicle Type</option>
                           </select>
                        </span>
                        <div id="ride-type" style="display:block;">
                           <span class="auto_assign001">
                              <input type="checkbox" name="eFemaleDriverRequest" id="eFemaleDriverRequest" value="Yes" >
                              <p>Ladies Only Ride?</p>
                           </span>
                           <span class="auto_assign001">
                              <input type="checkbox" name="eHandiCapAccessibility" id="eHandiCapAccessibility" value="Yes" >
                              <p>Prefer Handicap Accessibility?</p>
                           </span>
                           <span class="auto_assign001">
                              <input type="checkbox" name="eChildSeatAvailable" id="eChildSeatAvailable" value="Yes" >
                              <p>Child Seat available?</p>
                           </span>
                        </div>
                        <span class="auto_assign001">
                           <input type="checkbox" name="eAutoAssign" id="eAutoAssign" value="Yes" >
                           <p>Auto Assign Driver</p>
                        </span>
                        <span class="auto_assignOr">
                           <h3>OR</h3>
                        </span>
                        <span id="showdriverSet001" style="display:none;">
                           <p class="margin-right5">Assigned Driver: </p>
                           <p id="driverSet001"></p>
                        </span>
                     </div>
                     <span class="add-booking1">
                     <input name="" type="text" placeholder="Type driver name to search from below list" id="name_keyWord" onKeyUp="get_drivers_list(this.value)">
                     </span>
                     <ul id="driver_main_list" style="">
                        <div class="" id="imageIcons" style="width:100%;">
                           <div align="center">                                                                       
                              <img src="default.gif">                                                              
                              <span>Retrieving Driver list.Please Wait...</span>                       
                           </div>
                        </div>
                     </ul>
                     <input type="text" name="iDriverId" id="iDriverId" value="" required   class="form-control height-1" >
                  </div>
                  <div class="map-page">
                     <div class="panel-heading location-map" style="background:none;">
                        <div class="google-map-wrap">
                           <div class="map-color-code">
                              <div>
                                 <label style="width: 20%;">Select Driver Availability </label>
                                 <span class="select-map-availability">
                                    <select onChange="setNewDriverLocations(this.value)" id="newSelect02">
                                       <option value='' data-id="">All</option>
                                       <option value="Available" data-id="img/green-icon.png">Available</option>
                                       <option value="Active" data-id="img/red.png">Enroute to Pickup</option>
                                       <option value="Arrived" data-id="img/blue.png">Reached Pickup</option>
                                       <option value="On Going Trip" data-id="img/yellow.png">Journey Started</option>
                                       <option value="Not Available" data-id="img/offline-icon.png">Offline</option>
                                    </select>
                                 </span>
                              </div>
                              <div style="margin-top: 15px;">
                                 <label style="width: 20%;">Map Zoom Level</label>
                                 <span>
                                    <select class="form-control form-control-select form-control14" name='radius-id' id="radius-id" onChange="play(this.value)" style="width: 40%;display: inline-block;">
                                       <option value=""> Select Radius </option>
                                       <option value="5">5Miles Radius</option>
                                       <option value="10">10Miles Radius</option>
                                       <option value="20">20Miles Radius</option>
                                       <option value="30">30Miles Radius</option>
                                    </select>
                                 </span>
                              </div>
                           </div>
                           <div id="map-canvas" class="google-map" style="width:100%; height:500px;"></div>
                        </div>
                     </div>
                  </div>
                  <div class="total-price total-price1" >
                     <b>Fare Estimation</b>
                     <hr>
                     <ul>
                        <li id="MinFare">
                           <b>Minimum Fare</b> :
                           $                                            <em id="minimum_fare_price">0</em>
                        </li>
                        <li id="BaseFare">
                           <b>Base Fare</b> :
                           $                                            <em id="base_fare_price">0</em>
                        </li>
                        <li id="FixFare" style="display:none">
                           <b>Fix Fare</b> :
                           $                                            <em id="fix_fare_price">0</em>
                        </li>
                        <li id="DistanceFare">
                           <b>Distance (<em id="dist_fare">0</em> <em id="change_eUnit">Miles</em>)</b> :
                           $                                            <em id="dist_fare_price">0</em>
                        </li>
                        <li id="TimeFare">
                           <b>Time (<em id="time_fare">0</em> Minutes)</b> :
                           $                                            <em id="time_fare_price">0</em>
                        </li>
                        <li id="fare_normal" style="display:none">
                           <b>Normal Fare</b> : $ 
                           <em id="normal_fare_price">0</em>
                        </li>
                        <li id="fare_surge" style="display:none">
                           <b> Surcharge Difference (<em id="fare_surge_price">0</em> X)</b>
                           : $ <em id="surge_fare_diff">0</em>
                        </li>
                        <li id="toll_price" style="display:none">
                           <b> Toll Cost</b>
                           : $ <em id="toll_price_val"></em>
                        </li>
                     </ul>
                     <span>Total Fare<b>
                     $                                            <em id="total_fare_price">0</em></b></span> 
                  </div>
                  <!-- popup -->
                  <div class="map-popup" style="display:none" id="driver_popup"></div>
                  <!-- popup end -->
               </div>
               <input type="hidden" name="newType" id="newType" value="">
               <input type="hidden" name="submitbtn" id="submitbtn">
               <div style="clear:both;"></div>
               <div class="book-now-reset add-booking-button"><span>
                  <input type="submit" class="save btn-info button-submit" name="submitbutton" id="submitbutton" value="Book Now">
                  <input type="reset" class="save btn-info button-submit" name="reset" id="reset12" value="Reset" >
                  </span>
               </div>
            </form>
            <div class="admin-notes">
               <h4>Notes:</h4>
               <ul>
                  <li>
                     Administrator can Add / Edit Ride later booking on this page.
                  </li>
                  <li>
                     Driver current availability is not connected with booking being made. Please confirm future avaialbility of Driver before doing booking.
                  </li>
                  <li>Adding booking from here will not send request to Driver immediately.</li>
                  <li>In case of "Auto Assign Driver" option selected, Driver(s) get automatic request before 8-12 minutes of actual booking time.</li>
                  <li>In case of "Auto Assign Driver" option not selected, Driver(s) get booking confirmation sms as well as reminder sms before 30 minutes of actual booking. Driver has to start the scheduled Trip by going to "Your Trip" >> Upcoming section from Driver App.</li>
                  <li>In case of "Auto Assign Driver", the competitive algorithm will be followed instead of one you have selected in settings.</li>
               </ul>
            </div>
         </div>
         <!--END PAGE CONTENT -->
      </div>
      <!-- FOOTER -->
      <script>
         var _system_script = 'booking';
      </script>
      <script type="text/javascript" src="http://cubetaxishark.bbcsproducts.com/admin/js/validation/jquery.validate.min.js" ></script>
      <script type="text/javascript" src="http://cubetaxishark.bbcsproducts.com/admin/js/validation/additional-methods.min.js" ></script>
      <script type="text/javascript" src="http://cubetaxishark.bbcsproducts.com/admin/js/form-validation.js" ></script>
      <div style="clear:both;"></div>
      <div id="footer">
         © CubeTaxiShark - 2019
      </div>
      <div style="clear:both;"></div>
      <!--Wallet Low Balance-->
      <div class="modal fade" id="usermodel" tabindex="-1" role="dialog" aria-labelledby="usermodel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <input type="hidden" name="iDriverId_temp" id="iDriverId_temp">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                  <h4 class="modal-title" id="inactiveModalLabel">Low Wallet Balance </h4>
               </div>
               <div class="modal-body">
                  <p><span style="font-size: 15px;"> This Driver is having low balance in his wallet and is not able to accept cash ride. Would you still like to assign this Driver?</span></p>
                  <p><b style="font-size: 15px;"> Minimum Required Balance : </b><span style="font-size: 15px;">$ 10.00</span></p>
                  <p><b style="font-size: 15px;"> Available Balance : </b><span style="font-size: 15px;">$ <span id="usr-bal"></span></span></p>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button> 
                  <button type="button" class="btn btn-success btn-ok action_modal_submit" data-dismiss="modal" onClick="AssignDriver('');">OK</button>
               </div>
            </div>
         </div>
      </div>
      <!--end Wallet Low Balance-->
      <!--user inactive/deleted-->
      <div class="modal fade" id="inactiveModal" tabindex="-1" role="dialog" aria-labelledby="inactiveModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                  <h4 class="modal-title" id="inactiveModalLabel">User Detail</h4>
               </div>
               <div class="modal-body">
                  <span style="font-size: 15px;"> User is inactive/deleted. Do you want to book a ride with user?</span>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal">Continue</button>
                  <!-- <button type="button" class="btn btn-primary">Continue</button> -->
               </div>
            </div>
         </div>
      </div>
      <!--end user inactive/deleted-->
      <!--surcharge confirmation-->
      <div class="modal fade" id="surgemodel" tabindex="-1" role="dialog" aria-labelledby="surgemodel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                  <h4 class="modal-title" id="inactiveModalLabel">Confirm Surcharge</h4>
               </div>
               <div class="modal-body">
                  <p><span style="font-size: 15px;"> This trip is comes under the surcharge timing.surcharge will be applied as per below.</span></p>
                  <table style="font-size: 15px;" cellspacing="5" cellpadding="5">
                     <tr>
                        <td width="100px"> <b>Surge Type </b></td>
                        <td> : <span id="surge_type"></span> Surcharge</td>
                     </tr>
                     <tr>
                        <td><b>Surge Factor</b></td>
                        <td> : <span id="surge_factor"></span> X</td>
                     </tr>
                     <tr>
                        <td><b>Surge Timing</b></td>
                        <td> : <span id="surge_timing"></span></td>
                     </tr>
                  </table>
               </div>
               <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button> -->
                  <button type="button" class="btn btn-success btn-ok action_modal_submit" data-dismiss="modal" onClick="">OK</button>
               </div>
            </div>
         </div>
      </div>
      <!--end surcharge confirmation-->
      <link rel="stylesheet" type="text/css" media="screen" href="http://cubetaxishark.bbcsproducts.com/admin/css/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
      <script type="text/javascript" src="http://cubetaxishark.bbcsproducts.com/admin/js/moment.min.js"></script>
      <script type="text/javascript" src="http://cubetaxishark.bbcsproducts.com/admin/js/bootstrap-datetimepicker.min.js"></script>
      <script type="text/javascript" src="http://cubetaxishark.bbcsproducts.com/admin/js/plugins/select2.min.js"></script>
      <script>
         var eType = "";
         var APP_DELIVERY_MODE = 'Multi';
         var ENABLE_TOLL_COST = "Yes";
         // alert(APP_DELIVERY_MODE);
         switch ("Ride") {
             case "Ride-Delivery":
                 if (APP_DELIVERY_MODE == "Multi") {
                     eType = 'Ride';
                 } else {
                     eType = $('input[name=eType]:checked').val();
                 }
                 break;
             case "Ride-Delivery-UberX":
                 if (APP_DELIVERY_MODE == "Multi") {
                     eType = 'Ride';
                 } else {
                     eType = $('input[name=eType]:checked').val();
                 }
                 break;
             case "Delivery":
                 eType = 'Deliver';
                 break;
         
             case "UberX":
                 eType = 'UberX';
                 break;
         
             default:
                 eType = 'Ride';
         }
         
         
         function show_type(etype) {
             //alert(etype);
             if (etype == 'Ride') {
                 $('#ride-delivery-type').hide();
                 $('#ride-type').show();
                 $('.auto_assign001').show();
                 $('#iPackageTypeId').removeAttr('required');
                 $('#vReceiverMobile').removeAttr('required');
                 $('#vReceiverName').removeAttr('required');
                 $('#to').show();
                 $('.total-price1').show();
             } else if (etype == 'Deliver') {
                 $('#ride-delivery-type').show();
                 $('#ride-type').hide();
                 $('.auto_assign001').show();
                 $('#iPackageTypeId').attr('required', 'required');
                 $('#vReceiverMobile').attr('required', 'required');
                 $('#vReceiverName').attr('required', 'required');
                 $('#to').show();
                 $('.total-price1').show();
             } else if (etype == 'UberX') {
                 $('#ride-delivery-type').hide();
                 $('#to').hide();
                 $('#ride-type').hide();
                 $('.auto_assign001').hide();
                 $('#iPackageTypeId').removeAttr('required');
                 $('#to').removeAttr('required');
                 $('#vReceiverMobile').removeAttr('required');
                 $('#vReceiverName').removeAttr('required');
                 $('#to').removeAttr('required');
                 $('.total-price1').hide();
             }
         }
         
         // $("#surgemodel").modal('show');
         function formatData(state) {
             if (!state.id) {
                 return state.text;
             }
             var optimage = $(state.element).data('id');
             if (!optimage) {
                 return state.text;
             } else {
                 var $state = $(
                         '<span class="userName"><img src="' + optimage + '" class="mpLocPic" /> ' + $(state.element).text() + '</span>'
                         );
                 return $state;
             }
         }
         
         $("#newSelect02").select2({
             templateResult: formatData,
             templateSelection: formatData
         });
         var eFlatTrip = 'No';
         var eTypeQ11 = 'yes';
         var map;
         var geocoder;
         var circle;
         var markers = [];
         var driverMarkers = [];
         var bounds = [];
         var newLocations = "";
         var autocomplete_from;
         var autocomplete_to;
         var eLadiesRide = 'No';
         var eHandicaps = 'No';
         var eChildSeat = 'No';
         var eWheelChair = 'No';
         var geocoder = new google.maps.Geocoder();
         var directionsService = new google.maps.DirectionsService(); // For Route Services on map
         var directionsOptions = {// For Polyline Route line options on map
             polylineOptions: {
                 strokeColor: '#FF7E00',
                 strokeWeight: 5
             }
         };
         var directionsDisplay = new google.maps.DirectionsRenderer(directionsOptions);
         var showsurgemodal = "Yes";
         
         function setDriverListing(iVehicleTypeId) {
             dBooking_date = $("#datetimepicker4").val();
             vCountry = $("#vCountry").val();
             keyword = $("#name_keyWord").val();
             eLadiesRide = 'No';
             eHandicaps = 'No';
             eChildSeat = 'No';
             eWheelChair = 'No';
             if ($("#eFemaleDriverRequest").is(":checked")) {
                 eLadiesRide = 'Yes';
             }
             if ($("#eHandiCapAccessibility").is(":checked")) {
                 eHandicaps = 'Yes';
             }
             if ($("#eChildSeatAvailable").is(":checked")) {
                 eChildSeat = 'Yes';
             }
             if ($("#eWheelChairAvailable").is(":checked")) {
                 eWheelChair = 'Yes';
             }
             // alert(eLadiesRide);
             $.ajax({
                 type: "POST",
                 url: "get_available_driver_list.php",
                 dataType: "html",
                 data: {vCountry: vCountry, type: '', iVehicleTypeId: iVehicleTypeId, keyword: keyword, eLadiesRide: eLadiesRide, eHandicaps: eHandicaps, eChildSeat: eChildSeat, eWheelChair: eWheelChair, dBooking_date: dBooking_date, AppeType: eType},
                 success: function (dataHtml2) {
                     if (dataHtml2 != "") {
                         $('#driver_main_list').show();
                         $('#driver_main_list').html(dataHtml2);
                         if ($("#eAutoAssign").is(':checked')) {
                             $(".assign-driverbtn").attr('disabled', 'disabled');
                         }
                     } else {
                         $('#driver_main_list').html('<h4 style="margin:25px 0 0 15px">Sorry , No Driver Found.</h4>');
                         $('#driver_main_list').show();
                     }
                 }, error: function (dataHtml2) {
         
                 }
             });
         }
         
         function AssignDriver(driverId) {
             if ($("#iVehicleTypeId").val() != '') {
                 if (driverId == "") {
                     driverId = $('#iDriverId_temp').val();
                 }
                 $('#iDriverId').val(driverId);
                 $("#showdriverSet001").show();
                 $("#driverSet001").html($('.driver_' + driverId).html());
             } else {
                 alert('Please Select Vehicle Type.');
                 return false;
             }
         }
         
         function checkUserBalance(driverId) {
             $.ajax({
                 type: "POST",
                 url: "ajax_get_user_balance.php",
                 data: "driverId=" + driverId + "&type=Driver",
                 success: function (data) {
                     data1 = data.split("|");
                     var CDE = 'No';
                     var Min_Bal = '10';
                     // alert(CDE);
         
                     if (CDE == "Yes") {
                         if (parseFloat(data1[1]) < parseFloat(Min_Bal)) {
                             var amt = parseFloat(data1[1]).toFixed(2);
                             $("#usr-bal").text(amt);
                             $("#iDriverId_temp").val(driverId);
                             $("#usermodel").modal('show');
                             return false;
                         } else {
                             AssignDriver(driverId);
                             return false;
                         }
                     } else {
                         AssignDriver(driverId);
                         return false;
                     }
                 }, error: function (dataHtml2) {
         
                 }
             });
         }
         
         function setDriversMarkers(flag) {
             newType = $("#newType").val();
             vType = $("#iVehicleTypeId").val();
             eLadiesRide = "No";
             eHandicaps = "No";
             eChildSeat = "No";
             eWheelChair = "No";
             if ($("#eFemaleDriverRequest").is(":checked")) {
                 eLadiesRide = 'Yes';
             }
             if ($("#eHandiCapAccessibility").is(":checked")) {
                 eHandicaps = 'Yes';
             }
             if ($("#eChildSeatAvailable").is(":checked")) {
                 eChildSeat = 'Yes';
             }
             if ($("#eWheelChairAvailable").is(":checked")) {
                 eWheelChair = 'Yes';
             }
         
             $.ajax({
                 type: "POST",
                 url: "get_map_drivers_list.php",
                 dataType: "json",
                 data: {type: newType, iVehicleTypeId: vType, eLadiesRide: eLadiesRide, eHandicaps: eHandicaps, eChildSeat: eChildSeat, eWheelChair: eWheelChair},
                 success: function (dataHtml) {
                     for (var i = 0; i < driverMarkers.length; i++) {
                         driverMarkers[i].setMap(null);
                     }
                     newLocations = dataHtml.locations;
                     var infowindow = new google.maps.InfoWindow();
                     for (var i = 0; i < newLocations.length; i++) {
                         if (newType == newLocations[i].location_type || newType == "") {
                             var str33 = newLocations[i].location_carType;
                             if (vType == "" || (str33 != null && str33.indexOf(vType) != -1)) {
                                 newName = newLocations[i].location_name;
                                 newOnlineSt = newLocations[i].location_online_status;
                                 newLat = newLocations[i].google_map.lat;
                                 newLong = newLocations[i].google_map.lng;
                                 newDriverImg = newLocations[i].location_image;
                                 newMobile = newLocations[i].location_mobile;
                                 newDriverID = newLocations[i].location_ID;
                                 newImg = newLocations[i].location_icon;
                                 driverId = newLocations[i].location_driverId;
                                 latlng = new google.maps.LatLng(newLat, newLong);
                                 // bounds.push(latlng);
                                 // alert(newImg);
                                 content = '<table><tr><td rowspan="4"><img src="' + newDriverImg + '" height="60" width="60"></td></tr><tr><td>&nbsp;&nbsp;Email: </td><td><b>' + newDriverID + '</b></td></tr><tr><td>&nbsp;&nbsp;Mobile: </td><td><b>+' + newMobile + '</b></td></tr></table>';
         
                                 var drivermarker = new google.maps.Marker({
                                     map: map,
                                     //animation: google.maps.Animation.DROP,
                                     position: latlng,
                                     icon: newImg
                                 });
                                 google.maps.event.addListener(drivermarker, 'click', (function (drivermarker, content, infowindow) {
                                     return function () {
                                         infowindow.setContent(content);
                                         infowindow.open(map, drivermarker);
                                     };
                                 })(drivermarker, content, infowindow));
                                 // alert(content);
                                 driverMarkers.push(drivermarker);
                             }
                         }
                     }
                     //var markers = [];//some array
                     if (flag != 'test') {
                         var bounds = new google.maps.LatLngBounds();
                         for (var i = 0; i < driverMarkers.length; i++) {
                             bounds.extend(driverMarkers[i].getPosition());
                         }
                         //console.log(bounds);
                         map.fitBounds(bounds);
                         map.setZoom(13);
                     }
                     setDriverListing(vType);
                 },
                 error: function (dataHtml) {
         
                 }
             });
         }
         
         function initialize() {
             var thePoint = new google.maps.LatLng('20.1849963', '64.4125062');
             var mapOptions = {
                 zoom: 4,
                 center: thePoint
             };
             map = new google.maps.Map(document.getElementById('map-canvas'),
                     mapOptions);
         
             circle = new google.maps.Circle({radius: 25, center: thePoint});
             // map.fitBounds(circle.getBounds()); 
             if (eType == "Deliver") {
                 show_type(eType);
             }
             showVehicleCountryVise('US', '', eType);
             //setDriversMarkers('test');
             //alert('test');
         }
         
         $(document).ready(function () {
             google.maps.event.addDomListener(window, 'load', initialize);
             setDriversMarkers('test');
             $("#eType").val(eType);
             $('input[type=radio][name=eType]').change(function () {
                 eType = $('input[name=eType]:checked').val();
             });
         });
         
         function play(radius) {
             // return Math.round(14-Math.log(radius)/Math.LN2);
             var pt = new google.maps.LatLng($("#from_lat").val(), $("#from_long").val());
             map.setCenter(pt);
             var newRadius = Math.round(24 - Math.log(radius) / Math.LN2);
             newRadius = newRadius - 9;
             map.setZoom(newRadius);
         }
         function getAddress(mDlatitude, mDlongitude, addId) {
             var mylatlang = new google.maps.LatLng(mDlatitude, mDlongitude);
             geocoder.geocode({'latLng': mylatlang},
                     function (results, status) {
                         // console.log(results);
                         if (status == google.maps.GeocoderStatus.OK) {
                             if (results[0]) {
                                 // document.getElementById(addId).value = results[0].formatted_address;
                                 $('#' + addId).val(results[0].formatted_address);
                             } else {
                                 document.getElementById('#' + addId).value = "No results";
                             }
                         } else {
                             document.getElementById('#' + addId).value = status;
                         }
                     });
         }
         
         function DeleteMarkers(newId) {
             // Loop through all the markers and remove
             for (var i = 0; i < markers.length; i++) {
                 if (newId != '') {
                     if (markers[i].id == newId) {
                         markers[i].setMap(null);
                     }
                 } else {
                     markers[i].setMap(null);
                 }
             }
             if (newId == '') {
                 markers = [];
             }
         }
         function setMarker(postitions, valIcon) {
             var newIcon;
             if (valIcon == 'from_loc') {
                 if (eType == 'UberX') {
                     newIcon = 'http://cubetaxishark.bbcsproducts.com/webimages/upload/mapmarker/PinFrom.png';
                 } else {
                     newIcon = 'http://cubetaxishark.bbcsproducts.com/webimages/upload/mapmarker/PinFrom.png';
                 }
             } else if (valIcon == 'to_loc') {
                 newIcon = 'http://cubetaxishark.bbcsproducts.com/webimages/upload/mapmarker/PinTo.png';
             } else {
                 newIcon = 'http://cubetaxishark.bbcsproducts.com/webimages/upload/mapmarker/PinTo.png';
             }
             var marker = new google.maps.Marker({
                 map: map,
                 draggable: true,
                 animation: google.maps.Animation.DROP,
                 position: postitions,
                 icon: newIcon
             });
             marker.id = valIcon;
             markers.push(marker);
             map.setCenter(marker.getPosition());
             map.setZoom(15);
         
             if (valIcon == "from_loc") {
                 marker.addListener('dragend', function (event) {
                     // console.log(event);
                     var lat = event.latLng.lat();
                     var lng = event.latLng.lng();
                     var myLatlongs = new google.maps.LatLng(lat, lng);
                     showsurgemodal = "No";
         
                     $("#from_lat").val(lat);
                     $("#from_long").val(lng);
                     $("#from_lat_long").val(myLatlongs);
                     getAddress(lat, lng, 'from');
                     routeDirections();
                 });
             }
             if (valIcon == 'to_loc') {
                 marker.addListener('dragend', function (event) {
                     var lat = event.latLng.lat();
                     var lng = event.latLng.lng();
                     var myLatlongs1 = new google.maps.LatLng(lat, lng);
                     showsurgemodal = "No";
         
                     $("#to_lat").val(lat);
                     $("#to_long").val(lng);
                     $("#to_lat_long").val(myLatlongs1);
                     getAddress(lat, lng, 'to');
                     routeDirections();
                 });
             }
             routeDirections();
         }
         
         function routeDirections() {
             directionsDisplay.setMap(null); // Remove Previous Route.
         
             if (($("#from").val() != "" && $("#from_lat_long").val() != "") && ($("#to").val() != "" && $("#to_lat_long").val() != "")) {
                 var newFrom = $("#from_lat").val() + ", " + $("#from_long").val();
                 if (eType == 'UberX') {
                     var newTo = $("#from_lat").val() + ", " + $("#from_long").val();
                 } else {
                     var newTo = $("#to_lat").val() + ", " + $("#to_long").val();
                 }
         
                 //Make an object for setting route
                 var request = {
                     origin: newFrom, // From locations latlongs
                     destination: newTo, // To locations latlongs
                     travelMode: google.maps.TravelMode.DRIVING // Set the Path of Driving
                 };
         
                 //Draw route from the object
                 directionsService.route(request, function (response, status) {
                     if (status == google.maps.DirectionsStatus.OK) {
                         // Check for allowed and disallowed.
                         var response1 = JSON.stringify(response);
                         /*$.ajax({
                          type: "POST",
                          url: 'checkForRestriction.php',
                          dataType: 'html',
                          data: {fromLat: $("#from_lat").val(),fromLong: $("#from_long").val(),toLat: $("#to_lat").val(),toLong: $("#to_long").val(),type:'both'},
                          success: function(dataHtml5)
                          {
                          if(dataHtml5 != ''){
                          alert(dataHtml5);
                          }
                          },
                          error: function(dataHtml5)
                          {
                          }
                          });*/
         
                         // console.log(response);
                         directionsDisplay.setMap(map);
                         directionsDisplay.setOptions({suppressMarkers: true}); //, preserveViewport: true, suppressMarkers: false for setting auto markers from google api
                         directionsDisplay.setDirections(response); // Set route
                         var route = response.routes[0];
                         for (var i = 0; i < route.legs.length; i++) {
                             $("#distance").val(route.legs[i].distance.value);
                             $("#duration").val(route.legs[i].duration.value);
                         }
         
                         var dist_fare = parseFloat($("#distance").val(), 10) / parseFloat(1000, 10);
                         // alert(dist_fare);
                         if ($("#eUnit").val() != 'KMs') {
                             dist_fare = dist_fare * 0.621371;
                         }
                         // alert(dist_fare);
                         $('#dist_fare').text(dist_fare.toFixed(2));
                         var time_fare = parseFloat($("#duration").val(), 10) / parseFloat(60, 10);
                         $('#time_fare').text(time_fare.toFixed(2));
                         var vehicleId = $('#iVehicleTypeId').val();
                         var booking_date = $('#datetimepicker4').val();
                         var vCountry = $('#vCountry').val();
                         var tollcostval = $('#fTollPrice').val();
         
                         $.ajax({
                             type: "POST",
                             url: 'ajax_estimate_by_vehicle_type.php',
                             dataType: 'json',
                             data: {'vehicleId': vehicleId, 'booking_date': booking_date, 'vCountry': vCountry, 'FromLatLong': newFrom, 'ToLatLong': newTo},
                             success: function (dataHtml)
                             {
                                 if (dataHtml != "") {
                                     // var result = dataHtml.split(':');
                                     var iBaseFare = parseFloat(dataHtml.iBaseFare).toFixed(2);
                                     var fPricePerKM = parseFloat(dataHtml.fPricePerKM).toFixed(2);
                                     var fPricePerMin = parseFloat(dataHtml.fPricePerMin).toFixed(2);
                                     var iMinFare = parseFloat(dataHtml.iMinFare).toFixed(2);
                                     var fPickUpPrice = parseFloat(dataHtml.fPickUpPrice).toFixed(2);
                                     var fNightPrice = parseFloat(dataHtml.fNightPrice).toFixed(2);
                                     var fSurgePrice = parseFloat(dataHtml.fSurgePrice).toFixed(2);
                                     var SurgeType = dataHtml.SurgeType;
                                     var Time = dataHtml.Time;
                                     eFlatTrip = dataHtml.eFlatTrip;
                                     var fFlatTripPrice = dataHtml.fFlatTripPrice;
         
                                     if (eFlatTrip == 'Yes') {
                                         fFlatTripPrice = parseFloat(fFlatTripPrice).toFixed(2);
                                         $('#fix_fare_price').text(fFlatTripPrice);
                                         fPricePerMin = 0;
                                         fPricePerKM = 0;
                                         iMinFare = 0;
                                         $('#eFlatTrip').val(eFlatTrip);
                                         $('#fFlatTripPrice').val(fFlatTripPrice);
                                         $("#FixFare").show();
                                         $("#BaseFare").hide();
                                         $("#MinFare").hide();
                                         $("#DistanceFare").hide();
                                         $("#TimeFare").hide();
                                         $("#toll_price").hide();
                                     } else {
                                         $('#eFlatTrip').val(eFlatTrip);
                                         $("#FixFare").hide();
                                         $("#BaseFare").show();
                                         $("#MinFare").show();
                                         $("#DistanceFare").show();
                                         $("#TimeFare").show();
                                     }
                                     var increased = parseInt($('#fTollPrice').val());
                                     if (isNaN(increased) || increased <= 0) {
                                         $("#vTollPriceCurrencyCode").val('');
                                         $("#fTollPrice").val('0');
                                         $("#eTollSkipped").val('No');
                                     }
         
                                     $('#minimum_fare_price').text(iMinFare);
                                     $('#base_fare_price').text(iBaseFare);
                                     $('#dist_fare_price').text(parseFloat(fPricePerKM * $('#dist_fare').text()).toFixed(2));
                                     /* var eunit = $("#eUnit").val();
                                      if(eunit == "Miles"){
                                      $('#dist_fare_price').text(parseFloat((fPricePerKM*($('#dist_fare').text()*1.6))).toFixed(2));
                                      } */
                                     $('#time_fare_price').text(parseFloat(fPricePerMin * $('#time_fare').text()).toFixed(2));
         
                                     /*                                          if($('#eTollSkipped').val() == 'No' && eFlatTrip != 'Yes'  && eType != 'UberX'){
                                      $("#toll_price").show();
                                      } else {
                                      $("#toll_price").hide();
                                      }*/
                                     if (ENABLE_TOLL_COST == 'Yes') {
                                         if ($('#fTollPrice').val() > 0 && $('#eTollSkipped').val() == 'No' && eFlatTrip != 'Yes' && eType != 'UberX') {
                                             $("#toll_price").show();
                                             $('#toll_price_val').text(tollcostval);
                                         } else {
                                             $("#toll_price").hide();
                                         }
                                     }
         
                                     if (eFlatTrip == 'Yes') {
                                         var totalPrice = (parseFloat($('#fix_fare_price').text()) + parseFloat($('#dist_fare_price').text()) + parseFloat($('#time_fare_price').text())).toFixed(2);
                                     } else {
                                         if (ENABLE_TOLL_COST == 'Yes') {
                                             if ($('#fTollPrice').val() > 0 && $('#eTollSkipped').val() == 'No' && eFlatTrip != 'Yes' && eType != 'UberX') {
                                                 var totalPrice = (parseFloat($('#base_fare_price').text()) + parseFloat($('#dist_fare_price').text()) + parseFloat(tollcostval) + parseFloat($('#time_fare_price').text())).toFixed(2);
                                             } else {
                                                 var totalPrice = (parseFloat($('#base_fare_price').text()) + parseFloat($('#dist_fare_price').text()) + parseFloat($('#time_fare_price').text())).toFixed(2);
                                             }
                                         } else {
                                             var totalPrice = (parseFloat($('#base_fare_price').text()) + parseFloat($('#dist_fare_price').text()) + parseFloat($('#time_fare_price').text())).toFixed(2);
                                         }
                                     }
         
                                     if (fSurgePrice > 1) {
                                         if ($('#fTollPrice').val() > 0 && $('#eTollSkipped').val() == 'No' && eFlatTrip != 'Yes' && eType != 'UberX') {
                                             var normalfare = parseFloat(totalPrice - tollcostval).toFixed(2);
                                         } else {
                                             var normalfare = totalPrice;
                                         }
                                         $('#normal_fare_price').text(normalfare);
                                         if ($('#fTollPrice').val() > 0 && $('#eTollSkipped').val() == 'No' && eFlatTrip != 'Yes' && eType != 'UberX') {
                                             var totalfare = (totalPrice - tollcostval);
                                             var surgefare = parseFloat(totalfare * fSurgePrice).toFixed(2);
                                             var surgefarenew = (parseFloat(tollcostval) + parseFloat(surgefare)).toFixed(2);
                                             var totalPrice = surgefarenew;
                                         } else {
                                             var surgefare = parseFloat(totalPrice * fSurgePrice).toFixed(2);
                                             var totalPrice = surgefare;
                                         }
                                         $('#totalcost').text(surgefare);
                                         var difference = parseFloat(surgefare - normalfare).toFixed(2);
                                         if (SurgeType == "Night") {
                                             $("#fNightPrice").val(fSurgePrice);
                                             $("#fPickUpPrice").val(1);
                                         } else {
                                             $("#fNightPrice").val(1);
                                             $("#fPickUpPrice").val(fSurgePrice);
         
                                         }
                                         $("#surge_fare_diff").text(difference);
                                         $("#fare_surge_price").text(fSurgePrice);
                                         $("#fare_surge").show();
         
                                         if (showsurgemodal == "Yes") {
                                             $("#surge_factor").text(fSurgePrice);
                                             $("#surge_type").text(SurgeType);
                                             $("#surge_timing").text(Time);
                                             $("#surgemodel").modal('show');
                                         }
         
                                         if (eFlatTrip == 'Yes') {
                                             $("#fare_normal").hide();
                                         } else {
                                             $("#fare_normal").show();
                                         }
                                         //$("#fare_normal").show();
         
                                     } else {
                                         $("#fare_surge").hide();
                                         $("#fare_normal").hide();
                                         $("#fNightPrice").val(1);
                                         $("#fPickUpPrice").val(1);
                                     }
                                     showsurgemodal = "Yes";
         
                                     if (parseFloat(totalPrice) >= parseFloat($('#minimum_fare_price').text())) {
                                         $('#total_fare_price').text(totalPrice);
                                         if ($('#fTollPrice').val() > 0 && $('#eTollSkipped').val() == 'No' && eFlatTrip != 'Yes' && eType != 'UberX') {
                                             $('#totalcost').text(totalPrice - tollcostval);
                                         } else {
                                             $('#totalcost').text(totalPrice);
                                         }
                                         $("#MinFare").hide();
                                     } else {
                                         $('#total_fare_price').text($('#minimum_fare_price').text());
                                         $('#totalcost').text($('#minimum_fare_price').text());
                                         $("#MinFare").show();
                                     }
                                 } else {
                                     $('#minimum_fare_price').text('0');
                                     $('#base_fare_price').text('0');
                                     $('#dist_fare_price').text('0');
                                     $('#time_fare_price').text('0');
                                     $('#total_fare_price').text('0');
                                 }
                             }
                         });
                     } else {
                         alert("Directions request failed: " + status);
                     }
                 });
         
         
             }
         }
         
         function show_locations() {
             if ($("#from").val() != "" && $("#to").val() == '') {
                 DeleteMarkers('from_loc');
                 var latlng = new google.maps.LatLng($("#from_lat").val(), $("#from_long").val());
                 setMarker(latlng, 'from_loc');
             }
             if ($("#to").val() != "" && $("#from").val() == '') {
                 DeleteMarkers('to_loc');
                 var latlng_to = new google.maps.LatLng($("#to_lat").val(), $("#to_long").val());
                 setMarker(latlng_to, 'to_loc');
             }
             if ($("#from").val() != '' && $("#to").val() != '') {
                 from_to($("#from").val(), $("#to").val());
             }
         }
         function from_to(from, to) {
             //  clearThat();
             DeleteMarkers('from_loc');
             DeleteMarkers('to_loc');
             if (from == '')
                 from = $('#from').val();
         
             if (to == '')
                 to = $('#to').val();
             //alert("from_to" + from +"   to "+to);
             $("#from_lat_long").val('');
             $("#from_lat").val('');
             $("#from_long").val('');
             $("#to_lat_long").val('');
             $("#to_lat").val('');
             $("#to_long").val('');
         
             // var chks = document.getElementsByName('loc');
             // var waypts = [];
             if (from != '') {
                 geocoder.geocode({'address': from}, function (results, status) {
                     if (status == google.maps.GeocoderStatus.OK) {
                         if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                             // console.log(results[0].geometry.location);
                             $("#from_lat_long").val((results[0].geometry.location));
                             $("#from_lat").val(results[0].geometry.location.lat());
                             $("#from_long").val(results[0].geometry.location.lng());
         
                             setMarker(results[0].geometry.location, 'from_loc');
                         } else {
                             alert("No results found");
                         }
                     } else {
                         var place19 = autocomplete_from.getPlace();
                         $("#from_lat_long").val(place19.geometry.location);
                     }
                 });
             }
             if (to != '') {
                 geocoder.geocode({'address': to}, function (results, status) {
                     if (status == google.maps.GeocoderStatus.OK) {
                         if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                             $("#to_lat_long").val((results[0].geometry.location));
                             $("#to_lat").val(results[0].geometry.location.lat());
                             $("#to_long").val(results[0].geometry.location.lng());
                             setMarker(results[0].geometry.location, 'to_loc');
                         } else {
                             alert("No results found");
                         }
                     } else {
                         var place20 = autocomplete_to.getPlace();
                         $("#to_lat_long").val(place20.geometry.location);
                     }
                 });
             }
             // alert('sasa');
         
             // routeDirections();
         }
         
         function callEditFundtion() {
             var from_lat = $('#from_lat').val();
             var from_lng = $('#from_long').val();
         
             var from = new google.maps.LatLng(from_lat, from_lng);
         
             if (from != '') {
                 setMarker(from, 'from_loc');
             }
         
             var to_lat = $('#to_lat').val();
             var to_lng = $('#to_long').val();
             if (to_lat != 0 && to_lng != 0) {
                 var to = new google.maps.LatLng(to_lat, to_lng);
                 if (to != '') {
                     setMarker(to, 'to_loc');
                 }
             }
         
             // var fromLatlongs = $("#from_lat").val()+", "+$("#from_long").val();
             // var toLatlongs = $("#to_lat").val()+", "+$("#to_long").val();
         }
         $(function () {
             // newDate = new Date();
             var today = new Date();
             // alert(formatDate(today));
             // today.setHours(today.getHours() + 1);
             $('#datetimepicker4').datetimepicker({
                 format: 'YYYY-MM-DD HH:mm:ss',
                 minDate: moment(),
                 ignoreReadonly: true,
                 sideBySide: true,
             }).on('dp.change', function (e) {
                 //alert(today);
                 $('#datetimepicker4').data("DateTimePicker").minDate(formatDate(today))
             });
             // date: new Date(1434544882775)
             var from = document.getElementById('from');
             autocomplete_from = new google.maps.places.Autocomplete(from);
             google.maps.event.addListener(autocomplete_from, 'place_changed', function () {
                 var place = autocomplete_from.getPlace();
                 $("#from_lat_long").val(place.geometry.location);
                 $("#from_lat").val(place.geometry.location.lat());
                 $("#from_long").val(place.geometry.location.lng());
                 // remove disable from zoom level when from has value
                 $('#radius-id').prop('disabled', false);
                 // routeDirections();
                 if (from != '') {
                     checkrestrictionfrom('from');
                 }
                 show_locations();
             });
             var to = document.getElementById('to');
             autocomplete_to = new google.maps.places.Autocomplete(to);
             google.maps.event.addListener(autocomplete_to, 'place_changed', function () {
                 var place = autocomplete_to.getPlace();
                 $("#to_lat_long").val(place.geometry.location);
                 $("#to_lat").val(place.geometry.location.lat());
                 $("#to_long").val(place.geometry.location.lng());
                 // routeDirections();
                 if (to != '') {
                     checkrestrictionto('to');
                 }
                 show_locations();
             });
         });
         function formatDate(date) {
             var d = new Date(date),
                 month = '' + (d.getMonth() + 1),
                 day = '' + d.getDate(),
                 year = d.getFullYear();
         
             if (month.length < 2) month = '0' + month;
             if (day.length < 2) day = '0' + day;
         
             return [year, month, day].join('-');
         }
         function isNumberKey(evt) {
             showPhoneDetail();
             var charCode = (evt.which) ? evt.which : evt.keyCode
             if (charCode > 31 && (charCode < 35 || charCode > 57)) {
                 return false;
             } else {
                 return true;
             }
         }
         function changeCode(id, vehicleId) {
             // alert(id);
             $.ajax({
                 type: "POST",
                 url: 'change_code.php',
                 dataType: 'json',
                 data: {id: id, eUnit: 'yes'},
                 success: function (dataHTML)
                 {
                     document.getElementById("vPhoneCode").value = dataHTML.vPhoneCode;
                     document.getElementById("eUnit").value = dataHTML.eUnit;
                     document.getElementById("vRideCountry").value = dataHTML.vCountryCode;
                     document.getElementById("vTimeZone").value = dataHTML.vTimeZone;
                     $("#change_eUnit").text(dataHTML.eUnit);
                     var substr = [5,10,20,30];
                     substr.forEach(function (item) {
                         $('#radius-id option[value="' + item + '"]').text(item + " " + dataHTML.eUnit + ' Radius');
                     });
                     showPhoneDetail();
                     showVehicleCountryVise(id, vehicleId, eType);
                 }
             });
         }
         $(document).ready(function () {
             var con = $("#vCountry").val();
             changeCode(con, '');
             if ($("#from").val() == "") {
                 $('#radius-id').prop('disabled', 'disabled');
             } else {
                 $('#radius-id').prop('disabled', false);
             }
         });
         $('#from').on('change', function () {
             if (this.value == '') {
                 $('#radius-id').prop('disabled', 'disabled');
             } else {
                 $('#radius-id').prop('disabled', false);
             }
         });
         function showPopupDriver(driverId) {
             if ($("#driver_popup").is(":visible") && $('#driver_popup ul').attr('class') == driverId) {
                 $("#driver_popup").hide("slide", {direction: "right"}, 700);
             } else {
                 //alert(driverId);
                 $("#driver_popup").hide();
                 $.ajax({
                     type: "POST",
                     url: "get_driver_detail_popup.php",
                     dataType: "html",
                     data: {driverId: driverId},
                     success: function (dataHtml2) {
                         $('#driver_popup').html(dataHtml2);
                         $("#driver_popup").show("slide", {direction: "right"}, 700);
                     }, error: function (dataHtml2) {
         
                     }
                 });
             }
         }
         function showVehicleCountryVise(countryId, vehicleId, eType) {
             /*alert(countryId);
              alert(eType);*/
             $.ajax({
                 type: "POST",
                 url: "ajax_booking_details.php",
                 dataType: "html",
                 data: {countryId: countryId, type: 'getVehicles', iVehicleTypeId: vehicleId, eType: eType},
                 success: function (dataHtml2) {
                     $('#iVehicleTypeId').html(dataHtml2);
                     // $("#driver_popup").show("slide", {direction: "right"}, 700);
                 }, error: function (dataHtml2) {
         
                 }
             });
         }
         $(document).mouseup(function (e)
         {
             var container = $("#driver_popup");
             var container1 = $("#driver_main_list");
             if (!container.is(e.target) && !container1.is(e.target) // if the target of the click isn't the container...
                     && container.has(e.target).length === 0 && container1.has(e.target).length === 0) // ... nor a descendant of the container
             {
                 container.hide("slide", {direction: "right"}, 700);
             }
         });
         function showPhoneDetail() {
             var phone = $('#vPhone').val();
             var phoneCode = $('#vPhoneCode').val();
             if (phone != "" && phoneCode != "") {
                 $.ajax({
                     type: "POST",
                     url: 'ajax_find_rider_by_number.php',
                     data: {phone: phone, phoneCode: phoneCode},
                     success: function (dataHtml)
                     {
                          if ($.trim(dataHtml) != "") {
                             $("#user_type").val('registered');
                             var result = dataHtml.split(':');
                             $('#vName').val(result[0]);
                             $('#vLastName').val(result[1]);
                             $('#vEmail').val(result[2]);
                             $('#iUserId').val(result[3]);
                             $('#eStatus').val(result[4]);
                             if (result[4] == "Inactive" || result[4] == "Deleted") {
                                 $('#inactiveModal').modal('show');
                             }
                             $('#vName').attr('readonly', true);
                             $('#vLastName').attr('readonly', true);
                             $('#vEmail').attr('readonly', true);
         
                         } else {
                             $("#user_type").val('');
                             $('#vName').val('');
                             $('#vLastName').val('');
                             $('#vEmail').val('');
                             $('#iUserId').val('');
                             $('#eStatus').val('');
                             $('#vName').attr('readonly', false);
                             $('#vLastName').attr('readonly', false);
                             $('#vEmail').attr('readonly', false);
                         }
                     }
         
                 });
             } else {
                 $("#user_type").val('');
                 $('#vName').val('');
                 $('#vLastName').val('');
                 $('#vEmail').val('');
                 $('#iUserId').val('');
                 $('#eStatus').val('');
             }
         }
         
         function setNewDriverLocations(type) {
             // alert(type);
             $("#newType").val(type);
             vType = $("#iVehicleTypeId").val();
             for (var i = 0; i < driverMarkers.length; i++) {
                 driverMarkers[i].setMap(null);
             }
             //console.log(newLocations);
             //return false;
             var infowindow = new google.maps.InfoWindow();
             for (var i = 0; i < newLocations.length; i++) {
                 if (type == newLocations[i].location_type || type == "") {
                     var str33 = newLocations[i].location_carType;
                     if (vType == "" || (str33 != null && str33.indexOf(vType) != -1)) {
                         newName = newLocations[i].location_name;
                         newOnlineSt = newLocations[i].location_online_status;
                         newLat = newLocations[i].google_map.lat;
                         newLong = newLocations[i].google_map.lng;
                         newDriverImg = newLocations[i].location_image;
                         newMobile = newLocations[i].location_mobile;
                         newDriverID = newLocations[i].location_ID;
                         newImg = newLocations[i].location_icon;
                         latlng = new google.maps.LatLng(newLat, newLong);
                         // bounds.push(latlng);
                         // alert(newImg);
                         content = '<table><tr><td rowspan="4"><img src="' + newDriverImg + '" height="60" width="60"></td></tr><tr><td>&nbsp;&nbsp;Email: </td><td><b>' + newDriverID + '</b></td></tr><tr><td>&nbsp;&nbsp;Mobile: </td><td><b>+' + newMobile + '</b></td></tr></table>';
                         var drivermarker = new google.maps.Marker({
                             map: map,
                             //animation: google.maps.Animation.DROP,
                             position: latlng,
                             icon: newImg
                         });
                         google.maps.event.addListener(drivermarker, 'click', (function (drivermarker, content, infowindow) {
                             return function () {
                                 infowindow.setContent(content);
                                 infowindow.open(map, drivermarker);
                             };
                         })(drivermarker, content, infowindow));
                         // alert(content);
                         driverMarkers.push(drivermarker);
                     }
                 }
             }
             //var markers = [];//some array
             // var bounds = new google.maps.LatLngBounds();
             // for (var i = 0; i < driverMarkers.length; i++) {
             // bounds.extend(driverMarkers[i].getPosition());
             // }
         
             // map.fitBounds(bounds);
             setDriverListing(vType);
         }
         
         function getFarevalues(vehicleId) {
             var booking_date = $("#datetimepicker4").val();
             var vCountry = $('#vCountry').val();
             var tollcostval = $('#fTollPrice').val();
             if (vehicleId == "") {
                 vehicleId = $("#iVehicleTypeId").val();
             }
             if (($("#from").val() != "") && ($("#to").val() != "")) {
                 var FromLatLong = $("#from_lat").val() + ", " + $("#from_long").val();
                 var ToLatLong = $("#to_lat").val() + ", " + $("#to_long").val();
             }
             // alert(vehicleId);
             if (vehicleId != "") {
                 $.ajax({
                     type: "POST",
                     url: 'ajax_estimate_by_vehicle_type.php',
                     dataType: 'json',
                     data: {'vehicleId': vehicleId, 'booking_date': booking_date, 'vCountry': vCountry, 'FromLatLong': FromLatLong, 'ToLatLong': ToLatLong},
                     success: function (dataHtml)
                     {
                         if (dataHtml != "") {
                             // var result = dataHtml.split(':');
                             var iBaseFare = parseFloat(dataHtml.iBaseFare).toFixed(2);
                             var fPricePerKM = parseFloat(dataHtml.fPricePerKM).toFixed(2);
                             var fPricePerMin = parseFloat(dataHtml.fPricePerMin).toFixed(2);
                             var iMinFare = parseFloat(dataHtml.iMinFare).toFixed(2);
                             var fPickUpPrice = parseFloat(dataHtml.fPickUpPrice).toFixed(2);
                             var fNightPrice = parseFloat(dataHtml.fNightPrice).toFixed(2);
                             var fSurgePrice = parseFloat(dataHtml.fSurgePrice).toFixed(2);
                             var SurgeType = dataHtml.SurgeType;
                             var Time = dataHtml.Time;
                             eFlatTrip = dataHtml.eFlatTrip;
                             var fFlatTripPrice = dataHtml.fFlatTripPrice;
         
                             if (eFlatTrip == 'Yes') {
                                 fFlatTripPrice = parseFloat(fFlatTripPrice).toFixed(2);
                                 $('#fix_fare_price').text(fFlatTripPrice);
                                 fPricePerMin = 0;
                                 fPricePerKM = 0;
                                 iMinFare = 0;
                                 $('#eFlatTrip').val(eFlatTrip);
                                 $('#fFlatTripPrice').val(fFlatTripPrice);
                                 $("#FixFare").show();
                                 $("#BaseFare").hide();
                                 $("#MinFare").hide();
                                 $("#DistanceFare").hide();
                                 $("#TimeFare").hide();
                             } else {
                                 $('#eFlatTrip').val(eFlatTrip);
                                 $("#FixFare").hide();
                                 $("#BaseFare").show();
                                 $("#MinFare").show();
                                 $("#DistanceFare").show();
                                 $("#TimeFare").show();
                             }
         
                             $('#minimum_fare_price').text(iMinFare);
                             $('#base_fare_price').text(iBaseFare);
                             $('#dist_fare_price').text(parseFloat(fPricePerKM * $('#dist_fare').text()).toFixed(2));
                             /* var eunit = $("#eUnit").val();
                              if(eunit == "Miles"){
                              $('#dist_fare_price').text(parseFloat((fPricePerKM*($('#dist_fare').text()*1.6))).toFixed(2));
                              } */
         
                             $('#time_fare_price').text(parseFloat(fPricePerMin * $('#time_fare').text()).toFixed(2));
                             if (ENABLE_TOLL_COST == 'Yes') {
                                 if ($('#fTollPrice').val() > 0 && $('#eTollSkipped').val() == 'No' && eFlatTrip != 'Yes' && eType != 'UberX') {
                                     $("#toll_price").show();
                                     $('#toll_price_val').text(tollcostval);
                                 } else {
                                     $("#toll_price").hide();
                                 }
                             }
                             if (eFlatTrip == 'Yes') {
                                 var totalPrice = (parseFloat($('#fix_fare_price').text()) + parseFloat($('#dist_fare_price').text()) + parseFloat($('#time_fare_price').text())).toFixed(2);
                             } else {
                                 if (ENABLE_TOLL_COST == 'Yes') {
                                     if ($('#fTollPrice').val() > 0 && $('#eTollSkipped').val() == 'No' && eFlatTrip != 'Yes' && eType != 'UberX') {
                                         var totalPrice = (parseFloat($('#base_fare_price').text()) + parseFloat($('#dist_fare_price').text()) + parseFloat(tollcostval) + parseFloat($('#time_fare_price').text())).toFixed(2);
                                     } else {
                                         var totalPrice = (parseFloat($('#base_fare_price').text()) + parseFloat($('#dist_fare_price').text()) + parseFloat($('#time_fare_price').text())).toFixed(2);
                                     }
                                 } else {
                                     var totalPrice = (parseFloat($('#base_fare_price').text()) + parseFloat($('#dist_fare_price').text()) + parseFloat($('#time_fare_price').text())).toFixed(2);
                                 }
                             }
         
                             if (fSurgePrice > 1) {
                                 if ($('#fTollPrice').val() > 0 && $('#eTollSkipped').val() == 'No' && eFlatTrip != 'Yes' && eType != 'UberX') {
                                     var normalfare = parseFloat(totalPrice - tollcostval).toFixed(2);
                                 } else {
                                     var normalfare = totalPrice;
                                 }
                                 $('#normal_fare_price').text(normalfare);
                                 if ($('#fTollPrice').val() > 0 && $('#eTollSkipped').val() == 'No' && eFlatTrip != 'Yes' && eType != 'UberX') {
                                     var totalfare = (totalPrice - tollcostval);
                                     var surgefare = parseFloat(totalfare * fSurgePrice).toFixed(2);
                                     var surgefarenew = (parseFloat(tollcostval) + parseFloat(surgefare)).toFixed(2);
                                     var totalPrice = surgefarenew;
                                 } else {
                                     var surgefare = parseFloat(totalPrice * fSurgePrice).toFixed(2);
                                     var totalPrice = surgefare;
                                 }
                                 $('#totalcost').text(surgefare);
                                 var difference = parseFloat(surgefare - normalfare).toFixed(2);
                                 // console.log(normalfare+" "+surgefare+" "+difference);
                                 if (SurgeType == "Night") {
                                     $("#fNightPrice").val(fSurgePrice);
                                     $("#fPickUpPrice").val(1);
                                 } else {
                                     $("#fNightPrice").val(1);
                                     $("#fPickUpPrice").val(fSurgePrice);
         
                                 }
                                 $("#surge_fare_diff").text(difference);
                                 $("#fare_surge_price").text(fSurgePrice);
                                 $("#fare_surge").show();
                                 if (showsurgemodal == "Yes") {
                                     $("#surge_factor").text(fSurgePrice);
                                     $("#surge_type").text(SurgeType);
                                     $("#surge_timing").text(Time);
                                     $("#surgemodel").modal('show');
                                 }
         
                                 if (eFlatTrip == 'Yes') {
                                     $("#fare_normal").hide();
                                 } else {
                                     $("#fare_normal").show();
                                 }
         
                                 showsurgemodal == "Yes";
                             } else {
                                 $("#fare_surge").hide();
                                 $("#fare_normal").hide();
                                 $("#fNightPrice").val(1);
                                 $("#fPickUpPrice").val(1);
                             }
         
                             if (parseFloat(totalPrice) >= parseFloat($('#minimum_fare_price').text())) {
                                 $('#total_fare_price').text(totalPrice);
                                 if ($('#fTollPrice').val() > 0 && $('#eTollSkipped').val() == 'No' && eFlatTrip != 'Yes' && eType != 'UberX') {
                                     $('#totalcost').text(totalPrice - tollcostval);
                                 } else {
                                     $('#totalcost').text(totalPrice);
                                 }
                                 $("#MinFare").hide();
                             } else {
                                 $('#total_fare_price').text($('#minimum_fare_price').text());
                                 $('#totalcost').text($('#minimum_fare_price').text());
                                 $("#MinFare").show();
                             }
         
                         } else {
                             $('#minimum_fare_price').text('0');
                             $('#base_fare_price').text('0');
                             $('#dist_fare_price').text('0');
                             $('#time_fare_price').text('0');
                             $('#total_fare_price').text('0');
                         }
                     }
                 });
                 // setDriverListing(vehicleId);
                 // getDriversList(vehicleId);
             }
         }
         
         function showAsVehicleType(vType) {
             var type = $("#newType").val();
             for (var i = 0; i < driverMarkers.length; i++) {
                 driverMarkers[i].setMap(null);
             }
             //console.log(newLocations);
             //return false;
             var infowindow = new google.maps.InfoWindow();
             for (var i = 0; i < newLocations.length; i++) {
                 if (type == newLocations[i].location_type || type == "") {
                     var str33 = newLocations[i].location_carType;
                     if (vType == "" || (str33 != null && str33.indexOf(vType) != -1)) {
                         newName = newLocations[i].location_name;
                         newOnlineSt = newLocations[i].location_online_status;
                         newLat = newLocations[i].google_map.lat;
                         newLong = newLocations[i].google_map.lng;
                         newDriverImg = newLocations[i].location_image;
                         newMobile = newLocations[i].location_mobile;
                         newDriverID = newLocations[i].location_ID;
                         newImg = newLocations[i].location_icon;
                         latlng = new google.maps.LatLng(newLat, newLong);
                         // bounds.push(latlng);
                         // alert(newImg);
                         content = '<table><tr><td rowspan="4"><img src="' + newDriverImg + '" height="60" width="60"></td></tr><tr><td>&nbsp;&nbsp;Email: </td><td><b>' + newDriverID + '</b></td></tr><tr><td>&nbsp;&nbsp;Mobile: </td><td><b>+' + newMobile + '</b></td></tr></table>';
                         var drivermarker = new google.maps.Marker({
                             map: map,
                             //animation: google.maps.Animation.DROP,
                             position: latlng,
                             icon: newImg
                         });
                         google.maps.event.addListener(drivermarker, 'click', (function (drivermarker, content, infowindow) {
                             return function () {
                                 infowindow.setContent(content);
                                 infowindow.open(map, drivermarker);
                             };
                         })(drivermarker, content, infowindow));
                         // alert(content);
                         driverMarkers.push(drivermarker);
                     }
                 }
             }
             //var markers = [];//some array
             // var bounds = new google.maps.LatLngBounds();
             // for (var i = 0; i < driverMarkers.length; i++) {
             // bounds.extend(driverMarkers[i].getPosition());
             // }
         
             // map.fitBounds(bounds);
             setDriverListing(vType);
             getFarevalues(vType);
         }
         
         setInterval(function () {
             if (eTypeQ11 == 'yes') {
                 setDriversMarkers('test');
                 $("#driver_main_list").html('');
             }
         }, 35000);
         
         
         function setFormBook() {
             var statusVal = $('#vEmail').val();
             if (statusVal != '') {
                 $.ajax({
                     type: "POST",
                     url: 'ajax_checkBooking_email.php',
                     data: 'vEmail=' + statusVal,
                     success: function (dataHtml)
                     {
                         var testEstatus = dataHtml.trim();
                         if (testEstatus != 'Active' && testEstatus != '') {
                             if (confirm("The selected user account is in 'Inactive / Deleted' mode. Do you want to Active this User ?'")) {
                                 eTypeQ11 = 'no';
                                 $("#add_booking_form").attr('action', 'action_booking.php');
                                 $("#submitbutton").trigger("click");
                                 // e.stopPropagation();
                                 // e.preventDefault();
                                 return false;
                             } else {
                                 $("#vEmail").focus();
                                 return false;
                             }
                         } else {
                             eTypeQ11 = 'no';
                             $("#add_booking_form").attr('action', 'action_booking.php');
                             $("#submitbutton").trigger("click");
                             // e.stopPropagation();
                             // e.preventDefault();
                             return false;
                         }
                     }
                 });
             } else {
                 return false;
             }
         }
         
         function get_drivers_list(keyword) {
             vCountry = $("#vCountry").val();
             vType = $("#iVehicleTypeId").val();
             eLadiesRide = 'No';
             eHandicaps = 'No';
             eChildSeat = "No";
             eWheelChair = "No";
             if ($("#eFemaleDriverRequest").is(":checked")) {
                 eLadiesRide = 'Yes';
             }
             if ($("#eHandiCapAccessibility").is(":checked")) {
                 eHandicaps = 'Yes';
             }
             if ($("#eChildSeatAvailable").is(":checked")) {
                 eChildSeat = 'Yes';
             }
             if ($("#eWheelChairAvailable").is(":checked")) {
                 eWheelChair = 'Yes';
             }
             $.ajax({
                 type: "POST",
                 url: "get_available_driver_list.php",
                 dataType: "html",
                 data: {vCountry: vCountry, keyword: keyword, iVehicleTypeId: vType, eLadiesRide: eLadiesRide, eHandicaps: eHandicaps, eChildSeat: eChildSeat, eWheelChair: eWheelChair, AppeType: eType},
                 success: function (dataHtml2) {
                     $('#driver_main_list').show();
                     if (dataHtml2 != "") {
                         $('#driver_main_list').html(dataHtml2);
                     } else {
                         $('#driver_main_list').html('<h4 style="margin:25px 0 0 15px">Sorry , No Driver Found.</h4>');
                     }
                     if ($("#eAutoAssign").is(':checked')) {
                         $(".assign-driverbtn").attr('disabled', 'disabled');
                     }
                     $("#imageIcon").hide();
                 }, error: function (dataHtml2) {
         
                 }
             });
         }
         
         $("#eAutoAssign").on('change', function () {
             if ($(this).prop('checked')) {
                 $("#iDriverId").val('');
                 $("#iDriverId").attr('disabled', 'disabled');
                 $(".assign-driverbtn").attr('disabled', 'disabled');
                 $("#showdriverSet001").hide();
                 $('#myModalautoassign').modal('show');
             } else {
                 $("#iDriverId").removeAttr('disabled');
                 $(".assign-driverbtn").removeAttr('disabled');
                 $('#myModalautoassign').modal('hide');
             }
         });
         var bookId = '';
         if (bookId != "") {
             if ($("#eAutoAssign").prop('checked')) {
                 $("#iDriverId").val('');
                 $("#iDriverId").attr('disabled', 'disabled');
             } else {
                 $("#iDriverId").removeAttr('disabled');
             }
         }
         
         $(document).ready(function () {
             var referrer;
             if ($("#previousLink").val() == "") {
                 referrer = document.referrer;
                 //alert(referrer);
             } else {
                 referrer = $("#previousLink").val();
             }
             if (referrer == "") {
                 referrer = "cab_booking.php";
             } else {
                 $("#backlink").val(referrer);
             }
             // $(".back_link").attr('href',referrer);
         });
         
         $('#datetimepicker4').keydown(function (e) {
             e.preventDefault();
             return false;
         });
         
         $('#eFemaleDriverRequest').click(function () {
             if ($(this).is(':checked'))
                 setDriversMarkers('true');
             else
                 setDriversMarkers('true');
         });
         
         $('#eHandiCapAccessibility').click(function () {
             if ($(this).is(':checked'))
                 setDriversMarkers('true');
             else
                 setDriversMarkers('true');
         });
         $('#eChildSeatAvailable').click(function () {
             if ($(this).is(':checked'))
                 setDriversMarkers('true');
             else
                 setDriversMarkers('true');
         });
         $('#eWheelChairAvailable').click(function () {
             if ($(this).is(':checked'))
                 setDriversMarkers('true');
             else
                 setDriversMarkers('true');
         });
         $('#reset12').click(function () {
             window.location.reload(true);
             /*$('#newSelect02').prop('selectedIndex',0);
              $("#newSelect02").val("").trigger("change");
              setDriverListing();*/
         });
         
         function checkrestrictionfrom(type) {
             if (($("#from").val() != "") || ($("#to").val() != "")) {
                 $.ajax({
                     type: "POST",
                     url: 'checkForRestriction.php',
                     dataType: 'html',
                     data: {fromLat: $("#from_lat").val(), fromLong: $("#from_long").val(), type: type},
                     success: function (dataHtml5)
                     {
                         if ($.trim(dataHtml5) != '') {
                             alert($.trim(dataHtml5));
                         }
                     },
                     error: function (dataHtml5)
                     {
                     }
                 });
             }
         }
         
         function checkrestrictionto(type) {
             if (($("#from").val() != "") || ($("#to").val() != "")) {
                 $.ajax({
                     type: "POST",
                     url: 'checkForRestriction.php',
                     dataType: 'html',
                     data: {toLat: $("#to_lat").val(), toLong: $("#to_long").val(), type: type},
                     success: function (dataHtml5)
                     {
                         if ($.trim(dataHtml5) != '') {
                             alert($.trim(dataHtml5));
                         }
                     },
                     error: function (dataHtml5)
                     {
                     }
                 });
             }
         }
         
         $('#add_booking_form').on('keyup keypress', function (e) {
             var keyCode = e.keyCode || e.which;
             if (keyCode === 13) {
                 e.preventDefault();
                 return false;
             }
         });
         $("#submitbutton").on("click", function (event) {
             var from_lat_long = $("#from_lat_long").val();
             var to_lat_long = $("#to_lat_long").val();
             if (eType != 'UberX') {
                 if (from_lat_long == '') {
                     alert("Please select pickup location.");
                     $("#from").focus();
                     return false;
                 } else if (to_lat_long == '') {
                     alert("Please select dropoff location.");
                     $("#to").focus();
                     return false;
                 }
             } else {
                 if (from_lat_long == '') {
                     alert("Please select pickup location.");
                     $("#from").focus();
                     return false;
                 }
             }
             var isvalidate = $("#add_booking_form")[0].checkValidity();
             if (isvalidate) {
                 event.preventDefault();
                 var country = $('select[name=vCountry]').val();
                 var eTollEnabled = '';
                 if (country != "") {
                     $.ajax({
                         type: "POST",
                         url: 'ajax_check_toll.php',
                         dataType: 'html',
                         async: false,
                         data: {vCountryCode: country},
                         success: function (dataHtml5)
                         {
                             eTollEnabled = dataHtml5;
                             return eTollEnabled;
                         }
                     });
                 }
                 //alert(eTollEnabled);
                 //  $('#submitbutton').prop('disabled', true);
                 if (eTollEnabled == 'Yes') {
                     if (eType != 'UberX' && eFlatTrip != 'Yes') {
                         if (ENABLE_TOLL_COST == 'Yes') {
                             $(".loader-default").show();
                             if (($("#from").val() != "" && $("#from_lat_long").val() != "") && ($("#to").val() != "" && $("#to_lat_long").val() != "")) {
                                 var newFromtoll = $("#from_lat").val() + "," + $("#from_long").val();
                                 var newTotoll = $("#to_lat").val() + "," + $("#to_long").val();
                                 $.getJSON("https://tce.cit.api.here.com/2/calculateroute.json?app_id=FNd8deY2a7sCiLSCsFXs&app_code=HKtEcbWXgHn4B1gSgHS8aA&waypoint0=" + newFromtoll + "&waypoint1=" + newTotoll + "&mode=fastest;car", function (result) {
                                     var tollCurrency = result.costs.currency;
                                     var tollCost = result.costs.details.tollCost;
                                         var tollskip = 'No';
                                     $('#tollcost').text(tollCurrency + " " + tollCost);
                                     if (tollCost != '0.0' && $.trim(tollCost) != "" && tollCost != '0') {
                                         $(".loader-default").hide();
                                         var modal = bootbox.dialog({
                                             message: $(".form-content").html(),
                                             title: "Toll Route",
                                             buttons: [
                                                 {
                                                     label: "Continue",
                                                     className: "btn btn-primary",
                                                     callback: function (result) {
                                                         // alert("toll"+tollskip);
                                                         $("#vTollPriceCurrencyCode").val(tollCurrency);
                                                         $("#fTollPrice").val(tollCost);
                                                         $("#eTollSkipped").val(tollskip);
                                                         $("#add_booking_form").submit();
                                                         return true;
                                                     }
                                                 },
                                                 {
                                                     label: "Close",
                                                     className: "btn btn-default",
                                                     callback: function () {
                                                         // $('#submitbutton').prop('disabled', false);
                                                     }
                                                 }
                                             ],
                                             show: false,
                                             onEscape: function () {
                                                 modal.modal("hide");
                                                 //$('#submitbutton').prop('disabled', false);
                                             }
                                         });
                                         modal.on('shown.bs.modal', function () {
                                             modal.find('.modal-body').on('change', 'input[type="checkbox"]', function (e) {
                                                 $(this).attr("checked", this.checked);
                                                 //$(this).val(this.checked ? "Yes" : "No");
                                                 if ($(this).is(':checked')) {
                                                     tollskip = 'Yes';
                                                 } else {
                                                     tollskip = 'No';
                                                 }
                                                 //alert(tollskip);
                                             });
                                         });
                                         modal.modal("show");
                                     } else {
                                         $(".loader-default").hide();
                                         $("#add_booking_form").submit();
                                         return true;
                                     }
                                 }).fail(function (jqXHR, textStatus, errorThrown) {
                                     alert("Toll API Response: " + jqXHR.responseJSON.message);
                                     $(".loader-default").hide();
                                     $("#add_booking_form").submit();
                                 });
                             } /*else {
                              $(".loader-default").hide();
                              $("#add_booking_form").submit();
                              return true;
                              }*/
                         } else {
                             $("#add_booking_form").submit();
                             return true;
                         }
                     } else {
                         $("#add_booking_form").submit();
                         return true;
                     }
                 } else {
                     $("#add_booking_form").submit();
                     return true;
                 }
             }
         });
         
         
      </script>
   </body>
   <!-- END BODY-->
</html>
<div class="loader-default"></div>
<div class="form-content" style="display:none;">
   <p>This route contains the toll(s). You can continue OR ignore this toll route.</p>
   <form class="form" role="form" id="formtoll">
      <div class="checkbox">
         <label>
         <input type="checkbox" name="eTollSkipped1" id="eTollSkipped1" value="Yes" /> Ignore Toll Route
         </label>
      </div>
   </form>
   <p style="text-align: center;font-weight: bold;">
      <span>Total Fare $<b id="totalcost">0</b></span>+
      <span>Toll Price <b id="tollcost">0</b></span>
   </p>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-large">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
            </button>
            <h4 class="modal-title" id="myModalLabel"> How It Works?</h4>
         </div>
         <div class="modal-body">
            <p><b>Flow </b>: Through "Manual Taxi Dispatch" Feature, you can book Rides for customers who ordered for a Ride by calling you. There will be customers who may not have iPhone or Android Phone or may not have app installed on their phone. In this case, they will call Taxi Company (your company) and order Ride which may be needed immediately or after some time later.</p>
            <p>- Here, you will fill their info in the form and dispatch a taxi for him.</p>
            <p>- If the customer is already registered with us, just enter his phone number and his info will be fetched from the database when "Get Details" button is clicked. Else fill the form.</p>
            <p>- Once the Trip detail is added, Fare estimate will be calculated based on Pick-Up Location, Drop-Off Location and Car Type.</p>
            <p>- Admin will need to communicate & confirm with Driver and then select him as Driver so the Ride can be allotted to him. </p>
            <p>- Clicking on "Book" Button, the Booking detail will be saved and will take Administrator to the "Ride Later Booking" Section. This page will show all such bookings.</p>
            <p>- Both Driver and Rider will receive the booking details through Email and SMS as soon as the form is submitted. Based on this booking details, Driver will pickup the rider at the scheduled time.</p>
            <p>- They both will get the reminder SMS and Email as well before 30 minutes of actual trip</p>
            <p>- The assigned Driver can see the upcoming Bookings from his App under "My Bookings" section.</p>
            <p>- Driver will have option to "Start Trip" when he reaches the Pickup Location at scheduled time or "Cancel Trip" if he cannot take the ride for some reason. If the Driver clicks on "Cancel Trip", a notification will be sent to Administrator so he can make alternate arrangements.</p>
            <p>- Upon clicking on "Start Trip", the ride will start in driver's App in regular way.</p>
            <p>&nbsp;</p>
            <p><b>Auto Assign Driver </b>: The "Ride Later" booking made from the mobile application has the "Driver Auto Assign" by default enabled. Furthermore Admin can also select this option while adding the booking manually from admin panel</p>
            <p>- Driver auto assignment process works as explained below</p>
            <p>- System will automatically sends the request to drivers who are online and available within pickup location radius</p>
            <p>- Driver(s) will get the 30 seconds dial screen request  before 8-12 minutes before the actual pickup time. This request is same like "Request Now" one.</p>
            <p>- If no driver(s) accepts the request then system will make a 2nd try after 4 minutes and sends the request again . At this point system also notifies the admin through email that no any drivers had accepted the request in first try.</p>
            <p>- Again If no driver(s) accepts the request then system will make a 3rd and last try after 4 minutes and send the request again. At this point system also notifies admin through email that no any drivers had accepted the request in 2nd try.</p>
            <p>- System makes the 3 trials and if in any trial, no drivers availabe in that area then it will inform administrator about unavailability of driver so administrator takes necessary action to contact that rider and arrange the taxi for him</p>
            <!--    <p><span><img src="images/mobile_app_booking.png"></img></span></p>-->
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="myModalufx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-large">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
            </button>
            <h4 class="modal-title" id="myModalLabel"> How It Works?</h4>
         </div>
         <div class="modal-body">
            <p><b>Flow </b>: Through "Manual Booking" Feature, you can book providers for users who ordered for a Service by calling you. There will be users who may not have iPhone or Android Phone or may not have app installed on their phone. In this case, they will call Company (your company) and order service which may be needed immediately or after some time later.</p>
            <p>- Here, you will fill their info in the form and dispatch a service provider for them.</p>
            <p>- If the user is already registered with us, just enter his phone number and his info will be fetched from the database when "Get Details" button is clicked. Else fill the form.</p>
            <p>- Once the Job detail is added, estimate will be calculated based on Service or Service provider selected.</p>
            <p>- Admin will need to communicate & confirm with provider and then select him as provider so the Job can be allotted to him. </p>
            <p>- Clicking on "Book Now" Button, the Booking detail will be saved and will take Administrator to the "Scheduled Booking" Section. This page will show all such bookings.</p>
            <p>- Both Provider and User will receive the booking details through Email and SMS as soon as the form is submitted. Based on this booking details, Provider will go to user's location at the scheduled time.</p>
            <p>- They both will get the reminder SMS and Email as well before 30 minutes of actual job</p>
            <p>- The assigned provider can see the upcoming Bookings from his App under "My Jobs" section.</p>
            <p>- Provider will have option to "Start Job" when he reaches the Job Location at scheduled time or "Cancel Job" if he cannot take the job for some reason. If the provider clicks on "Cancel Job", a notification will be sent to Administrator so he can make alternate arrangements.</p>
            <p>- Upon clicking on "Start Job", the service  will start in provider's App in regular way.</p>
            <p>&nbsp;</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="myModalautoassign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-large">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Alert</h4>
         </div>
         <div class="modal-body">
            <p style="font-size: 15px;"> Please make sure that the booking time is 20 minutes ahead from current time. So if your current time is 3:00 P.M then please select 3:20 P.M as booking time.  This gives a room to auto assign drivers properly.</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-success" data-dismiss="modal">OK</button>
         </div>
      </div>
   </div>
</div>