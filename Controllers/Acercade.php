<?php 

	class Acercade extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			session_regenerate_id(true); //para seguridad de sesiones, el id anterior se eliminara y creara uno nuevo
			if (empty($_SESSION['login'])) {
				header('location: '.base_url().'/login');
			}
 //tiene parametro 2 porque es el de usuario, osea que lo estamos poniendo junto, ya que si tiene acceso a usuario tiene a roles
		}

		public function Acercade()
		{
			//si no tiene permiso de usuarios, lo rediccionara
			if (empty($_SESSION['permisosMod']['leer'])) {
				header('location: '.base_url().'/dashboard');
			}
			$data['page_tag'] = "Acerca de";//Nombre superior
			$data['page_name'] = "Acerca de";//Nombre de la pagina 
			$data['page_title'] = "Acerca de"; //Nombre del titulo en la vista
			$data['page_functions_js'] = "functions_cargos.js";// Funcion de js para las acciones
			$this->views->getView($this,"acercade",$data);//Se refiere al nombre de la vista
		}

		
		

	}
 ?>