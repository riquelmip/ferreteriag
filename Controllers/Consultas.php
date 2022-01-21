<?php 

	class Consultas extends Controllers{
		public function __construct(){
			parent::__construct();
			session_start();
			session_regenerate_id(true); 
			if (empty($_SESSION['login'])) {
				header('location: '.base_url().'/login');
			}
			getPermisos(2); 
		}
///////////Funciones para vistas
		public function Consultas(){ //Vista primera consulta

			if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
			}
			$data['page_id'] = 3;
			$data['page_tag'] = "Producto más vendido";
			$data['page_name'] = "consulta_1";
			$data['page_title'] = "Parámetros: ";
		 	$data['page_functions_js'] = "functions_productomasvendido.js";
			$this->views->getView($this,"productomasvendido",$data);
		}
		public function productomenosvendidovista(){ //Vista segunda consulta

			if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
			}
			$data['page_id'] = 3;
			$data['page_tag'] = "Productos menos vendido";
			$data['page_name'] = "consulta_1";
			$data['page_title'] = "Parámetros: ";
			 $data['page_functions_js'] = "functions_productomenosvendido.js";
			$this->views->getView($this,"productomenosvendido",$data);
		}

		public function clientesconmayorcomprasvista(){ //Vista tercera consulta

			if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
			}
			$data['page_id'] = 3;
			$data['page_tag'] = "Clientes con mayor indice de compra";
			$data['page_name'] = "consulta_1";
			$data['page_title'] = "Parámetros: ";
			 $data['page_functions_js'] = "functions_clientesconmayorcompra.js";
			$this->views->getView($this,"clientesconmayorcomprasvista",$data);
		}

		public function clientesconmenorcomprasvista(){ //Vista cuatro consulta

			if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
			}
			$data['page_id'] = 3;
			$data['page_tag'] = "Cliente con menor compra";
			$data['page_name'] = "consulta_1";
			$data['page_title'] = "Parámetros: ";
			 $data['page_functions_js'] = "functions_clientesconmenorcompra.js";
			$this->views->getView($this,"clienteconmenorcompravista",$data);
		}
		public function empleadosconmayorventa(){ //Vista cinco consulta

			if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
			}
			$data['page_id'] = 3;
			$data['page_tag'] = "Empleados mayor ventas";
			$data['page_name'] = "consulta_1";
			$data['page_title'] = "Parámetros: ";
			 $data['page_functions_js'] = "functions_empleadoconmayorventa.js";
			$this->views->getView($this,"mayorindicedeventa",$data);
		}
		public function empleadosconmenorventa(){ //Vista seis consulta

			if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
			}
			$data['page_id'] = 3;
			$data['page_tag'] = "Empleados menos ventas";
			$data['page_name'] = "consulta_1";
			$data['page_title'] = "Parámetros: ";
			 $data['page_functions_js'] = "functions_empleadoconmenorventa.js";
			$this->views->getView($this,"menorindicedeventa",$data);
		}

		public function ventasanuladasdelmes(){ //Vista seis consulta

			if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
			}
			$data['page_id'] = 3;
			$data['page_tag'] = "Ventas anuladas del Mes";
			$data['page_name'] = "consulta_1";
			$data['page_title'] = "Parámetros: ";
			 $data['page_functions_js'] = "functions_ventasanuladasdelmes.js";
			$this->views->getView($this,"ventasanuladasdelmes",$data);
		}
		public function stocklimitado10(){ //Vista siete consulta

			if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
			}
			$data['page_id'] = 3;
			$data['page_tag'] = "Productos menos vendido";
			$data['page_name'] = "consulta_1";
			$data['page_title'] = "Parámetros: ";
			 $data['page_functions_js'] = "functions_productomenosvendido.js";
			$this->views->getView($this,"clientesconmayorcomprasvista",$data);
		}

///////////Funciones para grafico
		public function productosmasvendidos() //primera consulta grafico
		{
			$arrData = $this->model->selectConsulta();
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		}

		public function ventasanuladasdelmesgrafico() //septima consulta grafico
		{
			$arrData = $this->model->selectConsultaventaanulada();
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		}

		public function productosmasvendidosfecha(string $dato) //primera consulta grafico con fecha
		{
			$arrData = $this->model->filtrofecha10productosmasvendidos($dato);
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		}

		public function productomenosvendidos() //segunda consulta grafico
		{
	
			$arrData = $this->model->productomenosvendidoconsulta();
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		}

		public function productomenosvendidosfecha(string $dato) //segunda consulta grafico con fecha
		{
	
			$arrData = $this->model->productomenosvendidoconsultafiltradafecha($dato);
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		}

		public function clientemayorcompra() //tercera consulta grafico
		{
			$arrData = $this->model->clientesmascompras();
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		}

		public function clientemayorcomprafecha(string $dato) //tercera consulta grafico con fecha
		{
			$arrData = $this->model->clientemayorcomprasfiltrada($dato);
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		}

		public function clientemenorcompra() //cuarta consulta grafico
		{
			$arrData = $this->model->clientesmenoscompras();
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		}

		public function clientemenorcomprafecha(string $dato) //cuarta consulta grafico con fecha
		{
			$arrData = $this->model->clientemenorcomprasfiltrada($dato);
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		}

		public function empleadosconmayorventas() //quinta consulta grafico
		{
			$arrData = $this->model->empleadosconmasventas();
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		}

		public function empleadosconmayorventasfecha(string $dato) //quinta consulta grafico con fecha
		{
			$arrData = $this->model->empleadomayorventafiltradaporfecha($dato);
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		}

		public function empleadosconmenorventas() //sexta consulta grafico
		{
			$arrData = $this->model->empleadosconmenosventas();
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		}

		public function empleadosconmenorventasfecha(string $dato) //sexta consulta grafico
		{
			$arrData = $this->model->empleadomenorventafiltradaporfecha($dato);
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		}



///////////Funciones para tabla 
		public function productosmasvendidosconsulta() //primera consulta tabla
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
			echo json_encode($arrayDatos,JSON_UNESCAPED_UNICODE);
	
			die();
		}

		public function ventasanuladasdelmestabla() //primera consulta tabla
		{
	
			$arrData = $this->model->selectConsultaventaanulada();
			$htmlDatosTabla = "";
			for ($i = 0; $i < count($arrData); $i++) {
			$htmlDatosTabla .= '<tr>
						<td>' . $arrData[$i]['idventa'] . '</td>
						<td>' . $arrData[$i]['nombre'] . '</td>
						<td>' . $arrData[$i]['subtotal'] . '</td>
					 			</tr>';
			}
			
			
			$arrayDatos = array('datosIndividuales' => $arrData, 'htmlDatosTabla' => $htmlDatosTabla);
			echo json_encode($arrayDatos,JSON_UNESCAPED_UNICODE);
	
			die();
		}
		public function productosmenosvendidos() //segunda consulta tabla
		{
	
			$arrData = $this->model->productomenosvendidoconsulta();
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
		public function clientemayorcompras() //tercera consulta tabla
		{
	
			$arrData = $this->model->clientesmascompras();
			$htmlDatosTabla = "";
			for ($i = 0; $i < count($arrData); $i++) {
			$htmlDatosTabla .= '<tr>
						<td>' . $arrData[$i]['nombre'] . '</td>
						<td>' . $arrData[$i]['apellido'] . '</td>
						<td>' . $arrData[$i]['idcliente'] . '</td>
						<td>' . $arrData[$i]['monto'] . '</td>
					 			</tr>';
			}
			$arrayDatos = array('datosIndividuales' => $arrData, 'htmlDatosTabla' => $htmlDatosTabla);
			echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);
	
			die();
		}

		public function clientemenorcompras() //cuarta consulta tabla
		{
	
			$arrData = $this->model->clientesmenoscompras();
			$htmlDatosTabla = "";
			for ($i = 0; $i < count($arrData); $i++) {
			$htmlDatosTabla .= '<tr>
						<td>' . $arrData[$i]['nombre'] . '</td>
						<td>' . $arrData[$i]['apellido'] . '</td>
						<td>' . $arrData[$i]['idcliente'] . '</td>
						<td>' . $arrData[$i]['monto'] . '</td>
					 			</tr>';
			}
			$arrayDatos = array('datosIndividuales' => $arrData, 'htmlDatosTabla' => $htmlDatosTabla);
			echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);
	
			die();
		}
		public function empleadoconmayorventas() //quinta consulta tabla
		{
	
			$arrData = $this->model->empleadosconmasventas();
			$htmlDatosTabla = "";
			for ($i = 0; $i < count($arrData); $i++) {
			$htmlDatosTabla .= '<tr>
						<td>' . $arrData[$i]['nombre'] . '</td>
						<td>' . $arrData[$i]['apellido'] . '</td>
						<td>' . $arrData[$i]['idempleado'] . '</td>
						<td>' . $arrData[$i]['monto'] . '</td>
					 			</tr>';
			}
			$arrayDatos = array('datosIndividuales' => $arrData, 'htmlDatosTabla' => $htmlDatosTabla);
			echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);
	
			die();
		}
		public function empleadoconmenorventas() //sexta consulta tabla
		{
	
			$arrData = $this->model->empleadosconmenosventas();
			$htmlDatosTabla = "";
			for ($i = 0; $i < count($arrData); $i++) {
			$htmlDatosTabla .= '<tr>
						<td>' . $arrData[$i]['nombre'] . '</td>
						<td>' . $arrData[$i]['apellido'] . '</td>
						<td>' . $arrData[$i]['idempleado'] . '</td>
						<td>' . $arrData[$i]['monto'] . '</td>
					 			</tr>';
			}
			$arrayDatos = array('datosIndividuales' => $arrData, 'htmlDatosTabla' => $htmlDatosTabla);
			echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);
	
			die();
		}

/////////Consulta para vista filtradas
		public function getproductomasvendidoporfecha(string $dato)//primera consulta filtrada por fechas
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

		public function getproductomenosvendidoporfecha(string $dato)//segunda consulta filtrada por fechas
		{
			$arrData = $this->model->productomenosvendidoconsultafiltradafecha($dato);
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
		public function clientemayorcomprasfiltradaporfecha(string $dato)//tercera consulta filtrada por fechas
		{
			$arrData = $this->model->clientemayorcomprasfiltrada($dato);
			$htmlDatosTabla = "";
			for ($i = 0; $i < count($arrData); $i++) {
				$htmlDatosTabla .= '<tr>
						<td>' . $arrData[$i]['nombre'] . '</td>
						<td>' . $arrData[$i]['apellido'] . '</td>
						<td>' . $arrData[$i]['idcliente'] . '</td>
						<td>' . $arrData[$i]['monto'] . '</td>
					 			</tr>';		
		}
		$arrayDatos = array('datosIndividuales' => $arrData, 'htmlDatosTabla' => $htmlDatosTabla);
		echo json_encode($arrayDatos,JSON_UNESCAPED_UNICODE);
		
		die();
		}

		public function clientemenorcomprasfiltradaporfecha(string $dato)//cuarta consulta filtrada por fechas
		{
			$arrData = $this->model->clientemenorcomprasfiltrada($dato);
			$htmlDatosTabla = "";
			for ($i = 0; $i < count($arrData); $i++) {
				$htmlDatosTabla .= '<tr>
						<td>' . $arrData[$i]['nombre'] . '</td>
						<td>' . $arrData[$i]['apellido'] . '</td>
						<td>' . $arrData[$i]['idcliente'] . '</td>
						<td>' . $arrData[$i]['monto'] . '</td>
					 			</tr>';		
		}
		$arrayDatos = array('datosIndividuales' => $arrData, 'htmlDatosTabla' => $htmlDatosTabla);
		echo json_encode($arrayDatos,JSON_UNESCAPED_UNICODE);
		
		die();
		}
		public function empleadomayorventafiltradaporfecha(string $dato)//quinta consulta filtrada por fechas
		{
			$arrData = $this->model->empleadomayorventafiltradaporfecha($dato);
			$htmlDatosTabla = "";
			for ($i = 0; $i < count($arrData); $i++) {
				$htmlDatosTabla .= '<tr>
						<td>' . $arrData[$i]['nombre'] . '</td>
						<td>' . $arrData[$i]['apellido'] . '</td>
						<td>' . $arrData[$i]['idempleado'] . '</td>
						<td>' . $arrData[$i]['monto'] . '</td>
					 			</tr>';		
		}
		$arrayDatos = array('datosIndividuales' => $arrData, 'htmlDatosTabla' => $htmlDatosTabla);
		echo json_encode($arrayDatos,JSON_UNESCAPED_UNICODE);
		
		die();
		}

		public function empleadomenorventafiltradaporfecha(string $dato)//sexta consulta filtrada por fechas
		{
			$arrData = $this->model->empleadomenorventafiltradaporfecha($dato);
			$htmlDatosTabla = "";
			for ($i = 0; $i < count($arrData); $i++) {
				$htmlDatosTabla .= '<tr>
						<td>' . $arrData[$i]['nombre'] . '</td>
						<td>' . $arrData[$i]['apellido'] . '</td>
						<td>' . $arrData[$i]['idempleado'] . '</td>
						<td>' . $arrData[$i]['monto'] . '</td>
					 			</tr>';		
		}
		$arrayDatos = array('datosIndividuales' => $arrData, 'htmlDatosTabla' => $htmlDatosTabla);
		echo json_encode($arrayDatos,JSON_UNESCAPED_UNICODE);
		
		die();
		}


























		
		///////Reportes

		public function Reportes(){
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


		 public function ProductMenosVendidoReporte(){
			if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
			}
			$data['page_id'] = 3;
			$data['page_tag'] = "Productos sin stock";
			$data['page_name'] = "consulta_1";
			$data['page_title'] = "Parámetros: ";
			$this->views->getView($this,"reportes/productomenosvendidorepor",$data);
		}


		 public function conmayorventas(){
			if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
			}
			$data['page_id'] = 3;
			$data['page_tag'] = "Productos sin stock";
			$data['page_name'] = "consulta_1";
			$data['page_title'] = "Parámetros: ";
			$this->views->getView($this,"reportes/mayorindicedeventas",$data);
		}


		 public function conmenorventas(){
			if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
			}
			$data['page_id'] = 3;
			$data['page_tag'] = "Productos sin stock";
			$data['page_name'] = "consulta_1";
			$data['page_title'] = "Parámetros: ";
			$this->views->getView($this,"reportes/menorindicedeventas",$data);
		}

		

			 public function clientesmayorcompras(){
			if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
			}
			$data['page_id'] = 3;
			$data['page_tag'] = "Productos sin stock";
			$data['page_name'] = "consulta_1";
			$data['page_title'] = "Parámetros: ";
			$this->views->getView($this,"reportes/clientesmayorcompras",$data);
		}

			public function clientesmenorcompras(){
			if (empty($_SESSION['permisosMod']['leer'])) {
			header('location: '.base_url().'/dashboard');
			}
			$data['page_id'] = 3;
			$data['page_tag'] = "Productos sin stock";
			$data['page_name'] = "consulta_1";
			$data['page_title'] = "Parámetros: ";
			$this->views->getView($this,"reportes/clientesmenorcompras",$data);
		}

		/////////Venta
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