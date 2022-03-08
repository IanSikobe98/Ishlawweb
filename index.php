 <?php
require "auth.php";
 ?>      
<!DOCTYPE html>
<html lang="en">  
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ISHLAW</title>

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
  <script src="https://jakubroztocil.github.io/rrule/dist/es5/rrule-tz.min.js"></script>
<!--    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">-->
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
</script>

</head>
<body onload="hidefunc()" class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div class="btn-group open">
       <a class="btn btn-primary" href="#"><i onclick="return logout()"  class="fa fa-power-off fa-fw "></i></a>
  
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
      <span class="brand-text font-weight-light">ISHLAW</span>
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
                  <i class="far fa-users"></i>
                  <p>My profile</p>
                </a>
              </li>
              <li class="nav-item " id = "newcli">
                <a href="reset.php" class="nav-link">
                  <i class="far fa-users"></i>
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
                  <i class="far fa-users"></i>
                  <p>Add New Staff</p>
                </a>
              </li>
              <li class="nav-item " id = "newcli">
                <a href="registration.php" class="nav-link">
                  <i class="far fa-users"></i>
                  <p>Add New Client</p>
                </a>
              </li>
              <li class="nav-item "  id="">
                <a href="staff.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Staff</p>
                </a>
              </li>
              <li class="nav-item "  id="cliview">
                <a href="customers.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
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
                  <i class="far fa-fa-edit"></i>
                  <p>Create New Task</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="events.php" class="nav-link">
                  <i class="far fa-fa-edit"></i>
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
                <span class="badge badge-info right">2</span>
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
            <a href="adv.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                New Case
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                New Task
                
          
              </p>
            </a>
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
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Latest Cases</h5>
                <div class="table-responsive">
                  <table class="table m-0" id="exe">
                    <thead>
                    <tr>
                      <th>Reference</th>
                      <th>Parties</th>
                      <th>Case Number</th>
                      <th>Date</th>
                      <th>Status</th>

                    </tr>
                    </thead>
                    <tbody>
                        <script type="text/javascript">
$(document).ready( function () {
    $('#exe').DataTable();

} );
 </script>
                    </tbody>

                  </table>
                
                </div>
<script src="services/cases/IndexCases.js"></script>
                <div class="card-footer clearfix">
                <a href="adv.php" class="btn btn-sm btn-info float-left"> New Case</a>
                <a href="widgets.php" class="btn btn-sm btn-secondary float-right">View All Cases</a>
              </div>
              <!-- /.card-header -->
              
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->      
             <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX panelE -->
            <div style="overflow-x:auto;"class="card">
              <div class="card-header">
                <h3 class="card-title">Upcoming Events</h3>
              </div>
<style type="text/css">
 #events {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#events td, #events th {
  border: 1px solid #ddd;
  padding: 6px;
}

#events tr:nth-child(even){background-color: #f2f2f2;}

#events tr:hover {background-color: #ddd;}

#events th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
 }
</style>
<table  id="events" >
            <thead>
                <tr>
        
        <th>Activity</th>
        <th>Priority</th>
        <th>Location</th>
        <th>Progress</th>
        <th>Client</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Action</th>
        
                </tr>
            </thead>


            <tbody>


<script type="text/javascript">
$(document).ready( function () {
    $('#events').DataTable();

} );
 </script>

<script type="text/javascript">

function getnonrec (input) {

var current = new Date(input);
current = current.toLocaleString()
console.log(current);
return current;
}

</script>

<tbody>

</table>

<div class="form-popup" id="myForm">
  <!-- action="services\taskmgmt\postservice\updatetasks.php" -->
  <form  id ="ianform2" method="POST" class="form-container" onsubmit="return sendreload(FormSubmit.agendapost,'ianform2');">
    <p><b>Update your task progress</b></p>
<label for="tid"><b>Task Id</b></label>
    <input type="text" id="items" placeholder="Enter Task Id" value="" name="tid" readonly required>

    <label for="descri"><b>Title</b></label>
    <input type="text" id="title" placeholder="Update your task title" name="title" required>

     <label for="dueda"><b>Due Date</b></label>
    <input type="text" id="dueda"placeholder="Update your task progress" name="start" required>

<label for="descri"><b>Progress</b></label>
    <input type="text"  id="descri" placeholder="Update your task progress" name="descri" >

    <label for="clino">Assigned To</label>
                  <input type="text" class="form-control select2" id="user" required="" name="user" readonly="" placeholder="Enter your name">


    <label for="clino">Client Name</label>
                  <input type="text" class="form-control select2" required="" id="cli" name="clino" placeholder="Enter Client's Name">

           <label for="clino">How To</label>
                  <input type="text" class="form-control select2" required="" id="hotodo" name="hotodo" placeholder="How To">



<label for="prior"><b>Task Priority</b></label>
                  <select id="prior" name="prio"  required="" class="form-control select2" style="">
                    <option selected="selected">Select Task Priority</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                  </select> <br>

    <label for="prog"><b>Task Status</b></label>
                  <select id="prog" name="stat" required=""  class="form-control select2" style="">
                    <option selected="selected">Select Task Status</option>
                    <option value="Not Started">Not Started</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                  </select> <br>

                  <label for="clino">General Comments</label>
                  <input type="text" class="form-control select2"  id="comment" name="comment" placeholder="Enter Company Remarks">


              <label for="rpt">Repeat Frequency</label>
                  <select id="rpt" name="rpt"  class="form-control select2" style="" required="">
                    <option selected="selected">Select Task Frequency</option>
                    <option value="Never">Never</option>
                    <option value="Daily">Daily</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Every Two Weeks">Every Two Weeks</option>
                    <option value="Weekdays">Weekdays</option>
                  </select> <br>    

                   <label for="rptun">Repeat Until</label>
                   <input type="Date" class="form-control"  id="rptun" name="rptun" placeholder="Please Select Date"><br>
    <button type="submit" name="submit" class="btn">Save</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
  <div class="form-popup" id="myModal2">
    <!-- action="services\taskmgmt\postservice\updatetasks.php"  -->
  <form method="POST"  id ="ianform" class="form-container"
  onsubmit="return sendreload(FormSubmit.agendapost,'ianform');">
    <p><b>Update your task progress</b></p>
<label for="tid"><b>Task Id</b></label>
    <input type="text" id="items1" placeholder="Enter Task Id" value="" name="tid" readonly required>

    <label for="descri"><b>Title</b></label>
    <input type="text" id="title1" placeholder="Update your task title" name="title" required>

     <label for="dueda"><b>Due Date</b></label>
    <input type="text" id="dueda1"placeholder="Update your task progress" name="start" required="">

<label for="descri"><b>Progress</b></label>
    <input type="text"  id="descri1" placeholder="Update your task progress" name="descri" >

    <label for="clino">Assigned To</label>
                  <input type="text" class="form-control select2" id="user1" name="user" readonly="" placeholder="Enter Client's Name">


    <label for="clino">Client Name</label>
                  <input type="text" class="form-control select2" id="clino" required="" name="clino" placeholder="Enter Client's Name">

 <label for="clino">How To</label>
                  <input type="text" class="form-control select2" required="" id="hotodo1" name="hotodo" placeholder="How To">


<label for="prior"><b>Task Priority</b></label>
                  <select id="prior1" name="prio"  class="form-control select2" style="" required="">
                    <option selected="selected">Select Task Priority</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                  </select> <br>

    <label for="prog"><b>Task Status</b></label>
                  <select id="prog1" name="stat"  class="form-control select2" style="" required="">
                    <option selected="selected">Select Task Status</option>
                    <option value="Not Started">Not Started</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                  </select> <br>

<label for="clino">General Comments</label>
                  <input type="text" class="form-control select2"  id="comment1" name="comment" placeholder="Enter Company Remarks">

              <label for="rpt">Repeat Frequency</label>
                  <select id="rpt1" name="rpt"  class="form-control select2" style="" required="">
                    <option selected="selected">Select Task Frequency</option>
                    <option value="Never">Never</option>
                    <option value="Daily">Daily</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Every Two Weeks">Every Two Weeks</option>
                    <option value="Weekdays">Weekdays</option>
                  </select> <br>   

                  <label for="rpt">Save</label>
                  <select id="save" name="save1"  class="form-control select2" style="" required="">
                    <option selected="selected">Select Save Option</option>
                    <option value="One-time">One-time</option>
                    <option value="Full-group">Full-group</option>
                  </select> <br>    
 

                   <label for="rptun">Repeat Until</label>
                   <input type="Date" class="form-control" id="rptun1" name="rptun" placeholder="Please Select Date"><br>
    <button type="submit" name="submit" class="btn">Save</button>
    <button type="button" class="btn cancel" onclick="closeForm2()">Close</button>
  </form>
</div>

<div id="myModal" class="modal">

  <div class="modal-content">
    <span id="close" class="close">&times;</span>
    
    <h6 id = "status" style="color:green;"></h6>
      <h6 id = "status3" style="color:green;"></h6>
      
  </div>
  
</div>

</div>

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

</body> 

</html>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <i class="fas fa-plus"></i><a href="calendar.php"> View Office Schedule</a>
              </div>
            </div>
                
            
            <!-- /.card -->
            
            <!-- TABLE: LATEST ORDERS -->
            
            <!-- /.card -->
          

          <!-- /.col -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            
            <!-- /.info-box -->
            
              <!-- /.info-box-content -->
            
            <!-- /.info-box -->
<div class="card-body pt-0">
                <!--The calendar -->
                
              </div>
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Calendar</h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

               
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i></button>
                    <div class="dropdown-menu" role="menu">
                      <a href="events.php" class="dropdown-item">Add new event</a>
                      <div class="dropdown-divider"></div>
                      <a href="calendar.php" class="dropdown-item">View calendar</a>
                    </div>
                    
              </div>
              <!-- /.card-header -->
              <div id='calendar'></div>
            <!-- /.card -->

            <!-- PRODUCT LIST -->

            
      </div>
            </div>
            
      <!--/. container-fluid -->


    </section>

          <!-- Left col -->
          <div class="">
            <!-- MAP & BOX panelE -->
            <div style="overflow-x:auto;" class="card">
              <div class="card-header">
                <h3 class="card-title">Your Agenda</h3>
              </div>
<style type="text/css">
 #table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#table td, #table th {
  border: 1px solid #ddd;
  padding: 6px;
}

#table tr:nth-child(even){background-color: #f2f2f2;}

#table tr:hover {background-color: #ddd;}

#table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
 }
</style>
<table  id="table">
            <thead>
                <tr>
        
        <th>Task</th>
        <th>Due Date</th>
        <th>Priority</th>
        <th>How To</th>
        <th>Progress</th>
        <th>Status</th>
        <th>Comments</th>
        <th>Action</th>

        
                </tr>
            </thead>

<tbody>

</table>
<script type="text/javascript">

function getnonrec (input) {

var current = new Date(input);
current = current.toLocaleString()
console.log(current);
return current;
}
</script>
<!--</tbody>-->
<!-- <script type="text/javascript" src="ishfinal/Calender/recdafetchev.js"></script> -->




<script type="text/javascript">

$(document).ready( function () {
    $('#table').DataTable();


} );
 </script>
 
</form>
     <div class="card-footer clearfix">
                <i class="fas fa-plus"></i><a href="calendar.php"> View Office Events</a>
              </div>
            </div>
            </form>   

 
<div class="form-popup" id="myModal64">
  <form id="eventform"onsubmit="return sendreload(FormSubmit.agendapostev,'eventform');" method="POST" class="form-container">
    <p><b>Update Event progress</b></p>
<label for="tid"><b>Event Id</b></label>
    <input type="text" id="items3" placeholder="Enter Task Id" value="" name="eid" readonly required>

    <label for="descri"><b>Activity</b></label>
    <input type="text" id="title3" placeholder="Update your task title" name="title" required>

    <label for="prior"><b>Event Priority</b></label>
                  <select id="prior3" name="prio"  required="" class="form-control select2" style="">
                    <option selected="selected">Select Event Priority</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                  </select> <br>

<label for="rpt">Repeat Frequency</label>
                  <select id="rpt3" name="rpt"  class="form-control select2" style="" required="">
                    <option selected="selected">Select Task Frequency</option>
                    <option value="Never">Never</option>
                    <option value="Daily">Daily</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Every Two Weeks">Every Two Weeks</option>
                    <option value="Weekdays">Weekdays</option>
                  </select> <br>



<label for="descri"><b>User</b></label>
    <input type="text"  id="user3" placeholder="Assigned To" name="user" required="" >

    <label for="clino">location</label>
                  <input type="text" class="form-control select2" id="loc3" required="" name="loc" readonly="" placeholder="Event Location" required="">


    <label for="clino">Event Progress</label>
                  <input type="text" class="form-control select2" required="" id="descri3" name="descri" placeholder="Update Event Progress">

                  <label for="dueda"><b>Client</b></label>
    <input type="text" id="clino3"placeholder="Client's Name" name="clino" required>

    <label for="dueda"><b>Color</b></label>
    <input type="text" id="col3"placeholder="Choose Event colour" name="color" required>





    <label for="dueda"><b>Start Time</b></label>
    <input type="datetime-local" class="form-control" id="start3"placeholder="Update your event start time" name="start" required>

    <label for="dueda"><b>End Time</b></label>
    <input type="datetime-local" class="form-control" id="end3"placeholder="Update your event end time" name="end" >


                   <label for="rptun">Repeat Until</label>
                   <input type="Date" class="form-control"  id="rptun3" name="rptun" placeholder="Please Select Date"><br>
    <button type="submit" name="submit" class="btn">Save</button>
    <button type="button" class="btn cancel" onclick="closeForm3()">Close</button>

  </form>
</div>
   <div class="form-popup" id="myModal56">
  <form onsubmit="return sendreload(FormSubmit.agendapostev,'eventrecsubmit');" id ="eventrecsubmit"  method="POST" class="form-container">
    <p><b>Update your Event progress</b></p>
<label for="tid"><b>Event Id</b></label>
    <input type="text" id="items4" placeholder="Enter Task Id" value="" name="eid" readonly required>

    <label for="descri"><b>Activity</b></label>
    <input type="text" id="title4" placeholder="Update your task title" name="title" required>

    <label for="prior"><b>Event Priority</b></label>
                  <select id="prior4" name="prio"  required="" class="form-control select2" style="">
                    <option selected="selected">Select Event Priority</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                  </select> <br>

<label for="rpt">Repeat Frequency</label>
                  <select id="rpt4" name="rpt"  class="form-control select2" style="" required="">
                    <option selected="selected">Select Task Frequency</option>
                    <option value="Never">Never</option>
                    <option value="Daily">Daily</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Every Two Weeks">Every Two Weeks</option>
                    <option value="Weekdays">Weekdays</option>
                  </select> <br>



<label for="descri"><b>User</b></label>
    <input type="text"  id="user4" placeholder="Update your task progress" name="user" >

    <label for="clino">location</label>
                  <input type="text" class="form-control select2" id="loc4" required="" name="loc" readonly="" placeholder="Enter your name">


    <label for="clino">Event Progress</label>
                  <input type="text" class="form-control select2" required="" id="descri4" name="descri" placeholder="Enter Client's Name">

                  <label for="dueda"><b>Client</b></label>
    <input type="text" id="clino4"placeholder="Update your task progress" name="clino" required>

    <label for="dueda"><b>Color</b></label>
    <input type="text" id="col4"placeholder="Update your task progress" name="color" required>





    <label for="dueda"><b>Start Time</b></label>
    <input type="datetime-local" class="form-control" id="start4"placeholder="Update your task progress" name="start" required>

    <label for="dueda"><b>End Time</b></label>
    <input type="datetime-local" class="form-control" id="end4"placeholder="Update your task progress" name="end" required>
    <label for="rpt">Save</label>
                  <select id="save" name="save1"  class="form-control select2" style="" required="">
                    <option selected="selected">Select Save Option</option>
                    <option value="One-time">One-time</option>
                    <option value="Full-group">Full-group</option>
                  </select> <br>


                   <label for="rptun">Repeat Until</label>
                   <input type="Date" class="form-control"  id="rptun4" name="rptun" placeholder="Please Select Date"><br>
    <button type="submit" name="submit" class="btn">Save</button>
    <button type="button" class="btn cancel" onclick="closeForm4()">Close</button>
  </form>
</div>
            <!-- /.card -->

            <!-- TABLE: LATEST ORDERS -->            <!-- /.card -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            
            <!-- /.info-box -->
            
              <!-- /.info-box-content -->
            
            <!-- /.info-box -->
<div class="card-body pt-0">
                <!--The calendar -->
                
              </div>

    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.css' rel='stylesheet' />
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.2.0/main.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.2.0/main.min.js'></script>
        <!-- <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/rrule@5.2.0/main.global.min.js'></script> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="tr.css"> -->

        <script    src='https://cdn.jsdelivr.net/npm/rrule@2.6.4/dist/es5/rrule.min.js'></script>
<script src="https://jakubroztocil.github.io/rrule/dist/es5/rrule-tz.min.js"></script>

<!-- the rrule-to-fullcalendar connector. must go AFTER the rrule lib -->
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/rrule@5.2.0/main.global.min.js'></script>
 <!-- <script type="text/javascript" src="http://localhost/ishfinal/Calender/modi.js"></script> -->








 <!-- Boootstrap and css links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    




<!-- Calender Script(Very Important) -->
<script>


  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      selectable: true,
      initialView: 'dayGridMonth',
      
     
      dayMaxEvents: true,
      headerToolbar: {
       // left: 'prevYear,prev,next,nextYear today',
        //center: 'title',
        //right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },



eventDidMount: function(info) {

  console.log(info.event);

},



  eventSources: [
  Tasks.nonrecurring
  ]
  ,
 });
    calendar.render();
  });

    </script>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!--<script src="plugins/jquery/jquery.min.js"></script>-->
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
<!--<script src="plugins/jquery/jquery.min.js"></script>-->
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="dist/js/demo.js"></script>
<script type="text/javascript">

  //Window on load function
  function hidefunc(){

      var reloading1 ='<?php if(isset($_COOKIE["loginsuccess"])){
          echo $_COOKIE["loginsuccess"];} ?>'
      document.cookie = "loginsuccess; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      //var deletereload = '<?php //setcookie("loginsuccess", "", time() - 3600);?>//'
     var counter = sessionStorage.getItem("counter")
      if (reloading1 && counter == 0) {
          counter++
          sessionStorage.setItem("counter",counter);

          swal({
              title: 'Great!',
              text: 'Login Successful!',
              icon: 'success',
              button: 'Close'

          });

          // document.getElementById('myModal').style.display = 'block';
          // document.getElementById('status').innerHTML = 'Tasks successfully saved';
          // document.getElementById('status3').innerHTML = '.<br><br>';
          //
          // document.getElementById('status').style.color= 'green';
      }

      var reloading = sessionStorage.getItem("submitsuccess");

    if (reloading) {
        sessionStorage.removeItem("submitsuccess");
             swal({
  title: 'Great!',
  text: 'Activity updated successfully!',
  icon: 'success',
  button: 'Close',
});

            }


    var perm = '<?php if(isset($_COOKIE["addvis"])){
     echo $_COOKIE["addvis"];} ?>'

    var addcli = '<?php if(isset($_COOKIE["addcli"])){
     echo $_COOKIE["addcli"];} ?>'

     var viewcli = '<?php if(isset($_COOKIE["viewcli"])){
     echo $_COOKIE["viewcli"];} ?>'

      var cli = '<?php if(isset($_COOKIE["cli"])){
     echo $_COOKIE["cli"];} ?>'

          var viewvis = '<?php if(isset($_COOKIE["viewvis"])){
     echo $_COOKIE["viewvis"];} ?>'

      var vis = '<?php if(isset($_COOKIE["vis"])){
     echo $_COOKIE["vis"];} ?>'



      var fna = '<?php if(isset($_COOKIE["fna"])){
     echo $_COOKIE["fna"];} ?>'

     var sna = '<?php if(isset($_COOKIE["sna"])){
     echo $_COOKIE["sna"];} ?>'

     var role = '<?php if(isset($_COOKIE["role"])){
     echo $_COOKIE["role"];} ?>'

console.log(fna)
var fullna = fna.concat(" ");
document.getElementById("usern").innerHTML =fullna.concat(sna);
document.getElementById("role1").innerHTML = role;
    console.log(perm);

    if(perm =="addvisitors")
    {
      console.log("allowed")
document.getElementById("visit").style.display ="block";
      document.getElementById("visitadd").style.display ="block";

    }

    if(viewvis =="viewvisitors")
    {
      console.log("allowed")
document.getElementById("visit").style.display ="block";
      document.getElementById("visitvi").style.display ="block";

    }



        if(addcli =="addclients")
    {
      console.log("allowed")

     document.getElementById("client4").style.display ="block";
      document.getElementById("cliadd").style.display ="block";

    }

            if(viewcli =="viewclients")
    {
      console.log("allowed")

     document.getElementById("client4").style.display ="block";
      document.getElementById("viewedit").style.display ="block";

    }
  }
  
</script>
<script type="text/javascript" src="modi.js"></script>
</body>
</html>
