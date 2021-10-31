  <?php
                $conn =new PDO("mysql:host=localhost;dbname=ishfinal","root","");
  if(isset($_POST['submit'])){
    $Fname =$_POST['visitor'];
    $Lname =$_POST['lname'];
    $Mobile =$_POST['mobile'];
    $Purpose =$_POST['case'];
    $Appointment =$_POST['client'];
    $Date =$_POST['date'];
    $stmt = $conn->prepare("insert into visitors values('',?,?,?,?,?,?)");
    $stmt ->bindParam(1,$Fname);
    $stmt ->bindParam(2,$Lname);
    $stmt ->bindParam(3,$Mobile);
    $stmt ->bindParam(4,$Purpose);
    $stmt ->bindParam(5,$Appointment);
    $stmt ->bindParam(6,$Date);
    
    
    if($stmt -> execute()){
//       echo "<script type='text/javascript'>
         
     
//      document.getElementById('myModal').style.display = 'block';

//             document.getElementById('status').innerHTML = 'Registration Completed successfully. .';
//             document.getElementById('status3').innerHTML = '.<br><br>';

//       document.getElementById('status').style.color= 'green';

      


// </script>";
  }
  else{
//     echo "<script type='text/javascript'>
         
     
//      document.getElementById('myModal').style.display = 'block';

//             document.getElementById('status').innerHTML = 'Registration error please retry. .';
//             document.getElementById('status3').innerHTML = '.<br><br>';

//       document.getElementById('status').style.color= 'red';

      


// </script>";
  }
}
?>