<?php 

	class Consultas extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			session_regenerate_id(true); //para seguridad de sesiones, el id anterior se eliminara y creara uno nuevo
			if (empty($_SESSION['login'])) {
				header('location: '.base_url().'/login');
			}
			getPermisos(2); //tiene parametro 2 porque es el de usuario, osea que lo estamos poniendo junto, ya que si tiene acceso a usuario tiene a Consulta
		}

		public function Consultas()
		{
			//si no tiene permiso de usuarios, lo rediccionara
		if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
		}
		$data['page_id'] = 3;
		$data['page_tag'] = "Productos sin stock";
		$data['page_name'] = "consulta_1";
		$data['page_title'] = "Parámetros: ";
		 $data['page_functions_js'] = "functions_consulta.js";
			$this->views->getView($this,"consultas",$data);
		}

        public function Reportes()
		{
			//si no tiene permiso de usuarios, lo rediccionara
		if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
		}
		$data['page_id'] = 3;
		$data['page_tag'] = "Productos sin stock";
		$data['page_name'] = "consulta_1";
		$data['page_title'] = "Parámetros: ";
		 $data['page_functions_js'] = "functions_consulta.js";
			$this->views->getView($this,"ferreteria",$data);
		}

		 public function ProductoMenosVendido()
		{
			//si no tiene permiso de usuarios, lo rediccionara
		if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
		}
		$data['page_id'] = 3;
		$data['page_tag'] = "Productos sin stock";
		$data['page_name'] = "consulta_1";
		$data['page_title'] = "Parámetros: ";
			$this->views->getView($this,"productomenosvendido",$data);
		}

		public function getRoles()
		{
			if ($_SESSION['permisosMod']['leer']) {
				$arrData = $this->model->selectConsulta();
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}


	}
 ?>