<?php

$conn =new PDO("mysql:host=localhost;dbname=ishfinal","root","");
			$id = isset($_GET['id'])?$_GET['id']:"";
                $stat = $conn ->prepare("select *  from blb where id=?" );
                $stat -> bindParam(1,$id);
                $stat -> execute();
                $row= $stat-> fetch();
                		header("Content-Type: application/octet-stream");
                		header('Content-Type: application/pdf');
                	header('Content-Type:'.$row['type']);
                	echo $row['data'];


?>