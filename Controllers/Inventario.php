<?php 

	class Inventario extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			session_regenerate_id(true); //para seguridad de sesiones, el id anterior se eliminara y creara uno nuevo
			if (empty($_SESSION['login'])) {
				header('location: '.base_url().'/login');
			}
			getPermisos(8); //tiene parametro 2 porque es el de usuario, osea que lo estamos poniendo junto, ya que si tiene acceso a usuario tiene a roles
		}

		public function Inventario()
		{
			//si no tiene permiso de usuarios, lo rediccionara
			if (empty($_SESSION['permisosMod']['leer'])) {
				header('location: '.base_url().'/dashboard');
			}
			$data['page_id'] = 11;
			$data['page_tag'] = "Inventario";
			$data['page_name'] = "inventario";
			$data['page_title'] = "Inventario <small> Ferretería</small>";
			$data['page_functions_js'] = "functions_inventario.js";
			$this->views->getView($this,"inventario",$data);
		}

		
		public function getInventario(){

			if ($_SESSION['permisosMod']['leer']) {

				$arrData = $this->model->selectInventario();

				for ($i=0; $i < count($arrData); $i++) {
					
					$btnView = "";

					//si tiene permiso de eliminar se agrega el boton
					if ($_SESSION['permisosMod']['actualizar']) {
						$btnView = '<button class="btn btn-info btn-sm btnVerDetallesProd" onClick="fntPermisos('.$arrData[$i]['idproducto'].')" title="Permisos"><i class="far fa-eye"></i></button>';
					}
					//agregamos los botones
					$arrData[$i]['opciones'] = '<div class="text-center">'.$btnView.'</div>';

				
				}

				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}


	}

    

 ?>