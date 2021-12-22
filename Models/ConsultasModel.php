<?php 

	class ConsultasModel extends Mysql
	{
		public $intId;
		public $strNombre;

		public function __construct()
		{
			parent::__construct();
		}

		public function selectConsulta()
		{

			$sql = "SELECT p.descripcion,SUM(dv.cantidad) as canti from detalleventa dv INNER JOIN producto p on p.idproducto=dv.idproducto GROUP BY p.descripcion order by SUM(dv.cantidad) desc LIMIT 10";
			$request = $this->select_all($sql);
			return $request;
		}


		public function selectVenta(int $idventa) 
		{

			$sql = "SELECT 
					v.idventa,
					v.dia,
					v.mes,
					v.anio,
					v.monto,
					v.estado,
					v.subtotal,
					v.iva,
					CONCAT(c.nombre,' ',c.apellido)  AS cliente,
					dv.iddetalle,
					dv.idproducto,
					p.descripcion as producto,
					dv.cantidad,
					p.precio
					FROM detalleventa dv
					INNER JOIN venta v ON dv.idventa = v.idventa
					INNER JOIN producto p ON p.idproducto= dv.idproducto
					INNER JOIN cliente c ON v.idcliente = c.idcliente
					WHERE v.idventa = $idventa";
			$request = $this->select_all($sql);
			return $request;
		}
	}
 ?>