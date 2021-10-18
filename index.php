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
   

     setcookie('fna',$decoded->firstName,time() + (30), 'http://localhost/admin//','','');
     $_COOKIE['fna'] = $decoded->firstName;
     setcookie('sna',$decoded->secondName ,time() + (30), 'http://localhost/admin//','','');
     $_COOKIE['sna'] = $decoded->secondName;
    setcookie('role',$decoded->Team->name ,time() + (30), 'http://localhost/admin//','','');
     $_COOKIE['role'] = $decoded->Team->name;





      foreach($arr2 as $item) {
if ($item['name']== 'addvisitors') {
       setcookie('addvis', 'addvisitors',time() + (30), 'http://localhost/admin//','','');
     $_COOKIE['addvis'] = 'addvisitors';
}
if ($item['name']== 'addclients') {
       setcookie('addcli', 'addclients',time() + (30), 'http://localhost/admin//','','');
     $_COOKIE['addcli'] = 'addclients';
}

if ($item['name']== 'viewclients') {
       setcookie('viewcli', 'viewclients',time() + (30), 'http://localhost/admin//','','');
     $_COOKIE['viewcli'] = 'viewclients';
}

if ($item['name']== 'viewvisitors') {
       setcookie('viewvis', 'viewvisitors',time() + (30), 'http://localhost/admin//','','');
     $_COOKIE['viewvis'] = 'viewvisitors';
}

if ($item['name']== 'viewvisitors' || $item['name']== 'addvisitors') {
       setcookie('vis', 'visitors',time() + (30), 'http://localhost/admin//','','');
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
                <h5 class="card-title">Latest Matters</h5>
                <div class="table-responsive">
                  <table class="table m-0">
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
                    <tr>
                      <td><a >9842</a></td>
                      <td>KRA vs OTS</td>
                      <td>23456</td>
                      <td>23-01-2021</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">PENDING</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a >1848</a></td>
                      <td>CAK vs LSK </td>
                     
                      <td>1848</span></td>
                      <td>01-01-2021</td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">Awaiting ruling</div>
                      </td>
                    </tr>
                    <tr>
                      <td>7429</td>
                      <td>LSK vs Raj Limited</td>
                      <td>7429</span></td>
                      <td>22-01-2021</td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">PENDING</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a >429</a></td>
                      <td>Safaricom vs Mtel Services</td>
                      <td>923</span></td>
                      <td>06-01-2021</td>
                      <td>
                        <div class="sparkbar" data-color="#00c0ef" data-height="20">COMPLETED</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a >1848</a></td>
                      <td>JSC vs KMA</td>
                      <td>848</span></td>
                      <td>05-12-2020</td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">COMPLETED</div>
                      </td>
                    </tr>
                    
                    </tbody>
                  </table>
                </div>

                <div class="card-footer clearfix">
                <a href="adv.php" class="btn btn-sm btn-info float-left"> New Matter</a>
                <a href="widgets.php" class="btn btn-sm btn-secondary float-right">View All Matters</a>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Your Agenda</h3>
              </div>
              <style type="text/css">
 .content-table{
  border-collapse:collapse;
  margin: 25px 0;
  font-size: 0.8em;
  min-width:500px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow:  0 0 20px rgba(0,0,0,0.15);
 }
  .content-table thead tr{

  background-color:#009879;
  color:#ffffff;
  text-align: left;
  font-weight: bold;
    }
    .content-table th,
    .content-table td{
      padding: 12px 15px;
    }
    .content-table tbody tr{

    border-bottom: 1px solid #dddddd;
    } 
    .content-table tbody tr:nth-of-type(even){


      background-color: #f3f3f3; 
    }
    .content-table tbody tr:last-of-type{

      border-bottom: 2px solid #009879;
    }
    .content-table tbody tr.active-row{


      font-weight: bold;
      color:#009879; 
    }
.body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.9;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}
.notification {
  background-color: #555;
  color: white;
  text-decoration: none;
  padding: 15px 56px;
  position: relative;
  display: inline-block;
  border-radius: 90px;
}

.notification:hover {
  background: red;
}

.notification .badge {
  position: absolute;
  top: -1px;
  right: -5px;
  padding: 5px 10px;
  border-radius: 10%;
  background: red;
  color: white;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  bottom: 0;
  height: 80%;
  width: 80%;
  overflow: auto;

  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 100%;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

       

      
 

</style>
<table class="content-table" id="table">
            <thead>
                <tr>
        <th>Task</th>
        <th>Activity</th>
        <th>Due Date</th>
        <th>Priority</th>
        <th>How To</th>
        <th>Progress</th>
        <th>Status</th>
        <th>Comments</th>
        <th>Action</th>

        
                </tr>
            </thead>
           
      
        

        <?php
/*
            $link = mysqli_connect("127.0.0.1", "root", "", "ishlaw");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}  
               //search
               //if (isset($_POST['username']) || isset($_POST['email'])) {
           
               $ReadSql = "SELECT tid,title,start,status,description,User,Priority,clino FROM tasks";


                

  
      $result=mysqli_query($link,$ReadSql);
      if (mysqli_num_rows($result) < 1) {
                   echo "Error! No Records";
                   exit();
                }


    
      while($row=mysqli_fetch_array($result)){
?>
        <tr class="active">
        <td><?php echo $row['tid'];?></td>
        <td><?php echo $row['title'];?></td>
            <td><?php echo $row['start'];?></td>
            <td><?php echo $row['Priority'];?></td>
            <td><?php echo $row['description'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><input type="button" class="" onclick="openForm()" value="Edit"   ></td>
        


        </tr>
*/
 // <?php       
      
    ?>

    <script type="text/javascript">
 var script = document.createElement('script');
script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
document.getElementsByTagName('head')[0].appendChild(script); 
$.getJSON('http://localhost/ishfinal/API/recta.php', function(data)  {
          console.log(data);
          var items = [];

          for(var i in data) {
            items.push(data[i].rrule);
                  }
console.log(items);

var dates=[];

var titles=[];
var tid =[];
var status = [];
var prior = [];
var descri =[];
var hotodo= [];
var comment =[];



for (var i in items){
const rule = rrule.rrulestr(items[i])

dates.push(rule.all());
// dates.push(data[i].title)
titles.push(data[i].title);
tid.push(data[i].tno);
status.push(data[i].status);
prior.push(data[i].Priority);
descri.push(data[i].description);
hotodo.push(data[i].hotodo);
comment.push(data[i].comment);

}
var cars =[dates,titles,tid,status,prior,descri,hotodo,comment];
console.log(cars);
console.log(dates);
console.log(cars[0][1][0]);
console.log(cars[1][1]);
console.log("hi");

// for(var i = 0; i < cars.length; i++) {
var car = cars[0];
var student = ''; 
var p=0;

var current = new Date();
current = current.toLocaleDateString()
console.log(current);



for(var j = 0; j < car.length; j++) {
    var cube = car[j];
    for(var k = 0; k < cube.length; k++) {
if(current ==  dates[j][k].toLocaleDateString() ){
      
       console.log("cube[" + j + "][" + k + "] = " + dates[j][k].toLocaleDateString());
       console.log("cube[" + j + "][" + k + "] = " + cars[1][j]);

       console.log(" ");
       console.log(" ");
                            student += '<tr>'; 
                            student += '<td>RD' + p  + 
                                cars[2][j] + '</td>'; 
                            
                            student += '<td>' +  
                                cars[1][j] + '</td>'; 

                                                            
                            student += '<td>' +  
                                current + '</td>'; 

                                student += '<td>' +  
                                cars[4][j] + '</td>'; 

                                student += '<td>' +  
                                cars[6][j] + '</td>'; 


                                student += '<td>' +  
                                cars[5][j] + '</td>'; 

                                student += '<td>' +  
                                cars[3][j] + '</td>'; 

                            
                                student += '<td>' +  
                                cars[7][j] + '</td>'; 


                         
                                // student += '<td>' +  
                                // cars[4][j] + '</td>'; 

                                // student += '<td>' +  
                                // cars[3][j] + '</td>'; 



  
                            // student += '<td>' +  
                            //    dates[j][k].toLocaleDateString() + '</td>'; 

                            student += '<td>' +  
                                '<button id= "btn'+p+'" onclick="fetchitre(this.id)"  name='+ cars[2][j]+' value= '+ cars[2][j]+'>'+'edit'+'</button>' + '</td>';

                            student += '</tr>'; 


                          }
else{
  console.log("no dates");
}


p++;
    }
}
  $('#table').append(student); 

// onclick="myFunction()"

// }
// const rule = rrule.rrulestr(
//   "DTSTART:20210104\nFREQ=DAILY;INTERVAL=1;UNTIL=20210303\nEXDATE:20210203"
//   // "DTSTART;TZID=America/Denver:20181101T190000;\n"
//   // + "RRULE:FREQ=WEEKLY;BYDAY=MO,WE,TH;INTERVAL=1;COUNT=3"
// )
// console.log(rule.all());

      // var str = ""
      // for (var item of items) {
      //   str += "<option>" + item + "</option>"
      // }
      // document.getElementById("policyid").innerHTML = str;
        
      

      });
      
</script>

    <script>
 var data;
  $(document).ready(function() {
        $.ajax({
          url: 'http://localhost/Admin/ishfinal/API/daynoreta.php',
          type: 'GET',
          dataType: 'json',
          data: data,
          error: function() { console.log('boo! not working'); },
          // beforeSend: setHeader,

             beforeSend: function (xhr) {
    var jwt ="<?php echo $_COOKIE["resp"] ?>";
    // console.log("Authorization", "Bearer  " + jwt"");

     
    xhr.setRequestHeader ("Authorization", "Bearer "+ jwt);
  },
          success: (data) => {
          console.log(data);
          var items = [];
var student = ''; 
var p =0;
          for(var i in data) {
            // items.push(data[i].rrule);
                  



                            student += '<tr>'; 
                            
                            student += '<td>NRD' +  
                                data[i].tid + '</td>';

                                student += '<td>' +  
                                data[i].title + '</td>';

                                student += '<td>' +  
                                data[i].start + '</td>'; 

                            

                                student += '<td>' +  
                                data[i].Priority + '</td>'; 

                                student += '<td>' +  
                                data[i].hotodo + '</td>';

                                student += '<td>' +  
                                data[i].description + '</td>';

                                student += '<td>' +  
                                data[i].status + '</td>';


                                 student += '<td>' +  
                                data[i].comment + '</td>';





                            //     student += '<td>' +  
                            //     cars[1][j] + '</td>'; 
  
                            // student += '<td>' +  
                            //    dates[j][k].toLocaleDateString() + '</td>'; 

                            student += '<td>' +  
                                '<button id= "btn12'+p+'" onclick="fetchit(this.id)"  name='+ data[i].tid+' value= '+ data[i].tid+'>'+'edit'+'</button>' + '</td>';

                            student += '</tr>'; 
p++;
}
  $('#table').append(student); 

// onclick="myFunction()"

// }
// const rule = rrule.rrulestr(
//   "DTSTART:20210104\nFREQ=DAILY;INTERVAL=1;UNTIL=20210303\nEXDATE:20210203"
//   // "DTSTART;TZID=America/Denver:20181101T190000;\n"
//   // + "RRULE:FREQ=WEEKLY;BYDAY=MO,WE,TH;INTERVAL=1;COUNT=3"
// )
// console.log(rule.all());

      // var str = ""
      // for (var item of items) {
      //   str += "<option>" + item + "</option>"
      // }
      // document.getElementById("policyid").innerHTML = str;
        
      
      }







        });
      });

</script>
<script type="text/javascript">
  
  var data;
  $(document).ready(function() {
        $.ajax({
          url: 'http://localhost/ishfinal/API/daynonrecev.php',
          type: 'GET',
          dataType: 'json',
          data: data,
          error: function() { console.log('boo! not working'); },
          // beforeSend: setHeader,

             beforeSend: function (xhr) {
    var jwt ="<?php echo $_COOKIE["resp"] ?>";
    // console.log("Authorization", "Bearer  " + jwt"");

     
    xhr.setRequestHeader ("Authorization", "Bearer "+ jwt);
  },
          success: (data) =>    {
          console.log(data);
          var items = [];
var student = ''; 
var p =0;
var daco;
          for(var i in data) {
            // items.push(data[i].rrule);
                  
// daco = data[i].start;
// daco = daco.split('-').join('/');
// daco = formatDate (daco);
// daco = daco.toLocaleString();

// var current = new Date();
// current = current.toLocaleString()
// console.log(current);

var start = getnonrec(data[i].start);
var end = getnonrec(data[i].end);


                            student += '<tr>'; 
                            
                            student += '<td>NRDE' +  
                                data[i].id + '</td>';

                                student += '<td>' +  
                                data[i].title + '</td>';

                                student += '<td>' +  
                                data[i].priority + '</td>';

                                student += '<td>' +  
                                data[i].user + '</td>';

                                student += '<td>' +  
                                data[i].location + '</td>';

                                student += '<td>' +  
                                data[i].description + '</td>';

                                 student += '<td>' +  
                                data[i].clino+ '</td>';

                                



                                student += '<td>' +  
                               start + '</td>';

                               student += '<td>' +  
                               end + '</td>';

                                

                                

                                // student += '<td>' +  
                                // data[i].status + '</td>'; 

                                



                            //     student += '<td>' +  
                            //     cars[1][j] + '</td>'; 
  
                            // student += '<td>' +  
                            //    dates[j][k].toLocaleDateString() + '</td>'; 

                            student += '<td>' +  
                                '<button id= "btn132'+p+'" onclick="fetchit2(this.id)"  name='+ data[i].id+' value= '+ data[i].id+'>'+'edit'+'</button>' + '</td>';

                            student += '</tr>'; 
p++;
}
console.log(data[i].id)
  $('#events').append(student); 


         }







        });
      });



function getnonrec (input) {

var current = new Date(input);
current = current.toLocaleString()
console.log(current);
return current;
}


</script>
<script type="text/javascript" src="ishfinal/Calender/recdafetchev.js"></script>
<script type="text/javascript">
 function fetchit(id){
// var fired_button = $("button").val();

var fired_button = document.getElementById(id).value ;

// alert(fired_button);
console.log(fired_button);
  
var script = document.createElement('script');
script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
document.getElementsByTagName('head')[0].appendChild(script); 
$.getJSON('http://localhost/ishfinal/API/daynoreta.php', function(data)  {
          console.log(data);


          var items = [];
          var title =[];
          var dueda = [];
          var descri =[];
          var prog = [];
          var prior = [];
          var rpt =[];
          var rptun =[];
         var user =[];
          var  clino =[];
          var hotodo= [];
        var comment =[];



          for(var i in data) {
            if(data[i].tid==fired_button){
            items.push(data[i].tid);
            title.push(data[i].title);
            dueda.push(data[i].start);
            descri.push(data[i].description);
            prog.push(data[i].status);
            prior.push(data[i].Priority);
            rpt.push(data[i].rpt);
            rptun.push(data[i].rpun);
            user.push(data[i].User);
            clino.push(data[i].clino);
            hotodo.push(data[i].hotodo);
           comment.push(data[i].comment);


                  }
                }

// console.log();
var modal = document.getElementById("myForm");
  







  modal.style.display ="block";


//             items.push(data[i].tid);
//             title.push(data[i].title);
//             dueda.push(data[i].start);
//             descri.push(data[i].description);
//             prog.push(data[i].status);
//             prior.push(data[i].Priority);
//             rpt.push(data[i].rpt);
//             rptun.push(data[i].rpun);
//             user.push(data[i].User);
//             clino.push(data[i].clino)
 console.log(clino[0]);

  document.getElementById("items").value= items[0] ;
  document.getElementById("title").value= title[0] ;
  document.getElementById("dueda").value= dueda[0] ;
  document.getElementById("descri").value= descri[0] ;
  document.getElementById("prog").value= prog[0] ;
  document.getElementById("prior").value= prior[0] ;
  document.getElementById("rpt").value= rpt[0] ;

  document.getElementById("rptun").value= rptun[0] ;
  document.getElementById("user").value= user[0] ;
  document.getElementById("cli").value= clino[0] ;
  document.getElementById("hotodo").value= hotodo[0] ;
  document.getElementById("comment").value= comment[0] ;  
   });




//   var modal = document.getElementById("myModal");
  







//   modal.style.display ="block";

}
 function fetchitre(id){
// var fired_button = $("button").val();

var fired_button = document.getElementById(id).value ;

// alert(fired_button);
console.log(fired_button);
  
var script = document.createElement('script');
script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
document.getElementsByTagName('head')[0].appendChild(script); 
$.getJSON('http://localhost/ishfinal/API/recta.php', function(data)  {
          console.log(data);


          var items = [];
          var title =[];
          var dueda = [];
          var descri =[];
          var prog = [];
          var prior = [];
          var rpt =[];
          var rptun =[];
         var user =[];
          var  clino =[];
          var hotodo= [];
var comment =[];



    // var todayTime = new Date();

    // var month = todayTime .getMonth() + 1;

    // var day = todayTime .getDate();

    // var year = todayTime .getFullYear();

    //  var current= year + "-0" + month + "-0" + day;

    //  console.log(current);


var d = new Date();
var m = d.getMonth()+1;
var da =d.getDate();



var m1=('0' + m).slice(-2);
var da1=('0' + da).slice(-2);
console.log(m1);
console.log(da);

// document.getElementById("demo").innerHTML=((9)+"-"+(d.getMonth())+"-"+(d.getFullYear()));
var current=((d.getFullYear())+"-"+(m1)+"-"+(da1));


          for(var i in data) {
            if(data[i].tno==fired_button){
            items.push(data[i].tno);
            title.push(data[i].title);
            dueda.push(data[i].start);
            descri.push(data[i].description);
            prog.push(data[i].status);
            prior.push(data[i].Priority);
            rpt.push(data[i].rpt);
            rptun.push(data[i].rpun);
            user.push(data[i].User);
            clino.push(data[i].clino);
hotodo.push(data[i].hotodo);
comment.push(data[i].comment);


                  }
                }

// console.log();
var modal = document.getElementById("myModal2");
  







  modal.style.display ="block";


            // items.push(data[i].tno);
            // title.push(data[i].title);
            // dueda.push(data[i].start);
            // descri.push(data[i].description);
            // prog.push(data[i].status);
            // prior.push(data[i].Priority);
            // rpt.push(data[i].rpt);
            // rptun.push(data[i].rpun);
            // user.push(data[i].User);
            // clino.push(data[i].clino);


  document.getElementById("items1").value= items[0] ;
  document.getElementById("title1").value= title[0] ;
  


  // dueda[0]=convdate(dueda[0]);
  console.log(current);
  document.getElementById("dueda1").value= current;
  document.getElementById("descri1").value= descri[0] ;
  document.getElementById("prog1").value= prog[0] ;
  document.getElementById("prior1").value= prior[0] ;
  document.getElementById("rpt1").value= rpt[0] ;

  

  rptun[0]=convdate(rptun[0]);
  document.getElementById("rptun1").value= rptun[0] ;
document.getElementById("hotodo1").value= hotodo[0] ;
  document.getElementById("comment1").value= comment[0] ;
   

  document.getElementById("user1").value= user[0] ;
  document.getElementById("clino1").value= clino[0] ;
   });




//   var modal = document.getElementById("myModal");
  







//   modal.style.display ="block";





//   document.getElementById("popti").value= fired_button ;
}

function fetchit2(id){


var fired_button2 = document.getElementById(id).value ;


console.log(fired_button2);
  
var script = document.createElement('script');
script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
document.getElementsByTagName('head')[0].appendChild(script); 
$.getJSON('http://localhost/Admin/API/daynonrecev.php', function(data)  {
          console.log(data);


          
           var title3 =[];
          var start3 = [];
          var col3 =[];
          var items3 = [];
          var end3 = [];
         var prior3 = [];
          var rpt3 =[];
          var rptun3 =[];
          var user3 =[];
          var loc3 =[];
          var descri3 =[];
          var clino3 =[];
          var dur3 = [];
          

console.log(fired_button2);
console.log(document.getElementById(id).value );


          for(var i in data) {
            if(data[i].id==fired_button2){
            title3.push(data[i].title);
            start3.push(data[i].start);
            col3.push(data[i].color);
            items3.push(data[i].id);
            end3.push(data[i].end);
            prior3.push(data[i].priority);
            rpt3.push(data[i].rpt);
            rptun3.push(data[i].rptun);
            user3.push(data[i].user);
            loc3.push(data[i].location);
            descri3.push(data[i].description);
            clino3.push(data[i].clino);
            dur3.push(data[i].duration);

        console.log(col3);    
            
            

            
            

                  }
                }


var modal = document.getElementById("myModal64");
  







  modal.style.display ="block";

console.log(start3[0]);
var res = start3[0].replace(" ", "T");
console.log(res);
console.log(end3[0]);
var res2 = end3[0].replace(" ", "T");
console.log(res2);


  document.getElementById("title3").value= title3[0] ;
  document.getElementById("start3").value= res ;
  document.getElementById("col3").value= col3[0] ;
  document.getElementById("items3").value= items3[0] ;
  document.getElementById("end3").value= res2 ;
  document.getElementById("prior3").value= prior3[0] ;
  document.getElementById("rpt3").value= rpt3[0] ;
  document.getElementById("rptun3").value= rptun3[0] ;
  document.getElementById("user3").value= user3[0] ;
  document.getElementById("loc3").value= loc3[0] ;
  document.getElementById("descri3").value= descri3[0] ;
  document.getElementById("clino3").value= clino3[0] ;
 
  
   });




}


function fetchitre2(id){


var fired_button = document.getElementById(id).value ;


console.log(fired_button);
  
var script = document.createElement('script');
script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
document.getElementsByTagName('head')[0].appendChild(script); 
$.getJSON('http://localhost/Admin/ishfinal/API/receve.php', function(data)  {
          console.log(data);
          var items = [];

          for(var i in data) {
            items.push(data[i].rrule);
                  }
console.log(items);

var dates=[];


var titles=[];
var id = [];
var prior =[];
var user = [];
var loc=[];
var descri = [];
var clino = [];
var dur = [];
var end =[];
var col = [];
var rpt=[];
var rptun =[];







for (var i in items){
const rule = rrule.rrulestr(items[i])

dates.push(rule.all());
// dates.push(data[i].title)
titles.push(data[i].title);
id.push(data[i].id);
prior.push(data[i].priority);
user.push(data[i].user);
loc.push(data[i].location);
descri.push(data[i].description);
clino.push(data[i].clino);
dur.push(data[i].duration);
end.push(data[i].end);
col.push(data[i].color);
rpt.push(data[i].rpt);
rptun.push(data[i].rptun);
}
var cars =[dates,id,titles,prior,user,loc,descri,clino,dur,end,col,rpt,rptun];
console.log(cars);

var car = cars[0];
var p=0;

var darpt;
console.log(fired_button);

for(var j = 0; j < car.length; j++) {
    var cube = car[j];
    for(var k = 0; k < cube.length; k++) {



      if(daco =convdate2(cars[8][j],dates[j][k]) ==  true &&  fired_button == cars[1][j]){

       var modal = document.getElementById("myModal56");
         modal.style.display ="block";

       daco5 =condate3(dates[j][k]);
       daco6 =condate4(cars[8][j],dates[j][k]);
       darpt = rptcon(cars[12][j]);

daco5 = daco5.toLocaleString('en-GB');
daco6 = daco6.toLocaleString('en-GB');


daco5 =stendcon(daco5);
daco6 =stendcon(daco6);

console.log(daco5);
console.log(daco6);


  document.getElementById("title4").value= cars[2][j] ;
  document.getElementById("start4").value=daco5;
  document.getElementById("col4").value= cars[10][j];
  document.getElementById("items4").value= cars[1][j];
  document.getElementById("end4").value= daco6;
  document.getElementById("prior4").value= cars[3][j] ;
  document.getElementById("rpt4").value= cars[11][j] ;
  document.getElementById("rptun4").value= darpt ;
  document.getElementById("user4").value= cars[4][j] ;
  document.getElementById("loc4").value= cars[5][j] ;
  document.getElementById("descri4").value= cars[6][j] ;
  document.getElementById("clino4").value= cars[7][j] ;
                          }
else{
  console.log("no dates");
}

p++;
    }
}
          
     
   });





}

function rptcon(str){
var str =str;

var str2 = str.slice(0, 8)

console.log(str2);
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


</table>
</form>   
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
                    <option selected="selected">Select Task Frequency</option>
                    <option value="One-time">One-time</option>
                    <option value="Full-group">Full-group</option>
                  </select> <br>    
 

                   <label for="rptun">Repeat Until</label>
                   <input type="Date" class="form-control" id="rptun1" name="rptun" placeholder="Please Select Date"><br>
    <button type="submit" name="submit" class="btn">Save</button>
    <button type="button" class="btn cancel" onclick="closeForm2()">Close</button>
  </form>
</div>
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

if(isset($_POST['title']) && isset($_POST['start']) &&isset($_POST['stat']) && isset($_POST['prio']) && isset($_POST['descri']) && isset($_POST['rpt']) && isset($_POST['rptun']) && isset($_POST['user']) && isset($_POST['clino']) && isset($_POST['tid'])  && isset($_POST['hotodo']) && isset($_POST['comment'])
 ){
  // && isset($_POST['matter'])

// Escape user inputs for security
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$start = mysqli_real_escape_string($link, $_REQUEST['start']);
// $last_name = mysqli_real_escape_string($link, $_REQUEST['surn_name']);




$stu = mysqli_real_escape_string($link, $_REQUEST['stat']);

$descri = mysqli_real_escape_string($link, $_REQUEST['descri']);
$prio = mysqli_real_escape_string($link, $_REQUEST['prio']);
$rpt = mysqli_real_escape_string($link, $_REQUEST['rpt']);
$hotodo = mysqli_real_escape_string($link, $_REQUEST['hotodo']); 

$comment = mysqli_real_escape_string($link, $_REQUEST['comment']); 
 
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
SET  `title` =  '$title',`start` =  '$start',`description` = '$descri', `rpt` =  '$rpt', `rpun` = '$rptun' ,`User` = '$user' ,`Priority` = '$prio', `clino` = '$clino',`status` =  '$stu',`hotodo` =  '$hotodo',`comment` =  '$comment'



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

$sql = "INSERT INTO `iant`(`title`, `start`, `description`, `rpt`, `rpun`, `User`, `Priority`, `clino`, `status`,`hotodo`,`comment`) VALUES ('$title','$start', '$descri', '$rpt','$rptun', '$user','$prio','$clino','$stu','$hotodo','$comment') ";


 



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





$link = mysqli_connect("127.0.0.1", "root", "", "ishfinal");
if(isset($_POST['title']) && isset($_POST['start']) &&isset($_POST['stat']) && isset($_POST['prio']) && isset($_POST['descri']) && isset($_POST['rpt']) && isset($_POST['rptun']) && isset($_POST['user']) && isset($_POST['clino']) && isset($_POST['tid']) && isset($_POST['save1'])  && isset($_POST['hotodo']) && isset($_POST['comment'])
){
  // && isset($_POST['matter'])

// Escape user inputs for security
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$start = mysqli_real_escape_string($link, $_REQUEST['start']);
// $last_name = mysqli_real_escape_string($link, $_REQUEST['surn_name']);

$hotodo = mysqli_real_escape_string($link, $_REQUEST['hotodo']); 

$comment = mysqli_real_escape_string($link, $_REQUEST['comment']); 



$stu = mysqli_real_escape_string($link, $_REQUEST['stat']);

$descri = mysqli_real_escape_string($link, $_REQUEST['descri']);
$prio = mysqli_real_escape_string($link, $_REQUEST['prio']);
$rpt = mysqli_real_escape_string($link, $_REQUEST['rpt']);
 
 $rptun= mysqli_real_escape_string($link, $_REQUEST['rptun']);
$clino = mysqli_real_escape_string($link, $_REQUEST['clino']);
// $matter = mysqli_real_escape_string($link, $_REQUEST['matter']);
 
$user = mysqli_real_escape_string($link, $_REQUEST['user']); 

$tid = mysqli_real_escape_string($link, $_REQUEST['tid']); 

$save1 = mysqli_real_escape_string($link, $_REQUEST['save1']);


if($save1 == 'Full-group'){

  if($rpt == "Never"){

$sql = "INSERT INTO `tasks`(`title`, `start`, `description`, `rpt`, `rpun`, `User`, `Priority`, `clino`, `status`) VALUES ('$title','$start', '$descri', '$rpt','', '$user','$prio','$clino','$stu') ";
$sql2 = "DELETE FROM `iant` WHERE `tid` = '$tid'" ;

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";


    if(mysqli_query($link, $sql2)){
    echo "Records added successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


}

else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

 mysqli_close($link);
  }
  else{
 $start=str_replace("-", "", $start);
 $rptun =str_replace("-", "", $rptun);


$sql = "  UPDATE `iant`  
SET  `title` =  '$title',`start` =  '$start',`description` = '$descri', `rpt` =  '$rpt', `rpun` = '$rptun' ,`User` = '$user' ,`Priority` = '$prio', `clino` = '$clino',`status` =  '$stu',`hotodo` =  '$hotodo',`comment` =  '$comment'




WHERE `tid` = '$tid'  " ;



if(mysqli_query($link, $sql)){
    echo "Records updated successfully.";

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
$sql = "INSERT INTO `exclude`(`id`, `date`) VALUES ('$tid','$start') ";

if(mysqli_query($link, $sql)){
    echo "Records updated successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
 
 if($rpt == "Never")
 {
$sql2 = "INSERT INTO `tasks`(`title`, `start`, `description`, `rpt`, `rpun`, `User`, `Priority`, `clino`, `status`,`hotodo`,`comment` ) VALUES ('$title','$start', '$descri', '$rpt','', '$user','$prio','$clino','$stu',
'$hotodo','$comment') ";




if(mysqli_query($link, $sql2)){
    echo "Records updated successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

 }

else{
   $start=str_replace("-", "", $start);
 $rptun =str_replace("-", "", $rptun);


$sql2 = "INSERT INTO `iant`(`title`, `start`, `description`, `rpt`, `rpun`, `User`, `Priority`, `clino`, `status`) VALUES ('$title','$start', '$descri', '$rpt','$rptun', '$user','$prio','$clino','$stu') ";


if(mysqli_query($link, $sql2)){
    echo "Records updated successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}

mysqli_close($link);
}


}












?>

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
                <i class="fas fa-plus"></i><a href="kazi.php"> View My Schedule</a> 
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
                      <a href="#" class="dropdown-item">Clear events</a>
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
                
             <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX panelE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Upcoming Events</h3>
              </div>

<table class="content-table" id="events">
            <thead>
                <tr>
        <th>ID</th>
        <th>Activity</th>
        <th>Priority</th>
        <th>User</th>
        <th>Location</th>
        <th>Progress</th>
        <th>Client</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Action</th>

        
                </tr>
            </thead>
           


</table>

     <div class="card-footer clearfix">
                <i class="fas fa-plus"></i><a href="tvents.php"> View My Schedule</a> 
              </div>
            </div>
            </form>   

 
<div class="form-popup" id="myModal64">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-container">
    <p><b>Update Event progress</b></p>
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
  <form action="index.php" method="POST" class="form-container">
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
</div>
            <!-- /.card -->
            
            <!-- TABLE: LATEST ORDERS -->
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
            <!-- /.card -->
      
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
    <link rel="stylesheet" href="tr.css">




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
   
  //  'https://form.hairhub.org/data3.php',
    //'https://form.hairhub.org/data2.php',
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
<script src="plugins/jquery/jquery.min.js"></script>
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
