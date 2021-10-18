<?php 
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
echo "<br>";
echo $popwert;
echo "<br>";

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
echo "Duration";

echo "<br>";
echo $popfinal;
echo "<br>";

echo "<br>";




if($save1 == 'Full-group')
{

	if($rpt == "Never"){
$sql = "INSERT INTO `events`(`title`, `start`, `color`, `end`, `priority`, `rpt`, `rptun`, `user`, `location`, `description`, `clino`, `duration`) VALUES ('$title','$start', '$color','$end', '$prio', '$rpt','', '$user','$loc','$descri','$clino','$popfinal') ";

$sql2 = "DELETE FROM `iane` WHERE `id` = '$eid'" ;

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";


    if(mysqli_query($link, $sql2)){
    echo "Records deleted successfully.";

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

	echo $start;
		echo "<br>";
		echo "<br>";
	echo $end;
	echo "<br";
$markg = strval($start);
$markg =str_split(strval($start), 11);
$finrpt= $markg[1] ;


//rewrite start time
 $start=str_replace("-", "", $start);
 $start=str_replace(":", "", $start);
 // $start = $start . "00" ;

 echo $start;
echo "<br>";

echo "<br>";

//rewrite end time
 $end=str_replace("-", "", $end);
 $end=str_replace(":", "", $end);
 // $end = $end . "00" ;
 echo $end;
echo "<br>";

echo "<br>";




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


 echo $start;
echo "<br>";

echo "<br>";

 echo $end;
echo "<br>";

echo "<br>";

 echo $finrpt;
echo "<br>";

echo "<br>";


//rewrite rptun
 $rptun =  str_replace("-", "", $rptun);
 $rptun = $rptun . "T" . $finrpt; 
 $rptun =  str_replace(":", "", $rptun);
echo $rptun;

$sql = "UPDATE `iane` SET `title`='$title',`start`='$start',`color`='$color',`end`='$end',`priority`='$prio',`rpt`='$rpt',`rptun`='$rptun',`user`='$user',`location`='$loc',`description`='$descri',`clino`='$clino',`duration`='$popfinal' WHERE `id`='$eid'";

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
    echo "Records updated successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


	 if($rpt == "Never"){
 
$sql2 = "INSERT INTO `events`(`title`, `start`, `color`, `end`, `priority`, `rpt`, `rptun`, `user`, `location`, `description`, `clino`, `duration`) VALUES ('$title','$start', '$color','$end', '$prio', '$rpt','', '$user','$loc','$descri','$clino','$popfinal') ";


if(mysqli_query($link, $sql2)){
    echo "Records updated successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

         }


    else{
	echo $start;
		echo "<br>";
		echo "<br>";
	echo $end;
	echo "<br";
$markg = strval($start);
$markg =str_split(strval($start), 11);
$finrpt= $markg[1] ;


//rewrite start time
 $start=str_replace("-", "", $start);
 $start=str_replace(":", "", $start);
 // $start = $start . "00" ;

 echo $start;
echo "<br>";

echo "<br>";

//rewrite end time
 $end=str_replace("-", "", $end);
 $end=str_replace(":", "", $end);
 // $end = $end . "00" ;
 echo $end;
echo "<br>";

echo "<br>";




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


 echo $start;
echo "<br>";

echo "<br>";

 echo $end;
echo "<br>";

echo "<br>";

 echo $finrpt;
echo "<br>";

echo "<br>";


//rewrite rptun
 $rptun =  str_replace("-", "", $rptun);
 $rptun = $rptun . "T" . $finrpt; 
 $rptun =  str_replace(":", "", $rptun);
echo $rptun;


$sql4 = "INSERT INTO `iane`(`title`, `start`, `color`, `end`, `priority`, `rpt`, `rptun`, `user`, `location`, `description`, `clino`,duration) VALUES ('$title','$start', '$color','$end', '$prio', '$rpt','$rptun', '$user','$loc','$descri','$clino','$popfinal') ";

if(mysqli_query($link, $sql4)){
    echo "Records updated successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}

mysqli_close($link);

         }  

}


// }
// }


else{
 echo "not enough";

}
 ?>
