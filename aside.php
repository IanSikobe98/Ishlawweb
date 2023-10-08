 <?php
require "auth.php";
 ?>      
<!DOCTYPE html>
<html lang="en">  
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
   <link rel="icon" type="images/x-icon" href="justice.png" class="brand-image img-circle elevation-3"
           style="opacity: .8"/>

  <title>Africa Claims</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!--Compose php styling -->
<style>
    .mul-select{
        width: 100%;
    }
</style>
<!-- Include Summernote CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
  <!-- Include jQuery library (required) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Include Summernote JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

   <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script src='https://cdn.jsdelivr.net/npm/rrule@2.6.4/dist/es5/rrule.min.js'></script>
  --    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">-->
<!--    <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.3.9/css/autoFill.dataTables.min.css">-->
<!--    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" type="text/javascript"></script>-->
<!--    <script src="https://cdn.datatables.net/autofill/2.3.9/js/dataTables.autoFill.min.js" type="text/javascript"></script>-->


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>


    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <script src="environment/location.js"></script>
    <script src="services/taskmgmt/nonrectaagen.js"></script>
    <script src="services/taskmgmt/rectaagen.js"></script>

  <script src="services/taskmgmt/nonrecevagen.js"></script>
  <script src="services/taskmgmt/recevagen.js"></script>
  <script src="services/taskmgmt/formfiller.js"></script>
  <script src="globalfuncs.js"></script>
    <script src="environment/location.js"></script>
  <link rel="stylesheet" type="text/css" href="index.css">


<style type="text/css">
  .modal {
   display: none;  /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 60px; /* Full width */
  height: 60px; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4);
  } /* Black w/ opacity */\
 
</style>

<script type="text/javascript">
  var jwtpo = "<?php echo $_COOKIE["resp"] ?>";
  sessionStorage.setItem('token',jwtpo);
  sessionStorage.setItem('tokenuse',jwtpo);

  var userid = '<?php if(isset($_COOKIE["id"])){
      echo $_COOKIE["id"];} ?>'

  sessionStorage.setItem('userid',userid);

  var viewasign = '<?php if(isset($_COOKIE["viewasign"])){
      echo $_COOKIE["viewasign"];} ?>'


  if(viewasign =="viewasignees")
  {
      console.log("allowed viewasignees")
      sessionStorage.setItem('viewasignees',"true");
  }
  else{
      sessionStorage.setItem('viewasignees',"false");
  }
</script>

</head>
<body onload="hidefunc()" class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
   

     <ul class="navbar-nav">
      <li class="nav-item">
         <a class="btn btn-primary" href="https://login.microsoftonline.com/common/oauth2/v2.0/authorize?scope=service%3A%3Aaccount.microsoft.com%3A%3AMBI_SSL+openid+profile+offline_access&response_type=code&client_id=81feaced-5ddd-41e7-8bef-3e20a2689bb7&redirect_uri=https%3A%2F%2Faccount.microsoft.com%2Fauth%2Fcomplete-signin-oauth&client-request-id=48564fe8-5724-4d3e-a0e5-40cfd6cf984a&x-client-SKU=MSAL.Desktop&x-client-Ver=4.45.0.0&x-client-CPU=x64&x-client-OS=Windows+Server+2019+Datacenter&prompt=login&client_info=1&state=H4sIAAAAAAAEAAXBy4JrMAAA0H-ZrYWQkLE0VVJMiUejdh29TbX1fkR8_T3nq6i21-L-7l7ErsgG5UKeHfEtrY75YU-g4ARNIFb0jN0d1VAKobL5mDC9PynHmZSzlQuUoIv2N3IX6cPbBiq_P0zt8JrZlEJgOPmfGUqkVUqR5VXf6uDSErRmQ3NCRR_j1xXmqUjt4UaC_X2n7AeTiVvLKo8VGrucnrVNa2srAjxu6H73Gd8eOHEaFdwOIlafcA2I30LJzJiC2a09p3L34tuuQ2d9h-HawWY5wfGWG9FZ2n367IxwA3LSfNxuTL1UNdcjW4qSwtf3rSqHXqnipL0Kbwuyk3i6yhB9SBSsVodhYtbljnlqY7_5jLozOXg62sJIN0w9FU-Ov-3lWU_lNq6GDGhhZvpbyaa-l_-wD5RxaQ4zlTT6eOb4IC7_-g9FNF32ggEAAA&msaoauth2=true&lc=1033" ><i   class="fa fa-envelope "></i></a>
  
      </li>
      
    </ul>


    <!-- SEARCH FORM -->
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div class="btn-group open">
       <a class="btn btn-primary" href="#"><i onclick="return logout()"   class="fa fa-power-off fa-fw "></i></a>
  
</div>

      <!-- Messages Dropdown Menu -->
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="justice.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Africa Claims</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/ava.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Welcome</a>
          <a href="#" class="d-block" id="usern">User </a>
           <a href="#" class="d-block" id = "role1">Logged In</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link active">
              <style type="text/css" src="ry.css" ></style>

              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

                <i class="right fas fa-angle-left"></i>
              </p>

            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="widgets.php" class="nav-link">
              <i class="far fa-file-word"></i>
              <p>
                Files

              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                My Account
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profile.php" class="nav-link">
                  <i class="fa fa-user"></i>
                  <p>My profile</p>
                </a>
              </li>
              <li class="nav-item " id = "newcli">
                <a href="reset.php" class="nav-link">
                  <i class="fa fa-key"></i>
                  <p>Reset Password</p>
                </a>
              </li>
            </ul>

          </li>
       <li class="nav-item has-treeview client2" id="client4">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item cliadd1" id = "cliadd">   
                <a href="clients.php" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Add New Staff</p>
                </a>
              </li>
              <li class="nav-item " id = "cliadd">
                <a href="registration.php" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Add New Client</p>
                </a>
              </li>
              <li class="nav-item viewedit1"  id="viewedit">
                <a href="staff.php" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>View Staff</p>
                </a>
              </li>
              <li class="nav-item "  id="">
                <a href="customers.php" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>View Clients</p>
                </a>
              </li>
             
                         </ul>
          </li>
          <li class="nav-item has-treeview visit1" id = "visit">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Visitors
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item visitadd1" id="visitadd">
                <a href="visitors.php" class="nav-link">
                  <i class="far fa-user-circle"></i>
                  <p>Add Visitors</p>
                </a>
              </li>
              <li class="nav-item visitvi1 " id="visitvi">
                <a href="roster.php" class="nav-link">
                  <i class="far fa-user-circle"></i>
                  <p>View Visitors</p>
                </a>
              </li>
                  </ul>
          </li>
<li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Tasks
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tasks.php" class="nav-link">
                  <i class="fa fa-tasks"></i>
                  <p>Create New Task</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="events.php" class="nav-link">
                  <i class="fa fa-tasks"></i>
                  <p>Create New Event</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kazi.php" class="nav-link">
                  <i class="far fa-edit"></i>
                  <p>View Current Tasks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tvents.php" class="nav-link">
                  <i class="far fa-edit"></i>
                  <p>View Current Events</p>
                </a>
              </li>
                  </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fa fa-gavel"></i>
              <p>
                Court work
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="court_attendance.php" class="nav-link">
                  <i class="fa fa-gavel"></i>
                  <p>Court attendance form</p>
                </a>
              </li>
                          <li class="nav-item">
                <a href="attendanceForms.php" class="nav-link">
                  <i class="fa fa-gavel"></i>
                  <p>View Court work</p>
                </a>
              </li>
              
                  </ul>
          </li>
          <li class="nav-item has-treeview ">
            <a href="" class="nav-link">
              <i class="nav-icon  fa fa-file-archive-o"></i>
              <p>
                Work Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" >
                <a href="reports.php" class="nav-link">
                  <i class="  fa fa-file-archive-o"></i>
                  <p>Upload Report</p>
                </a>
              </li>
              <li class="nav-item  " id="">
                <a href="viewReports.php" class="nav-link">
                  <i class="  fa fa-file-archive-o"></i>
                  <p>View Reports</p>
                </a>
              </li>
                  </ul>
          </li>
          <li class="nav-item has-treeview ">
            <a href="" class="nav-link">
              <i class="nav-icon  far fa-address-book"></i>
              <p>
                List of clients
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" >
                <a href="clientList.php" class="nav-link">
                  <i class="  far fa-address-book"></i>
                  <p>Upload List</p>
                </a>
              </li>
              <li class="nav-item  " id="">
                <a href="clientReports.php" class="nav-link">
                  <i class="  far fa-address-book"></i>
                  <p>View clients</p>
                </a>
              </li>
                  </ul>
          </li>
          <li class="">

            <li class="nav-item">
            <a href="calendar.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right"></span>
              </p>
            </a>

          </li>
         <li class="nav-item">
            <a href="messages.php" class="nav-link">
              <i class="nav-icon far fa-bell"></i>
              <p>
                Inbox
                <span class="badge badge-info right" id="inboxcount"></span>
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="appointments.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>
                Appointments
                <span class="badge badge-info right"></span>
              </p>
            </a>

          </li>
          

          <li class="nav-header">Quick Links</li>
                    <li class="nav-item">
            <a href="https://www.judiciary.go.ke/" class="nav-link">
              <i class="nav-icon fas fa-balance-scale"></i>
              <p>
                Judiciary
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="tasks.php" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                New Task
              </p>
            </a>
          </li>
          <!--   </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">

            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recover Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li> -->
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script type="text/javascript" src="globalfuncs.js"></script>



<!-- Calender Script(Very Important) -->
<script>


  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      selectable: true,
      initialView: 'dayGridMonth',
      
     
//      dayMaxEvents: true,
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },



eventDidMount: function(info) {

  console.log(info.event);

},

 eventClick: function(info) {
    // alert('Clicked on: ' + info.event.title);
    // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
    // alert('Current view: ' + info.view.type);
    // // change the day's background color just for fun
    // info.el.style.backgroundColor = 'red';



     // var tooltip = new Tooltip(info.el, {
     //      title: info.event.extendedProps.title,
     //      placement: 'top',
     //      trigger: 'hover',
     //      container: 'body'
     //    });
   
// console.log(info.el.innerHTML);


// console.log(info.event.extendedProps.location);
console.log(info.event);
console.log(info.event.start);
console.log(info.event.start.toLocaleDateString());

if(info.event.extendedProps.location == undefined){
if(info.event.extendedProps.rpt == "Never"){
  fetchitcal(info.event.extendedProps.tid);
  // console.log(info.event.extendedProps.tid);
}
else{
  fetchitcalre(info.event.extendedProps.tno,info.event.start.toLocaleDateString('en-GB'));
  // console.log(info.event.extendedProps.tid);
}
}

else{
if(info.event.extendedProps.rpt == "Never"){
  fetchitcal2(info.event.id);
  // console.log(info.event.id);
}
else{
  fetchitcalre2(info.event.id,info.event.start);
  // console.log(info.event.id);
}
}






// $(info.el).attr('name', 'value');
// info.el.classList.add('tooli');

      // $(info.el).
      // // append('<span class="toolitext">Tooltip text</span>');
      // append('<div class="tooli">  &nbsp; &nbsp;<span class="toolitext">Tooltip text</span> </div>'); 
       
      // console.log(info.el.innerHTML);
  
  }
  ,

  

  eventSources: [

    Tasks.recurring,
    Events.recurring,
    Tasks.calnonrecurring,
    Events.calnonrecurring,
  ]
  ,
 });
    calendar.render();
  });

    </script>
    
    <script type="text/javascript" src="convdate.js"></script>
<script type="text/javascript" src="convnew.js"></script>

<script type="text/javascript" src="services/taskmgmt/fetchcal.js"></script>

<script type="text/javascript" src="services/taskmgmt/calutils.js"></script>


    <script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
function closeForm2() {
  document.getElementById("myModal2").style.display = "none";
}
function closeForm3() {
  document.getElementById("myModal64").style.display = "none";
}
function closeForm4() {
  document.getElementById("myModal56").style.display = "none";
}
</script>
  </aside>