<?php
require "../../../DBConnect.php";
$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
//$link = mysqli_connect("127.0.0.1", "root", "", "ishfinal");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//UPDATE  NON RECURRING TASKS
if(isset($_POST['title']) && isset($_POST['start']) &&isset($_POST['stat'])  && isset($_POST['descri']) && isset($_POST['rpt']) && isset($_POST['rptun']) && isset($_POST['user']) && isset($_POST['tid'])  && empty($_POST['save1'])
 ){

// Escape user inputs for security
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$start = mysqli_real_escape_string($link, $_REQUEST['start']);
$stu = mysqli_real_escape_string($link, $_REQUEST['stat']);
$descri = mysqli_real_escape_string($link, $_REQUEST['descri']);
$rpt = mysqli_real_escape_string($link, $_REQUEST['rpt']);
$rptun= mysqli_real_escape_string($link, $_REQUEST['rptun']);
$user = mysqli_real_escape_string($link, $_REQUEST['user']);
$tid = mysqli_real_escape_string($link, $_REQUEST['tid']);
// $user = count($_POST['user']);
  // echo "<script>$('#MyModal').modal('show')</script>";


// Attempt insert query execution
// , `matter`

if($rpt == "Never")
{

$sql = "  UPDATE `tasks`  
SET  `title` =  '$title',`start` =  '$start',`description` = '$descri', `rpt` =  '$rpt', `rpun` = '$rptun' ,`User` = '$user' ,`status` =  '$stu'



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

$sql = "INSERT INTO `iant`(`title`, `start`, `description`, `rpt`, `rpun`, `User`, `status`) VALUES ('$title','$start', '$descri', '$rpt','$rptun', '$user','$stu') ";






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
setcookie('test2', 'helloworld',time() + (300000), 'http://localhost/admin/','','','true');
        // setcookie('jwt', "",time() -3600, 'http://localhost/jawert/php-jwt-example/api/');
         $_COOKIE['test2'] = 'helloworld';
// header('location: ../../../index.php');
}








//UPDATE RECURRING TASKS
//$link = mysqli_connect("127.0.0.1", "root", "", "ishfinal");
if(isset($_POST['title']) && isset($_POST['start']) &&isset($_POST['stat'])  && isset($_POST['descri']) && isset($_POST['rpt']) && isset($_POST['rptun']) && isset($_POST['user'])  && isset($_POST['tid']) && isset($_POST['save1'])
){
  // && isset($_POST['matter'])

// Escape user inputs for security
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$start = mysqli_real_escape_string($link, $_REQUEST['start']);
// $last_name = mysqli_real_escape_string($link, $_REQUEST['surn_name']);



$stu = mysqli_real_escape_string($link, $_REQUEST['stat']);

$descri = mysqli_real_escape_string($link, $_REQUEST['descri']);
$rpt = mysqli_real_escape_string($link, $_REQUEST['rpt']);
 
 $rptun= mysqli_real_escape_string($link, $_REQUEST['rptun']);
// $matter = mysqli_real_escape_string($link, $_REQUEST['matter']);
 
$user = mysqli_real_escape_string($link, $_REQUEST['user']); 

$tid = mysqli_real_escape_string($link, $_REQUEST['tid']); 

$save1 = mysqli_real_escape_string($link, $_REQUEST['save1']);


if($save1 == 'Full-group'){

  if($rpt == "Never"){

$sql = "INSERT INTO `tasks`(`title`, `start`, `description`, `rpt`, `rpun`, `User`, `status`) VALUES ('$title','$start', '$descri', '$rpt','', '$user','$stu') ";
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
SET  `title` =  '$title',`start` =  '$start',`description` = '$descri', `rpt` =  '$rpt', `rpun` = '$rptun' ,`User` = '$user' ,`status` =  '$stu'




WHERE `tid` = '$tid'  " ;

echo  $sql;

if(mysqli_query($link, $sql)){
    // echo "Records updated successfully.";
    // header('location: login.php');

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}

}




else if($save1 == 'One-time')
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
$sql2 = "INSERT INTO `tasks`(`title`, `start`, `description`, `rpt`, `rpun`, `User`, `status` ) VALUES ('$title','$start', '$descri', '$rpt','', '$user','$stu') ";




if(mysqli_query($link, $sql2)){
    echo "Records updated successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

 }

else{
   $start=str_replace("-", "", $start);
 $rptun =str_replace("-", "", $rptun);


$sql2 = "INSERT INTO `iant`(`title`, `start`, `description`, `rpt`, `rpun`, `User`, `status`) VALUES ('$title','$start', '$descri', '$rpt','$rptun', '$user','$stu') ";


if(mysqli_query($link, $sql2)){
    echo "Records updated successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}

mysqli_close($link);
}
// setcookie('resp', $resp->token,time() + (30000), 'http://localhost/admin/','','','true');
//         // setcookie('jwt', "",time() -3600, 'http://localhost/jawert/php-jwt-example/api/');
//          $_COOKIE['r'] = $resp->token;
// header('location: ../../../index.php');
}



 ?>