<?php 

	class VentasModel extends Mysql
	{
		public $intId;
		public $strNombre;
		private $intIdCadena;
		public function __construct()
		{
			parent::__construct();
		}

		public function selectVentas() 
		{

			$sql = "SELECT 
					v.idventa,
					v.dia,
					v.mes,
					v.anio,
					v.monto,
					v.estado,
					CONCAT(c.nombre,' ',c.apellido)  AS cliente
					FROM venta v
					INNER JOIN cliente c ON v.idcliente = c.idcliente";
			$request = $this->select_all($sql);
			return $request;
		}
		

		public function selectCadena(int $idcadena){
			$this->intIdCadena = $idcadena;
			$sql = "SELECT d.iddetalle,d.idcompra,d.idproducto,d.cantidad,d.precioventa,p.nombre FROM detallecompra d inner join compra c on c.idcompra=d.idcompra inner join proveedor p on p.idproveedor=c.idproveedor  WHERE c.idcompra= $idcadena";
			$request = $this->select_all($sql);
			return $request;
		}



	}
 ?>