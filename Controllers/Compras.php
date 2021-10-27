<?php 

	class Compras extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			session_regenerate_id(true); //para seguridad de sesiones, el id anterior se eliminara y creara uno nuevo
			if (empty($_SESSION['login'])) {
				header('location: '.base_url().'/login');
			}
			getPermisos(13); //tiene parametro 2 porque es el de usuario, osea que lo estamos poniendo junto, ya que si tiene acceso a usuario tiene a roles
		}

		public function Compras()
		{
			//si no tiene permiso de usuarios, lo rediccionara
			if (empty($_SESSION['permisosMod']['leer'])) {
				header('location: '.base_url().'/dashboard');
			}
			$data['page_tag'] = "Compra";//Nombre superior
			$data['page_name'] = "rol_categoria";//Nombre de la pagina 
			$data['page_title'] = "Compra"; //Nombre del titulo en la vista
			$data['page_functions_js'] = "functions_compra.js";// Funcion de js para las acciones
			$this->views->getView($this,"compras",$data);//Se refiere al nombre de la vista
		}
		public function getCompras()
		{
			if ($_SESSION['permisosMod']['leer']) {
				$arrData = $this->model->selectCategorias();
             
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = "";
					$btnEdit = "";
					$btnDelete = "";
					//concatenamos la fecha XD
					$fecha= $arrData[$i]['dia'] ."/". $arrData[$i]['mes'] ."/". $arrData[$i]['anio'];
					$arrData[$i]['dia']=$fecha;
					$datito="$".$arrData[$i]['credito'];
					$arrData[$i]['credito'] = $datito;
					$datito2="$".$arrData[$i]['monto'];
					$arrData[$i]['monto'] = $datito2;
					
					if ($_SESSION['permisosMod']['leer']) {
						$btnView = '<button class="btn btn-info btn-sm btnViewEmpleado" onClick="fntViewEmpleado('.$arrData[$i]['idcompra'].')" title="Ver usuario"><i class="far fa-eye"></i></button>';
					}
					//si tiene permiso de editar se agrega el botn
					//si tiene permiso de eliminar se agrega el boton
					
					//agregamos los botones
					$arrData[$i]['opciones'] = '<div class="text-center">'.$btnView.' </div>';

				
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
        
	}
    ?>