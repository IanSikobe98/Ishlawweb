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


$link = mysqli_connect("127.0.0.1", "root", "", "ishlaw");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['title']) && isset($_POST['start']) &&isset($_POST['stat']) && isset($_POST['prio']) && isset($_POST['descri']) && isset($_POST['rpt']) && isset($_POST['rptun']) && isset($_POST['user']) && isset($_POST['clino']) 
  // && isset($_POST['matter'])
){
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
// $user = count($_POST['user']);
  // echo "<script>$('#MyModal').modal('show')</script>";

 
// Attempt insert query execution
// , `matter`
$sql = "INSERT INTO `tasks`(`title`, `start`, `description`, `rpt`, `rpun`, `User`, `Priority`, `clino`, `status`) VALUES ('$title','$start', '$descri', '$rpt','$rptun', '$user','$prio','$clino','$stu') ";

// for($i=0;$i<$user; $i++){
// , '".$_POST['user'][$i]."'
// $sql .="('$title','$start', '$descri', '$rpt','$rptun', '$user','$prio','$clino','$stu'),";

// }
// $psql = rtrim($sql,',');

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
//      echo "<script type='text/javascript'>
         
     
//      document.getElementById('myModal2').style.display = 'block';





// // document.getElementById('butt2').style.display = 'block';
//   // document.getElementById('butt2').style.innerHTML = 'BACK TO HOME PAGE';
//   //          document.getElementById('status').innerHTML = 'Booking submitted successfully. Await a confirmation email from Hairhub Trichology Centre.';
//            // document.getElementById('status3').innerHTML = 'Make another booking or click below to go back to the homepage.<br><br>';

//      // document.getElementById('status').style.color= 'green';

//      // butt2.onclick = function() {
//   //window.location = 'https://hairhub.org/'
// // }


// </script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}







?>