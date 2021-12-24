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
			$this->views->getView($this,"reportes/ferreteria",$data);
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
			$this->views->getView($this,"reportes/productomenosvendido",$data);
		}


		public function productosmasvendidos10()
		{
			if ($_SESSION['permisosMod']['leer']) {
				$arrData = $this->model->selectConsulta();
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}



		public function getRoles()
		{
			if ($_SESSION['permisosMod']['leer']) {
				$arrData = $this->model->selectConsulta();
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getDiscapacidades()
		{
	
			$arrData = $this->model->selectConsulta();
			$htmlDatosTabla = "";
			for ($i = 0; $i < count($arrData); $i++) {
		
	
	

	
	
				$htmlDatosTabla .= '<tr>
						<td>' . $arrData[$i]['descripcion'] . '</td>
						<td>' . $arrData[$i]['canti'] . '</td>

					
					 </tr>';
			}
			$arrayDatos = array('datosIndividuales' => $arrData, 'htmlDatosTabla' => $htmlDatosTabla);
			echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);
	
			die();
		}





		public function getRoles2(string $dato)
		{

			$arrData = $this->model->filtrofecha10productosmasvendidos($dato);

			$htmlDatosTabla = "";
			for ($i = 0; $i < count($arrData); $i++) {
				
				
		
			$htmlDatosTabla .= '<tr>
					<td>' . $arrData[$i]['descripcion'] . '</td>
					<td>' . $arrData[$i]['canti'] . '</td>

				 </tr>';
		
		}

		$arrayDatos = array('datosIndividuales' => $arrData, 'htmlDatosTabla' => $htmlDatosTabla);
		echo json_encode($arrayDatos,JSON_UNESCAPED_UNICODE);
		
		die();
		}



		public function imprimirticket($idventa){
			//if($_SESSION['permisosMod']['leer']){
				$id = $idventa;
				if($id > 0){
					$arrData = $this->model->selectVenta($id);
					if(empty($arrData)){
						$this->views->getView("Errors","error");
					}else{
						
						$data['productos'] = $arrData;
						$data['idventa'] = $arrData[0]['idventa'];
						$data['fecha'] = $arrData[0]['dia']."/".$arrData[0]['mes']."/".$arrData[0]['anio'];
						$data['subtotal'] = $arrData[0]['subtotal'];
						$data['iva'] = $arrData[0]['iva'];
						$data['total'] = $arrData[0]['monto'];
						$data['cliente'] = $arrData[0]['cliente'];
						$data['vendedor'] = $_SESSION['userData']['nombre'].' '.$_SESSION['userData']['apellido'] ;
						$this->views->getView($this,"ticket",$data);
					}
					echo json_encode($data,JSON_UNESCAPED_UNICODE);
				}
			//}
			die();
		}

		public function imprimirfactura($idventa){
			//if($_SESSION['permisosMod']['leer']){
				$id = $idventa;
				if($id > 0){
					$arrData = $this->model->selectVenta($id);
					if(empty($arrData)){
						$this->views->getView("Errors","error");
					}else{
						
						$data['productos'] = $arrData;
						$data['idventa'] = $arrData[0]['idventa'];
						$data['fecha'] = $arrData[0]['dia']."/".$arrData[0]['mes']."/".$arrData[0]['anio'];
						$data['subtotal'] = $arrData[0]['subtotal'];
						$data['iva'] = $arrData[0]['iva'];
						$data['total'] = $arrData[0]['monto'];
						$data['cliente'] = $arrData[0]['cliente'];
						$data['vendedor'] = $_SESSION['userData']['nombre'].' '.$_SESSION['userData']['apellido'] ;
						$this->views->getView($this,"factura",$data);
					}
					echo json_encode($data,JSON_UNESCAPED_UNICODE);
				}
			//}
			die();
		}

	}
 ?>