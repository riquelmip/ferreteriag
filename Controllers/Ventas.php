<?php 

	class Ventas extends Controllers{
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

		public function Ventas()
		{
			//si no tiene permiso de usuarios, lo rediccionara
			if (empty($_SESSION['permisosMod']['leer'])) {
				header('location: '.base_url().'/dashboard');
			}
			$data['page_tag'] = "Ventas";//Nombre superior
			$data['page_name'] = "ventas";//Nombre de la pagina 
			$data['page_title'] = "Ventas"; //Nombre del titulo en la vista
			$data['page_functions_js'] = "functions_venta.js";// Funcion de js para las acciones
			$this->views->getView($this,"ventas",$data);//Se refiere al nombre de la vista
		}
		public function getVentas()
		{
			if ($_SESSION['permisosMod']['leer']) {
				$arrData = $this->model->selectVentas();
             
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = "";
					$btnEdit = "";
					$btnDelete = "";
					//concatenamos la fecha XD
					$fecha= $arrData[$i]['dia'] ."/". $arrData[$i]['mes'] ."/". $arrData[$i]['anio'];
					$arrData[$i]['fecha']=$fecha;
					

					if ($_SESSION['permisosMod']['leer']) {
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewVenta('.$arrData[$i]['idventa'].')" title="Ver venta"><i class="far fa-eye"></i></button>';
					}
					
					
					//agregamos los botones
					$arrData[$i]['opciones'] = '<div class="text-center">'.$btnView.' </div>';

				
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}


		public function getCadena($idcadena){
			
				$idCadena = intval($idcadena);
				if($idCadena > 0)
				{
					$arrData = $this->model->selectCadena($idCadena);
					for ($i=0; $i < count($arrData); $i++) {
						$conver = round($arrData[$i]['precioventa'],2);

						$datito="$".$conver;
						$arrData[$i]['precioventa'] = $datito;

					}

					if(empty($arrData))
					{
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
		
			die();
		}

        
	}
    ?>