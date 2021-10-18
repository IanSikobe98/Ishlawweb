<?php 

$link = mysqli_connect("127.0.0.1", "root", "", "ishfinal");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) &&isset($_POST['color']) && isset($_POST['prio']) && isset($_POST['descri']) && isset($_POST['rpt']) && isset($_POST['rptun'])&& isset($_POST['loc'])  && isset($_POST['user']) && isset($_POST['clino']) ){
// Escape user inputs for security
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$start = mysqli_real_escape_string($link, $_REQUEST['start']);
$end = mysqli_real_escape_string($link, $_REQUEST['end']);
$color = mysqli_real_escape_string($link, $_REQUEST['color']);
$descri = mysqli_real_escape_string($link, $_REQUEST['descri']);
$prio = mysqli_real_escape_string($link, $_REQUEST['prio']);
$rpt = mysqli_real_escape_string($link, $_REQUEST['rpt']);
$rptun= mysqli_real_escape_string($link, $_REQUEST['rptun']);
$clino = mysqli_real_escape_string($link, $_REQUEST['clino']);
$loc = mysqli_real_escape_string($link, $_REQUEST['loc']);


$user = mysqli_real_escape_string($link, $_REQUEST['user']);  

// // $user = count($_POST['user']);
// $user = mysqli_real_escape_string($link, $_REQUEST['user']);

  // echo "<script>$('#MyModal').modal('show')</script>";

// echo ($end-$start);




//calculate duration in string format
$d1 = new DateTime($start);
$d2 = new DateTime($end);
$interval = $d2->diff($d1);

//minutes and seconds(no)
$popwert = $interval->format(':%I:%S');



// echo "\n";
// echo $popwert;
// echo "\n";


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

echo $popfinal;
echo "<br>";

echo "<br>";


if($rpt == "Never")
{
$sql = "INSERT INTO `events`(`title`, `start`, `color`, `end`, `priority`, `rpt`, `rptun`, `user`, `location`, `description`, `clino`, `duration`) VALUES ('$title','$start', '$color','$end', '$prio', '$rpt','$rptun', '$user','$loc','$descri','$clino','$popfinal') ";

// for($i=0;$i<$user; $i++){
// , '".$_POST['user'][$i]."'
// $sql .="('$title','$start', '$descri', '$rpt','$rptun', '$user','$prio','$clino','$stu'),";

// }
// $psql = rtrim($sql,',');

if(mysqli_query($link, $sql)){
    echo "Event added successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 




// Close connection
mysqli_close($link);

}


else{


//Find start time for rptun
$markg = strval($start);
$markg =str_split(strval($start), 11);
$finrpt= $markg[1]  . "00" ;


//rewrite start time
 $start=str_replace("-", "", $start);
 $start=str_replace(":", "", $start);
 $start = $start . "00" ;

 echo $start;
echo "<br>";

echo "<br>";

//rewrite end time
 $end=str_replace("-", "", $end);
 $end=str_replace(":", "", $end);
 $end = $end . "00" ;
 echo $end;
echo "<br>";

echo "<br>";


//rewrite rptun
 $rptun =  str_replace("-", "", $rptun);
 $rptun = $rptun . "T" . $finrpt; 
 $rptun =  str_replace(":", "", $rptun);
echo $rptun;




 // echo "thr"."ee";
// Attempt insert query execution
$sql = "INSERT INTO `iane`(`title`, `start`, `color`, `end`, `priority`, `rpt`, `rptun`, `user`, `location`, `description`, `clino`,duration) VALUES ('$title','$start', '$color','$end', '$prio', '$rpt','$rptun', '$user','$loc','$descri','$clino','$popfinal') ";

// for($i=0;$i<$user; $i++){

// $sql .="('$title','$start', '$color','$end', '$prio', '$rpt','$rptun', '".$_POST['user'][$i]."','$loc','$descri','$clino'),";

// }
// $psql = rtrim($sql,',');

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
     echo "<script type='text/javascript'>
         
     
     document.getElementById('myModal2').style.display = 'block';





// document.getElementById('butt2').style.display = 'block';
  // document.getElementById('butt2').style.innerHTML = 'BACK TO HOME PAGE';
  //          document.getElementById('status').innerHTML = 'Booking submitted successfully. Await a confirmation email from Hairhub Trichology Centre.';
           // document.getElementById('status3').innerHTML = 'Make another booking or click below to go back to the homepage.<br><br>';

     // document.getElementById('status').style.color= 'green';

     // butt2.onclick = function() {
  //window.location = 'https://hairhub.org/'
// }


</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}

}
else{
  echo "not enough";
 
}
 ?>
