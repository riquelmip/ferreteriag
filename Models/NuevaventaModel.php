<?php 

	class NuevaventaModel extends Mysql
	{
		public $intId;
		public $strNombre;

		public function __construct()
		{
			parent::__construct();
		}


		public function selectClientes()
		{

			$sql = "SELECT * FROM cliente WHERE estado != 0";
			$request = $this->select_all($sql);
			return $request;
		}

		public function insertCliente(string $dui, string $nombre, string $apellido, string $telefono, int $estado){

			$return = "";
			$this->strDui = $dui;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->strTelefono = $telefono;
			$this->intEstado = $estado;

			if ($this->strDui == "" ) {
				$sql = "SELECT * FROM cliente WHERE nombre = '{$this->strNombre}' AND apellido = '{$this->strApellido}' ";
				$request = $this->select_all($sql);
			}else{
				$sql = "SELECT * FROM cliente WHERE dui = '{$this->strDui}'";
				$request = $this->select_all($sql);
			}
			

			if(empty($request))
			{
				$query_insert  = "INSERT INTO cliente(dui,nombre,apellido,estado,telefono) VALUES(?,?,?,?,?)";
	        	$arrData = array($this->strDui,$this->strNombre,$this->strApellido,$this->intEstado,$this->strTelefono);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	

		public function selectProducto(string $codigo){
			$this->intIdProducto = $codigo;
			$sql = "SELECT
					p.idproducto,
					p.codigobarra,
					p.descripcion,
					p.stock,
					p.precio,
					p.idcategoria,
					c.nombre AS categoria,
					p.idmarca,
					m.nombre AS marca,
					p.idunidadmedida,
					u.nombre AS unidadmedida,
					p.estado 
				FROM
					producto p
					INNER JOIN categoria c ON p.idcategoria = c.idcategoria
					INNER JOIN marca m ON p.idmarca = m.idmarca
					INNER JOIN unidadmedida u ON p.idunidadmedida = u.idunidad
					WHERE codigobarra = '$this->intIdProducto'";
			$request = $this->select($sql);
			return $request;

		}

		public function selectProductos()
		{
			
			//EXTRAE ROLES
			$sql = "SELECT * FROM producto WHERE estado != 0 and estado !=2";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectProductod(string $iddetalle)
		{
			$sql = "SELECT * FROM producto WHERE idproducto = '$iddetalle'";
			$request = $this->select_all($sql);
			return $request;
		}




		public function date()
		{

			$sql = "select CURRENT_DATE";
			$request = $this->select($sql);
			return $request;
		}



		public function insertarCompra(string $nombre,string $monto, string $credito, string $fecha){
 //Estado 0 sera Pendiente
			$return = "";

			$sql = "SELECT * FROM compra WHERE credito = '$nombre'";
			$request = $this->select_all($sql);
            $dia = date("d");
			$mes = date("m");
			$anio = date("Y");
			$estado = 0;
			$idusuario =  $_SESSION['idUser'];
			if(empty($request))
			{
				$query_insert  = "INSERT INTO compra(idproveedor,dia,mes,anio,monto,idusuario,estado,credito,fecha_credito) VALUES(?,?,?,?,?,?,?,?,?)";
	        	$arrData = array($nombre,$dia,$mes,$anio,$monto,$idusuario,$estado,$credito,$fecha);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}



			return $return;
		}	


		public function insertDetalleCadena(String $idcompra,String $idproducto,String $cantidad,String $preciocompra,String $precioventa){

			$return = "";


				$query_insert  = "INSERT INTO detallecompra(idcompra,idproducto,cantidad,preciocompra,precioventa) VALUES(?,?,?,?,?)";
	        	$arrData = array($idcompra, $idproducto,$cantidad,$preciocompra,$precioventa);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;


			$query = "UPDATE producto SET stock = (Select stock from producto where idproducto= '$idproducto') + ? where idproducto = '$idproducto'";
			$arrData2 = array($cantidad);
			$request1 = $this->update($query,$arrData2);


			return $return;
		}	



		public function updateCategoria(int $idcat,string $nombre){
			$this->intIdcat = $idcat;
			$this->strNombre = $nombre;


			$sql = "SELECT * FROM categoria WHERE nombre = '$this->strNombre'";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE categoria SET nombre = ? WHERE idcategoria = $this->intIdcat ";
				$arrData = array($this->strNombre);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteCategoria(int $idrol)
		{
			$this->intIdrol = $idrol;
			$sql = "Select c.idcategoria from categoria c right join producto p on c.idcategoria=p.idcategoria  where p.idcategoria = $this->intIdrol";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "DELETE FROM categoria WHERE idcategoria = $this->intIdrol ";
				$arrData = array(0);
				$request = $this->update($sql,$arrData);
				if($request)
				{
					$request = 'ok';	
				}else{
					$request = 'error';
				}
			}else{
				$request = 'exist';
			}
			return $request;
		}
	}
 ?>