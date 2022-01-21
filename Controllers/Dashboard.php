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
			$arrData = $this->model->obtenerVentasPrimerosTresMeses();
			$productosStock = $this->model->productosStockMenor();
			
				for ($i = 0; $i <count($arrData) ; $i++) {
					$arrData[$i]['mes'] = $this->obtenerMes(intval($arrData[$i]['mes']));
				}

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

			$arrayDatos = array('totalVenta' => $totalVentas, 'totalCompra' => $totalCompras,'totalCredito' => $totalCreditos,'ventas' => $arrData, 'productos' => $productosStock);

			echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);
		}
		die();

	}
		public function getventasMeses(){

			if ($_SESSION['permisosMod']['leer']) {

				$arrData = $this->model->obtenerVentasPrimerosTresMeses();
				for ($i = 0; $i <count($arrData) ; $i++) {
					$arrData[$i]['mes'] = $this->obtenerMes(intval($arrData[$i]['mes']));
				}
					
				echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
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

		public function creditosProveedores(){

			if ($_SESSION['permisosMod']['leer']) {
				$arrData = $this->model->creditosPorProveedores();
				
				echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			}
			die();
		}


		function obtenerMes($mes){
  
	    switch($mes){
	      case 1:
	        return $mes = "Enero";
	      break;
	      case 2:
	        return $mes = "Febrero";
	      break;
	      case 3:
	        return $mes = "Marzo";
	      break;
	      case 4:
	        return $mes = "Abril";
	      break;
	      case 5:
	        return $mes = "Mayo";
	      break;
	      case 6:
	        return $mes = "Junio";
	      break;
	      case 7:
	        return $mes = "Julio";
	      break;
	      case 8:
	        return $mes = "Agosto";
	      break;
	      case 9:
	        return $mes = "Septiembre";
	      break;
	      case 10:
	        return $mes = "Octubre";
	      break;
	      case 11:
	        return $mes = "Noviembre";
	      break;
	      case 12:
	        return $mes = "Diciembre";
	      break;
	    }
	}	
		


	}
