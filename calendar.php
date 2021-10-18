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
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<style type="text/css">
  .visit1{
    display: none;
  }

  .visitv1{
    display: none;
  }

  .visitadd1{
    display: none;
  }
    .client2{
    display: none;
  }
    .cliadd1{
    display: none;
  }

      .viewedit1{
    display: none;
  }
</style>

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
                Clients
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item cliadd1" id = "cliadd">   
                <a href="clients.php" class="nav-link">
                  <i class="far fa-users"></i>
                  <p>New Client</p>
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
                <a href="roster.php" class="nav-link">
                  <i class="far fa-user-circle"></i>
                  <p>View Visitors</p>
                </a>
              </li>
                  </ul>
          </li>

           <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-user-circle"></i>
                  <p>Personal Profile</p>
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
                <a href="kazi.php" class="nav-link">
                  <i class="far fa-edit"></i>
                  <p>View Current Tasks</p>
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




                      <li class="">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
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

 
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.css' rel='stylesheet' />
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.2.0/main.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.2.0/main.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/rrule@5.2.0/main.global.min.js'></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="tr.css"> -->

        <script    src='https://cdn.jsdelivr.net/npm/rrule@2.6.4/dist/es5/rrule.min.js'></script>
<script src="https://jakubroztocil.github.io/rrule/dist/es5/rrule-tz.min.js"></script>

<!-- the rrule-to-fullcalendar connector. must go AFTER the rrule lib -->
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/rrule@5.2.0/main.global.min.js'></script>


 <!-- Boootstrap and css links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="tr.css">




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
    'http://localhost/Admin/ishfinal/API/nonrecev.php',
    'http://localhost/Admin/ishfinal/API/recta.php',
'http://localhost/Admin/ishfinal/API/receve.php',

    'http://localhost/Admin/ishfinal/API/nonrecta.php',
  ]
  ,
 });
    calendar.render();
  });

    </script>
    <link rel="stylesheet" type="text/css" href="tbs.css">

    <script type="text/javascript" src="convdate.js"></script>
<script type="text/javascript" src="convnew.js"></script>
<script type="text/javascript">
  function rptcon(str){
// const str = '20210219T200011.';
var str =str;

var str2 = str.slice(0, 8)

console.log(str2);
// expected output: "quick brown fox"
var str3 = str.slice(0, 4)
var str4 = str.slice(4, 6)
var str5 = str.slice(6, 8)

console.log(str3);
console.log(str4);
console.log(str5);
var str6 = (str3+"-"+str4+"-"+str5)
console.log(str6);
return str6;
}

function stendcon(str){
  var str =str;

var str2 = str.slice(0, 8)

console.log(str2);
// expected output: "quick brown fox"
var str3 = str.slice(0, 2)
var str4 = str.slice(3, 5)
var str5 = str.slice(6, 10)
var str7 = str.slice(12, 21)

console.log(str3);
console.log(str4);
console.log(str5);
console.log(str7);
var str6 = (str5+"-"+str4+"-"+str3+"T"+str7)
console.log(str6);

return str6;
}


</script>
<script type="text/javascript" src="fetchcal.js"></script>
<script type="text/javascript">
  
  function convdate(str) {
// const str = '20210201';



console.log(str.slice(0,4));
// expected output: "the lazy dog."

console.log(str.slice(4, 6));
// expected output: "quick brown fox"

console.log(str.slice(6,8));

// expected output: "dog."
//var res = str1.concat(str2);

var str1 = str.slice(0,4);
var str2 =  str.slice(4,6);
var str3 =  str.slice(6,8);
var str4 = "-";

var res = str1.concat(str4);
var res = res.concat(str2);
var res = res.concat(str4);
var res = res.concat(str3);
console.log( "final");
console.log(res);


return res;
}


</script>    
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calendar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Calendar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div id='calendar'></div>

      <div class="form-popup" id="myForm">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-container">
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
                  <input type="text" class="form-control select2" required="" id="clino" name="clino" placeholder="Enter Client's Name">

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
                  <input type="text" class="form-control select2" required="" id="comment" name="comment" placeholder="Enter Company Remarks">



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
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"  class="form-container">
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
                  <input type="text" class="form-control select2" id="clino1" required="" name="clino" placeholder="Enter Client's Name">

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
                  <input type="text" class="form-control select2" required="" id="comment1" name="comment" placeholder="Enter Company Remarks">


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
                    <option selected="selected">Select Task Frequency</option>
                    <option value="One-time">One-time</option>
                    <option value="Full-group">Full-group</option>
                  </select> <br>    
 

                   <label for="rptun">Repeat Until</label>
                   <input type="Date" class="form-control" id="rptun1" name="rptun" placeholder="Please Select Date"><br>
    <button type="submit" name="submit" class="btn">Save</button>
    <button type="button" class="btn cancel" onclick="closeForm2()">Close</button>
  </form>
    <?php

// header('Access-Control-Allow-Origin: *');
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//database
// define('DB_HOST', '127.0.0.1');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'book');

// //get connection
// $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// if(!$mysqli){
//  die("Connection failed: " . $mysqli->error);
// }

// //query to get data from the table
// $query = sprintf("SELECT * FROM `book` ");

// //execute query
// $result = $mysqli->query($query);


$link = mysqli_connect("127.0.0.1", "root", "", "ishfinal");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['title']) && isset($_POST['start']) &&isset($_POST['stat']) && isset($_POST['prio']) && isset($_POST['descri']) && isset($_POST['rpt']) && isset($_POST['rptun']) && isset($_POST['user']) && isset($_POST['clino']) && isset($_POST['tid']) ){
  // && isset($_POST['matter'])

// Escape user inputs for security
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$start = mysqli_real_escape_string($link, $_REQUEST['start']);
// $last_name = mysqli_real_escape_string($link, $_REQUEST['surn_name']);




$stu = mysqli_real_escape_string($link, $_REQUEST['stat']);

$descri = mysqli_real_escape_string($link, $_REQUEST['descri']);
$prio = mysqli_real_escape_string($link, $_REQUEST['prio']);
$rpt = mysqli_real_escape_string($link, $_REQUEST['rpt']);
 
 $rptun= mysqli_real_escape_string($link, $_REQUEST['rptun']);
$clino = mysqli_real_escape_string($link, $_REQUEST['clino']);
// $matter = mysqli_real_escape_string($link, $_REQUEST['matter']);
 
$user = mysqli_real_escape_string($link, $_REQUEST['user']); 

$tid = mysqli_real_escape_string($link, $_REQUEST['tid']); 
// $user = count($_POST['user']);
  // echo "<script>$('#MyModal').modal('show')</script>";

 
// Attempt insert query execution
// , `matter`

if($rpt == "Never")
{

$sql = "  UPDATE `tasks`  
SET  `title` =  '$title',`start` =  '$start',`description` = '$descri', `rpt` =  '$rpt', `rpun` = '$rptun' ,`User` = '$user' ,`Priority` = '$prio', `clino` = '$clino',`status` =  '$stu'



WHERE `tid` = '$tid'  " ;

// $sql = "INSERT INTO `tasks`(`title`, `start`, `description`, `rpt`, `rpun`, `User`, `Priority`, `clino`, `status`) VALUES ('$title','$start', '$descri', '$rpt','$rptun', '$user','$prio','$clino','$stu') ";

// for($i=0;$i<$user; $i++){
// , '".$_POST['user'][$i]."'
// $sql .="('$title','$start', '$descri', '$rpt','$rptun', '$user','$prio','$clino','$stu'),";

// }
// $psql = rtrim($sql,',');

if(mysqli_query($link, $sql)){
//    echo "Task updated successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

}

else
{
 $start=str_replace("-", "", $start);
 $rptun =str_replace("-", "", $rptun);

$sql = "INSERT INTO `iant`(`title`, `start`, `description`, `rpt`, `rpun`, `User`, `Priority`, `clino`, `status`) VALUES ('$title','$start', '$descri', '$rpt','$rptun', '$user','$prio','$clino','$stu') ";

// for($i=0;$i<$user; $i++){
// , '".$_POST['user'][$i]."'
// $sql .="('$title','$start', '$descri', '$rpt','$rptun', '$user','$prio','$clino','$stu'),";

// }
// $psql = rtrim($sql,',');


$sql2 = "DELETE FROM `tasks` WHERE `tid` = '$tid'" ;

if(mysqli_query($link, $sql)){
 //   echo "Records added successfully.";


    if(mysqli_query($link, $sql2)){
   // echo "Records added successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 mysqli_close($link);

}

else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}



}
}







?>
</div>
<div class="form-popup" id="myModal64">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-container">
    <p><b>Update your task progress</b></p>
<label for="tid"><b>Task Id</b></label>
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
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-container">
    <p><b>Update your task progress</b></p>
<label for="tid"><b>Task Id</b></label>
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
                    <option selected="selected">Select Task Frequency</option>
                    <option value="One-time">One-time</option>
                    <option value="Full-group">Full-group</option>
                  </select> <br>


                   <label for="rptun">Repeat Until</label>
                   <input type="Date" class="form-control"  id="rptun4" name="rptun" placeholder="Please Select Date"><br>
    <button type="submit" name="submit" class="btn">Save</button>
    <button type="button" class="btn cancel" onclick="closeForm4()">Close</button>
  </form>
               <?php


$link = mysqli_connect("127.0.0.1", "root", "", "ishfinal");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


if(isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) &&isset($_POST['color']) && isset($_POST['prio']) && isset($_POST['descri']) && isset($_POST['rpt']) && isset($_POST['rptun'])&& isset($_POST['loc'])  && isset($_POST['user']) && isset($_POST['clino']) && isset($_POST['eid'])){


$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$start = mysqli_real_escape_string($link, $_REQUEST['start']);
$end = mysqli_real_escape_string($link, $_REQUEST['end']);
// $last_name = mysqli_real_escape_string($link, $_REQUEST['surn_name']);




$color = mysqli_real_escape_string($link, $_REQUEST['color']);

$descri = mysqli_real_escape_string($link, $_REQUEST['descri']);
$prio = mysqli_real_escape_string($link, $_REQUEST['prio']);
$rpt = mysqli_real_escape_string($link, $_REQUEST['rpt']);
 
 $rptun= mysqli_real_escape_string($link, $_REQUEST['rptun']);
$clino = mysqli_real_escape_string($link, $_REQUEST['clino']);
$eid = mysqli_real_escape_string($link, $_REQUEST['eid']);
$loc = mysqli_real_escape_string($link, $_REQUEST['loc']);




$user = mysqli_real_escape_string($link, $_REQUEST['user']); 

$d1 = new DateTime($start);
$d2 = new DateTime($end);
$interval = $d2->diff($d1);

$popwert = $interval->format(':%I:%S');
// echo "<br>";
// echo $popwert;
// echo "<br>";

//calculate hours in duration
 $poprat = $interval->format('%d');
 $popguy = $interval->format('%H');
$poprat= (($poprat *24)+$popguy);
if ($poprat<10){
  //combine to get duration
$popfinal ="0".$poprat . $popwert ;
}
else{
  //combine to get durationmy
  $popfinal =$poprat . $popwert ;
}

// echo $popfinal;
// echo "<br>";  

// echo "<br>";


if($rpt == "Never")
{

$sql = "UPDATE `events` SET `title`='$title',`start`='$start',`color`='$color',`end`='$end',`priority`='$prio',`rpt`='$rpt',`rptun`='$rptun',`user`='$user',`location`='$loc',`description`='$descri',`clino`='$clino',`duration`='$popfinal' WHERE `id`='$eid'";

if(mysqli_query($link, $sql)){
//    echo "Event updated successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

}






else{
//Find start time for rptun

  // echo $start;
  //   echo "<br>";
  //   echo "<br>";
  // echo $end;
  // echo "<br";
$markg = strval($start);
$markg =str_split(strval($start), 11);
$finrpt= $markg[1] ;


//rewrite start time
 $start=str_replace("-", "", $start);
 $start=str_replace(":", "", $start);
 // $start = $start . "00" ;

//  echo $start;
// echo "<br>";

// echo "<br>";

//rewrite end time
 $end=str_replace("-", "", $end);
 $end=str_replace(":", "", $end);
 // $end = $end . "00" ;
//  echo $end;
// echo "<br>";

// echo "<br>";




function addZero589($str){
if(strlen($str)<15){
  $str2 = $str . "00";
return $str2;
}

else{
  return $str;
}


}


function addZero689($str){
if(strlen($str)<8){
  $str2 = $str . "00";
return $str2;
}

else{
  return $str;
}
}

$start = addZero589($start);
$end = addZero589($end);
$finrpt = addZero689($finrpt);


//  echo $start;
// echo "<br>";

// echo "<br>";

//  echo $end;
// echo "<br>";

// echo "<br>";

//  echo $finrpt;
// echo "<br>";

// echo "<br>";


//rewrite rptun
 $rptun =  str_replace("-", "", $rptun);
 $rptun = $rptun . "T" . $finrpt; 
 $rptun =  str_replace(":", "", $rptun);
// echo $rptun;



 // echo "thr"."ee";
// Attempt insert query execution
$sql = "INSERT INTO `iane`(`title`, `start`, `color`, `end`, `priority`, `rpt`, `rptun`, `user`, `location`, `description`, `clino`,duration) VALUES ('$title','$start', '$color','$end', '$prio', '$rpt','$rptun', '$user','$loc','$descri','$clino','$popfinal') ";


$sql2 = "DELETE FROM `events` WHERE `id` = '$eid'" ;

if(mysqli_query($link, $sql)){
    //echo "Records added successfully.";


    if(mysqli_query($link, $sql2)){
   // echo "Records added successfully.";

} else{
 //   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 mysqli_close($link);

}

else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}




}


 
$link = mysqli_connect("127.0.0.1", "root", "", "ishfinal");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


if(isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) &&isset($_POST['color']) && isset($_POST['prio']) && isset($_POST['descri']) && isset($_POST['rpt']) && isset($_POST['rptun'])&& isset($_POST['loc'])  && isset($_POST['user']) && isset($_POST['clino']) && isset($_POST['eid']) && isset($_POST['save1'])){


$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$start = mysqli_real_escape_string($link, $_REQUEST['start']);
$end = mysqli_real_escape_string($link, $_REQUEST['end']);
// $last_name = mysqli_real_escape_string($link, $_REQUEST['surn_name']);




$color = mysqli_real_escape_string($link, $_REQUEST['color']);

$descri = mysqli_real_escape_string($link, $_REQUEST['descri']);
$prio = mysqli_real_escape_string($link, $_REQUEST['prio']);
$rpt = mysqli_real_escape_string($link, $_REQUEST['rpt']);
 
 $rptun= mysqli_real_escape_string($link, $_REQUEST['rptun']);
$clino = mysqli_real_escape_string($link, $_REQUEST['clino']);
$eid = mysqli_real_escape_string($link, $_REQUEST['eid']);
$loc = mysqli_real_escape_string($link, $_REQUEST['loc']);




$user = mysqli_real_escape_string($link, $_REQUEST['user']); 
$save1 = mysqli_real_escape_string($link, $_REQUEST['save1']);


$d1 = new DateTime($start);
$d2 = new DateTime($end);
$interval = $d2->diff($d1);

$popwert = $interval->format(':%I:%S');
// echo "<br>";
// echo $popwert;
// echo "<br>";

//calculate hours in duration
 $poprat = $interval->format('%d');
 $popguy = $interval->format('%H');
$poprat= (($poprat *24)+$popguy);
if ($poprat<10){
  //combine to get duration
$popfinal ="0".$poprat . $popwert ;
}
else{
  //combine to get duration
  $popfinal =$poprat . $popwert ;
}
// echo "Duration";

// echo "<br>";
// echo $popfinal;
// echo "<br>";

// echo "<br>";




if($save1 == 'Full-group')
{

  if($rpt == "Never"){
$sql = "INSERT INTO `events`(`title`, `start`, `color`, `end`, `priority`, `rpt`, `rptun`, `user`, `location`, `description`, `clino`, `duration`) VALUES ('$title','$start', '$color','$end', '$prio', '$rpt','', '$user','$loc','$descri','$clino','$popfinal') ";

$sql2 = "DELETE FROM `iane` WHERE `id` = '$eid'" ;

if(mysqli_query($link, $sql)){
//    echo "Records added successfully.";


    if(mysqli_query($link, $sql2)){
  //  echo "Records deleted successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


}

else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

 mysqli_close($link);


  }


    else
  {
//Find start time for rptun

  // echo $start;
  //   echo "<br>";
  //   echo "<br>";
  // echo $end;
  // echo "<br";
$markg = strval($start);
$markg =str_split(strval($start), 11);
$finrpt= $markg[1] ;


//rewrite start time
 $start=str_replace("-", "", $start);
 $start=str_replace(":", "", $start);
 // $start = $start . "00" ;

//  echo $start;
// echo "<br>";

// echo "<br>";

//rewrite end time
 $end=str_replace("-", "", $end);
 $end=str_replace(":", "", $end);
 // $end = $end . "00" ;
//  echo $end;
// echo "<br>";

// echo "<br>";




function addZero($str){
if(strlen($str)<15){
  $str2 = $str . "00";
return $str2;
}

else{
  return $str;
}


}


function addZero2($str){
if(strlen($str)<8){
  $str2 = $str . "00";
return $str2;
}

else{
  return $str;
}
}

$start = addZero($start);
$end = addZero($end);
$finrpt = addZero2($finrpt);


//  echo $start;
// echo "<br>";

// echo "<br>";

//  echo $end;
// echo "<br>";

// echo "<br>";

//  echo $finrpt;
// echo "<br>";

// echo "<br>";


//rewrite rptun
 $rptun =  str_replace("-", "", $rptun);
 $rptun = $rptun . "T" . $finrpt; 
 $rptun =  str_replace(":", "", $rptun);
//echo $rptun;

$sql = "UPDATE `iane` SET `title`='$title',`start`='$start',`color`='$color',`end`='$end',`priority`='$prio',`rpt`='$rpt',`rptun`='$rptun',`user`='$user',`location`='$loc',`description`='$descri',`clino`='$clino',`duration`='$popfinal' WHERE `id`='$eid'";

if(mysqli_query($link, $sql)){
//    echo "Records updated successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);




   }

}



if($save1 == 'One-time')
{

 $start=str_replace("-", "", $start);
 $start=str_replace(":", "", $start);
function addZero5($str){
if(strlen($str)<15){
  $str2 = $str . "00";
return $str2;
}

else{
  return $str;
}


}

$start = addZero5($start);

$sql = "INSERT INTO `exludent`(`id`, `date`) VALUES ('$eid','$start') ";

if(mysqli_query($link, $sql)){
 //   echo "Records updated successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


   if($rpt == "Never"){
 
$sql2 = "INSERT INTO `events`(`title`, `start`, `color`, `end`, `priority`, `rpt`, `rptun`, `user`, `location`, `description`, `clino`, `duration`) VALUES ('$title','$start', '$color','$end', '$prio', '$rpt','', '$user','$loc','$descri','$clino','$popfinal') ";


if(mysqli_query($link, $sql2)){
  //  echo "Records updated successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

         }


    else{
  // echo $start;
  //   echo "<br>";
  //   echo "<br>";
  // echo $end;
  // echo "<br";
$markg = strval($start);
$markg =str_split(strval($start), 11);
$finrpt= $markg[1] ;


//rewrite start time
 $start=str_replace("-", "", $start);
 $start=str_replace(":", "", $start);
 // $start = $start . "00" ;

//  echo $start;
// echo "<br>";

// echo "<br>";

//rewrite end time
 $end=str_replace("-", "", $end);
 $end=str_replace(":", "", $end);
 // $end = $end . "00" ;
//  echo $end;
// echo "<br>";

// echo "<br>";




function addZero($str){
if(strlen($str)<15){
  $str2 = $str . "00";
return $str2;
}

else{
  return $str;
}


}


function addZero2($str){
if(strlen($str)<8){
  $str2 = $str . "00";
return $str2;
}

else{
  return $str;
}
}

$start = addZero($start);
$end = addZero($end);
$finrpt = addZero2($finrpt);


//  echo $start;
// echo "<br>";

// echo "<br>";

//  echo $end;
// echo "<br>";

// echo "<br>";

//  echo $finrpt;
// echo "<br>";

// echo "<br>";


//rewrite rptun
 $rptun =  str_replace("-", "", $rptun);
 $rptun = $rptun . "T" . $finrpt; 
 $rptun =  str_replace(":", "", $rptun);
//echo $rptun;


$sql4 = "INSERT INTO `iane`(`title`, `start`, `color`, `end`, `priority`, `rpt`, `rptun`, `user`, `location`, `description`, `clino`,duration) VALUES ('$title','$start', '$color','$end', '$prio', '$rpt','$rptun', '$user','$loc','$descri','$clino','$popfinal') ";

if(mysqli_query($link, $sql4)){
  //  echo "Records updated successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}

mysqli_close($link);

         }  

}


// }
// }


// else{
//  echo "not enough";

// }




    ?>
</div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="plugins/moment/moment.min.js"></script>
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
