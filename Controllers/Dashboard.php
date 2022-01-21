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

			if (empty($_SESSION['login'])) {
				header('location: '.base_url().'/login');
			}

			$data['page_id'] = 2;
			$data['page_tag'] = "Inicio - Ferreteria";
			$data['page_title'] = "Inicio - Ferreteria Granadeño";
			$data['page_name'] = "dashboard";
			$data['page_functions_js'] = "functions_dashboard.js";
			$this->views->getView($this,"dashboard",$data);
		}



	public function getDatos(){
		
		if ($_SESSION['permisosMod']['leer']) {

			$totalVentas = $this->model->obtenerTotalVentas();
			$totalCompras = $this->model->obtenerTotalCompra();
			$totalCreditos = $this->model->obtenerTotalCredito();

			


			if($totalVentas['totalVenta'] == ''){	
				$totalVentas['totalVenta'] = 0;
			}else{
				$totalVentas['totalVenta'] = $totalVentas['totalVenta'];
			}

			if($totalCompras['totalCompra'] == ''){	
				$totalCompras['totalCompra'] = 0;
			}else{
				$totalCompras['totalCompra'] = $totalCompras['totalCompra'];
			}

			if($totalCreditos['totalCredito'] == ''){	
				$totalCreditos['totalCredito'] = 0;
			}else{
				$totalCreditos['totalCredito'] = $totalCreditos['totalCredito'];
			}

			$arrayDatos = array('totalVenta' => $totalVentas, 'totalCompra' => $totalCompras,'totalCredito' => $totalCreditos);

			echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);
		}
		die();

	}


		public function productosStock(){

			if ($_SESSION['permisosMod']['leer']) {

				
				$arrData = $this->model->productosStockMenor();

				echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			}
				
			die();
		}




		
		


	}


 ?>