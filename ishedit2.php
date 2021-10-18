<?php




$link = mysqli_connect("127.0.0.1", "root", "", "ishlaw");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['title']) && isset($_POST['start']) &&isset($_POST['stat']) && isset($_POST['prio']) && isset($_POST['descri']) && isset($_POST['rpt']) && isset($_POST['rptun']) && isset($_POST['user']) && isset($_POST['clino']) && isset($_POST['tid']) && isset($_POST['save1']) ){
  echo "busu";

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
$save1 = mysqli_real_escape_string($link, $_REQUEST['save1']); 
// $user = count($_POST['user']);
  // echo "<script>$('#MyModal').modal('show')</script>";

 
// Attempt insert query execution
// , `matter`
 $start=str_replace("-", "", $start);
 $rptun=str_replace("-", "", $rptun);
if($save1 == "One-time"){


$sql = "INSERT INTO `iant`(`title`, `start`, `description`, `rpt`, `rpun`, `User`, `Priority`, `clino`, `status`) VALUES ('$title','$start', '$descri', '$rpt','$rptun', '$user','$prio','$clino','$stu') ";

$sql2 = "INSERT INTO `exclude`(`id`, `date`) VALUES ('$tid','$start') ";



if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
//      echo "<script type='text/javascript'>
         if(mysqli_query($link, $sql2)){
    echo "Records added successfully.";
     }
//      document.getElementById('myModal2').style.display = 'block';

else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


}


if($save1 == "Full-group")
{


$sql3 = "  UPDATE `iant`  
SET  `title` =  '$title',`start` =  '$start',`description` = '$descri', `rpt` =  '$rpt', `rpun` = '$rptun' ,`User` = '$user' ,`Priority` = '$prio', `clino` = '$clino',`status` =  '$stu'


WHERE `tid` = '$tid'  " ;



if(mysqli_query($link, $sql3)){
    echo "Records updated successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection


}
mysqli_close($link);
}  

else{
	echo "not enough";
}




?>