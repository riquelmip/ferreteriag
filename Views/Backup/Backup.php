<?php 

		
		include('Views/Backup/Fuction_Backup.php');

		echo backup_tables('ec2-18-223-108-73.us-east-2.compute.amazonaws.com','will','will','db_ferreteria');
		var_dump("entro");
		die();
		$fecha=date("Y-m-d");
		header("Content-disposition: attachment; filename=db-ferreteria-".$fecha.".sql");
		header("Content-type: MIME");
		readfile("backups/db-ferreteria-".$fecha.".sql");

 ?>