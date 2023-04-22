  <?php
require "../../../DBConnect.php";


//$link = mysqli_connect("127.0.0.1", "root", "", "ishfinal");
  $link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) &&isset($_POST['color']) && isset($_POST['descri']) && isset($_POST['rpt']) && isset($_POST['rptun'])  && isset($_POST['user']) ){
// Escape user inputs for security
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$start = mysqli_real_escape_string($link, $_REQUEST['start']);
$end = mysqli_real_escape_string($link, $_REQUEST['end']);
$color = mysqli_real_escape_string($link, $_REQUEST['color']);
$descri = mysqli_real_escape_string($link, $_REQUEST['descri']);
$rpt = mysqli_real_escape_string($link, $_REQUEST['rpt']);
$rptun= mysqli_real_escape_string($link, $_REQUEST['rptun']);



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


echo "<br>";

echo "<br>";


if($rpt == "Never")
{
$sql = "INSERT INTO `events`(`title`, `start`, `color`, `end`, `rpt`, `rptun`, `user`, `description`, `duration`) VALUES ('$title','$start', '$color','$end', '$rpt','$rptun', '$user','$descri','$popfinal') ";

// for($i=0;$i<$user; $i++){
// , '".$_POST['user'][$i]."'
// $sql .="('$title','$start', '$descri', '$rpt','$rptun', '$user','$prio','$clino','$stu'),";

// }
// $psql = rtrim($sql,',');

if(mysqli_query($link, $sql)){
   echo "<script type='text/javascript'>
         
     
     document.getElementById('myModal').style.display = 'block';

            document.getElementById('status').innerHTML = 'Registration Completed successfully. .';
            document.getElementById('status3').innerHTML = '.<br><br>';

      document.getElementById('status').style.color= 'green';

      


</script>";

} else{
    echo "<script type='text/javascript'>
         
     
     document.getElementById('myModal').style.display = 'block';

            document.getElementById('status').innerHTML = 'Registration error please retry. .';
            document.getElementById('status3').innerHTML = '.<br><br>';

      document.getElementById('status').style.color= 'red';

      


</script>";
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
$sql = "INSERT INTO `iane`(`title`, `start`, `color`, `end`, `rpt`, `rptun`, `user`, `description`,duration) VALUES ('$title','$start', '$color','$end', '$rpt','$rptun', '$user','$descri','$popfinal') ";

// for($i=0;$i<$user; $i++){

// $sql .="('$title','$start', '$color','$end', '$prio', '$rpt','$rptun', '".$_POST['user'][$i]."','$loc','$descri','$clino'),";

// }
// $psql = rtrim($sql,',');

if(mysqli_query($link, $sql)){
    echo "<script type='text/javascript'>
         
     
     document.getElementById('myModal').style.display = 'block';

            document.getElementById('status').innerHTML = 'Registration Completed successfully. .';
            document.getElementById('status3').innerHTML = '.<br><br>';

      document.getElementById('status').style.color= 'green';

      


</script>";
} else{
 echo "<script type='text/javascript'>
         
     
     document.getElementById('myModal').style.display = 'block';

            document.getElementById('status').innerHTML = 'Registration error please retry. .';
            document.getElementById('status3').innerHTML = '.<br><br>';

      document.getElementById('status').style.color= 'red';

      


</script>";
}
 
// Close connection
mysqli_close($link);
}

}
// else{
//   echo "not enough";
 
// }
 ?>