<?php 

	class DashboardModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function obtenerTotalVentas(){
			
			$sql = "SELECT TRUNCATE(SUM(v.monto),2) as totalVenta
					FROM venta v WHERE v.mes = MONTH(NOW()) AND v.anio = YEAR(NOW())";
			$request = $this->select($sql);
			return $request;
		}
		public function obtenerTotalCompra(){
			
			$sql = "SELECT TRUNCATE(SUM(c.monto),2) AS totalCompra 
					FROM compra c WHERE c.mes = MONTH(NOW()) AND c.anio = YEAR(NOW())";
			$request = $this->select($sql);
			return $request;
		}

		public function obtenerTotalCredito(){
			
			$sql = "SELECT TRUNCATE(SUM(c.credito),2) AS totalCredito 
					FROM compra c WHERE MONTH(c.fecha_credito) = MONTH(NOW()) AND YEAR(C.fecha_credito) = YEAR(NOW()) AND c.estado=0";
			$request = $this->select($sql);
			return $request;
		}

		public function obtenerVentasPrimerosTresMeses(){
			
			$sql = "SELECT v.mes,
					ROUND(SUM(v.monto),2) AS total
					FROM venta v
					WHERE v.anio = YEAR(NOW())
					GROUP BY v.mes ORDER BY v.mes DESC LIMIT 3";
			$request = $this->select_all($sql);
			return $request;
		}

		public function productosStockMenor(){
			
			$sql = "SELECT c.nombre,
					p.stock
					FROM producto p
					INNER JOIN categoria c on c.idcategoria = p.idcategoria
					WHERE p.stock < 10
					GROUP BY c.nombre";
			$request = $this->select_all($sql);
			return $request;
		}

		public function creditosPorProveedores(){
			
			$sql = "SELECT p.nombre,
					SUM(c.credito) AS total
					FROM compra c
					INNER JOIN proveedor p on p.idproveedor = c.idproveedor
					WHERE MONTH(c.fecha_credito) - MONTH(NOW()) < 3 and c.estado=0
					GROUP BY c.idproveedor ORDER BY SUM(c.credito) ASC lIMIT 3";
			$request = $this->select_all($sql);
			return $request;
		}
	}
 ?>