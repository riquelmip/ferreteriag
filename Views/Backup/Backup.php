<?php 

		
		include('Views/Backup/Fuction_Backup.php');

		echo backup_tables('localhost','root','','db_ferreteria');

		$fecha=date("Y-m-d");
		header("Content-disposition: attachment; filename=db-ferreteria-".$fecha.".sql");
		header("Content-type: MIME");
		readfile("backups/db-ferreteria-".$fecha.".sql");

 ?>