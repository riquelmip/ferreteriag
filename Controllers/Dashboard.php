<?php 

	class Dashboard extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			session_regenerate_id(true); //para seguridad de sesiones, el id anterior se eliminara y creara uno nuevo
			if (empty($_SESSION['login'])) {
				header('location: '.base_url().'/login');
			}
			//Como este controlador muestra la vista del dashboard, y como en la base el modeulo dashboard tiene el id 1, por eso ese se manda de param
			getPermisos(1);
		}

		public function dashboard()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Inicio - Ferreteria";
			$data['page_title'] = "Inicio - Ferreteria Granadeño";
			$data['page_name'] = "dashboard";
			$data['page_functions_js'] = "functions_dashboard.js";
			$this->views->getView($this,"dashboard",$data);
		}


		public function getDisPuesto()
	{

		$arrData = $this->model->selectF();
		$arrData2 = $this->model->select2();
		for ($i=0; $i < count($arrData); $i++) {
		if (count($arrData) > 0) {
			$femenino = count($arrData);
		} else {
			$femenino = 0;
		}
             
		

			$fecha= $arrData[$i]['dia'] ."/". $arrData[$i]['mes'] ."/". $arrData[$i]['anio'];
			$arrData[$i]['dia']=$fecha;
			$datito="$".$arrData[$i]['credito'];
			$arrData[$i]['credito'] = $datito;
			$datito2="$".$arrData[$i]['monto'];
			$arrData[$i]['monto'] = $datito2;
			if ($arrData[$i]['credito']=='$0') {
				$arrData[$i]['credito']="Pago al crédito";
			}
			if($arrData[$i]['fecha_credito']=='0000-00-00'){
				$arrData[$i]['fecha_credito'] = "Pago al crédito";
			}else{
				$cambio = date_format(date_create_from_format('Y-m-d', $arrData[$i]['fecha_credito']), 'd/m/Y'); ;
			
				$arrData[$i]['fecha_credito'] = $cambio;
			}

			if ($_SESSION['permisosMod']['leer']) {
				$btnView = '<button class="btn btn-info btn-sm btnViewEmpleado" onClick="fntViewCadenaAv('.$arrData[$i]['idcompra'].')" title="Ver usuario"><i class="far fa-eye"></i></button>';
			}
			//si tiene permiso de editar se agrega el botn
			//si tiene permiso de eliminar se agrega el boton
			
			//agregamos los botones
			$arrData[$i]['opciones'] = '<div class="text-center">'.$btnView.' </div>';

		
		}

		

		$arrayDatos = array('femenino' => $femenino);
		echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);

		die();
	}

	}


 ?>