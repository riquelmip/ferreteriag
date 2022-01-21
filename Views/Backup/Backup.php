<?php 

		
		include('Views/Backup/Fuction_Backup.php');

		echo backup_tables('ec2-18-218-117-12.us-east-2.compute.amazonaws.com','will','will','db_ferreteria');

		$fecha=date("Y-m-d");
		header("Content-disposition: attachment; filename=db-ferreteria-".$fecha.".sql");
		header("Content-type: MIME");
		readfile("Backups/db-ferreteria-".$fecha.".sql");

 ?>