     <?php

require "sec/vendor/autoload.php";
use \Firebase\JWT\JWT;
// Initialize the session
$jwt = new \Firebase\JWT\JWT;
$jwt::$leeway = 5;
 
// Check if the user is logged in, if not then redirect him to login page
// !isset($_COOKIE["jwt"]) && !isset($_COOKIE["log"])

session_start();
 
// Check if the user is logged in, if not then redirect him to login page

if(!isset($_COOKIE["resp"]) || !isset($_SESSION["id"])){
  header('location: login.php');
   exit;


echo ($_COOKIE["jwt"]);

}

else
{


// if(verify($_COOKIE["resp"])==true)

// {
  $secret_key = "-----BEGIN PUBLIC KEY-----

MIIBITANBgkqhkiG9w0BAQEFAAOCAQ4AMIIBCQKCAQBo7XX/N2WuOUtnB1zW/xoi
Juz5/Lh0NXORSx3eo0cKcMoSghxpoPDeL21+mluVDeHr37VVbl25P9ItwWfRcCKl
GBuM4WPS6k6b83zzNlRHGoJL9mooj27Cn8mc2elCBbBkbDi6t0NEXYbVrINtyU2x
F9yaUkryveNOwwUd6t1mjeF8H8xKU3SBc+E3Vm+gzpV/6ED78PdAaVBKvVxNQEMX
b01tKzMMwzfY3K1IA5jbVY5tHNCbc/EA/9UqzV4awH1o35v12Q1oCb28und0eJ33
D5KHVUmIZcLQgG6ivP1mmPoZ3O0udPzN2Qnm1mepQp/oNsY0V4VSt/hcqXHwyY5H
AgMBAAE=
-----END PUBLIC KEY-----";

$jwt = null;
$jwt = htmlspecialchars($_COOKIE["resp"]);

if($jwt){

    try {

        $decoded = JWT::decode($jwt, $secret_key, array('RS256'));

        // Access is granted. Add code of the operation here 

        // echo json_encode(array(
        //     "message" => "Access granted:",
        //     "data" => $decoded 
        // ));

      
     // echo $pop["Team"];
     // echo $decoded->Team->name;
     // setcookie('pop', json_encode($decoded->Team->Permissions[0]->name),time() + (30), 'http://localhost/admin/','','');
     // $_COOKIE['pop'] = json_encode($decoded->Team->Permissions[0]->name);



     $arr2 = json_decode(json_encode($decoded->Team->Permissions), true);
   

     setcookie('fna',$decoded->firstName,time() + (30), 'http://localhost/admin/','','');
     $_COOKIE['fna'] = $decoded->firstName;
     setcookie('sna',$decoded->secondName ,time() + (30), 'http://localhost/admin/','','');
     $_COOKIE['sna'] = $decoded->secondName;
    setcookie('role',$decoded->Team->name ,time() + (30), 'http://localhost/admin/','','');
     $_COOKIE['role'] = $decoded->Team->name;





      foreach($arr2 as $item) {
if ($item['name']== 'addvisitors') {
       setcookie('addvis', 'addvisitors',time() + (30), 'http://localhost/admin/','','');
     $_COOKIE['addvis'] = 'addvisitors';
}
if ($item['name']== 'addclients') {
       setcookie('addcli', 'addclients',time() + (30), 'http://localhost/admin/','','');
     $_COOKIE['addcli'] = 'addclients';
}

if ($item['name']== 'viewclients') {
       setcookie('viewcli', 'viewclients',time() + (30), 'http://localhost/admin/','','');
     $_COOKIE['viewcli'] = 'viewclients';
}

if ($item['name']== 'viewvisitors') {
       setcookie('viewvis', 'viewvisitors',time() + (30), 'http://localhost/admin/','','');
     $_COOKIE['viewvis'] = 'viewvisitors';
}

if ($item['name']== 'viewvisitors' || $item['name']== 'addvisitors') {
       setcookie('vis', 'visitors',time() + (30), 'http://localhost/admin/','','');
     $_COOKIE['vis'] = 'visitors';
}
if ($item['name']== 'addclients' || $item['name']== 'viewclients') {
       setcookie('cli', 'clients',time() + (30), 'http://localhost/admin/','','');
     $_COOKIE['cli'] = 'clients';
}


}
    }catch (Exception $e){

    http_response_code(401);

    echo json_encode(array(
        "message" => "Access denied by man.",
        "error" => $e->getMessage()
    ));
}

}
// }

// else{
//   header('location: login.php');
//    exit;


// echo ($_COOKIE["jwt"]);

// }

}



?>
  
<!DOCTYPE html>
<html lang="en">  
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ISHLAW</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="class.css" type="text/css" />

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="styling.css">
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
      
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for staff.." title="Type in a name">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="jquery-1.2.6.min.js"></script>
    
    <script src="jquery.tablesorter.js"></script>
       
    <script src="jquery.tablesorter.min.js"></script>
  <script src="jquery.tablesorter.widgets.js"></script>
  <script>
  $(function(){
    $('exe').tablesorter({
      widgets        : ['zebra', 'columns'],
      usNumberFormat : false,
      sortReset      : true,
      sortRestart    : true
    });
  });
  </script>


      <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#exe tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="logout.php" class="nav-link">Logout</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
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
          <li class="">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Accounts
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            
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
              <li class="nav-item cliadd1" id = "cliadd">   
                <a href="registration.php" class="nav-link">
                  <i class="far fa-users"></i>
                  <p>Add New Client</p>
                </a>
              </li>
              <li class="nav-item viewedit1"  id="viewedit">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Staff</p>
                </a>
              </li>
              <li class="nav-item viewedit1"  id="viewedit">
                <a href="" class="nav-link">
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
                <a href="tvents.php" class="nav-link">
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
          <li class="">
            
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
                New Matter
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
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Current Staff Members</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Staff</li>
            </ol>
          </div>
        </Section>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    
      <table class="table table-striped table-bordered table-hover tablesorter" id="exe">
    <thead >
      <tr>
        <th class="w3-button table-column">First Name</th>
        <th class="w3-button table-column">Last Name</th>
        <th >Phone Number <span class="glyphicon glyphicon-chevron-down"></span> </th>
        <th>Email</th>
        <th>Registration Date</th>
        <th>Role</th>
        <th>Action</th>
    </thead>
    <tbody>
      <tr class="warning">
        <td>John Downy</td>
        <td>0716587214</td>
        <td>john@example.com</td>
        <td>I need an appointment to settle my case tomorrow</td>
        <td>12.01-2022 10:00 a.m</td>
        <td>Pending</td>
        <td><button type="button" class="btn btn-success">Accept</button> <button type="button" class="btn btn-danger">Reject</button></td>
      </tr>
      <tr>
         <td>John Downy</td>
        <td>0716527214</td>
        <td>john@example.com</td>
        <td>I need an appointment to settle my case tomorrow</td>
        <td>12.01-2021 10:00 a.m</td>
        <td>Pending</td>
        <td><button type="button" class="btn btn-success">Accept</button> <button type="button" class="btn btn-danger">Reject</button></td>
      </tr>
      <tr>
         <td>John Downy</td>
        <td>0716527214</td>
        <td>john@example.com</td>
        <td>I need an appointment to settle my case tomorrow</td>
        <td>12.01-2021 10:00 a.m</td>
        <td>Pending</td>
        <td><button type="button" class="btn btn-success">Accept</button> <button type="button" class="btn btn-danger">Reject</button></td>
      </tr>
    </tbody>
  </table>
  <script>
    $(document).ready(function() 
        { 
            $("#exe").tablesorter({sortList: [[3,1],[2,0]]}); 
        } 
    );
    </script>
</div>

</section>
</div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
    </div>
     Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="jquery.tablesorter.js"></script>
       
    <script src="jquery.tablesorter.min.js"></script>
  <script src="jquery.tablesorter.widgets.js"></script>
  <script type="text/javascript">
    $(function(){
        $('#exe').tablesorter({
          sortList:[[0,0,[1,0]]]
        });


    });




  </script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="sort.js"></script>
  
<script type="text/javascript">
  function hidefunc(){
    
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

</body> 

</html>
