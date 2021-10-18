


$link = mysqli_connect("127.0.0.1", "root", "", "ishfinal");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

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







