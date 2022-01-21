<?php


	class Restartbackup extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			session_regenerate_id(true); //para seguridad de sesiones, el id anterior se eliminara y creara uno nuevo
			if (empty($_SESSION['login'])) {
				header('location: '.base_url().'/login');
			}
			getPermisos(14); 
		}

		

		public function Restartbackup(){


			if (empty($_SESSION['permisosMod']['leer'])) {
				header('location: '.base_url().'/dashboard');
			}
		$data['page_tag'] = "";
		$data['page_title']="Restaurar Respaldo";
		$data['page_functions_js'] = "funtions_restart.js";
		$this->views->getView($this,"Restartbackup",$data);

		}


		public function getFiles(){
			
$ruta='./Backups';

 $htmlOptions="";
    // Se comprueba que realmente sea la ruta de un directorio
    if (is_dir($ruta)){
        // Abre un gestor de directorios para la ruta indicada
        $gestor = opendir($ruta);

        // Recorre todos los archivos del directorio
        while (($archivo = readdir($gestor)) !== false)  {
            // Solo buscamos archivos sin entrar en subdirectorios
            if (is_file($ruta."/".$archivo)) {

              $htmlOptions .= '<option value='.$archivo.'>'.$archivo.'</option>';
            }            
        }

        // Cierra el gestor de directorios
        closedir($gestor);
    } else {
        echo "No es una ruta de directorio valida<br/>";
    }
$arrayDatos = array('listaFiles' => $htmlOptions);
				echo json_encode($arrayDatos,JSON_UNESCAPED_UNICODE);
    die();
		}



public function resturar(){
	    // Connect & select the database
    $db = new mysqli("ec2-18-191-71-210.us-east-2.compute.amazonaws.com", "will", "will", "db_ferreteria"); 

    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $filePath='./Backups/db_ferreteria.sql';
    $lines = file($filePath);
    var_dump($lines);
    $error = ''; 
    
    // Loop through each line
    foreach ($lines as $line){
        // Skip it if it's a comment
        if(substr($line, 0, 2) == '--' || $line == ''){
            var_dump("entre");
            continue;
        }
        
        // Add this line to the current segment
        $templine .= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';'){
            // Perform the query
            if(!$db->query($templine)){
                $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
            }
            
            // Reset temp variable to empty
            $templine = '';
        }
    }
    return !empty($error)?$error:true;
}

}
 ?>