<?php 

	class ConsultasModel extends Mysql
	{


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

		public function selectConsultaventaanulada()
		{

			$sql = "SELECT * from venta v inner join cliente c on c.idcliente=v.idcliente where v.estado=2 and v.mes=EXTRACT(month from CURRENT_DATE)";
			$request = $this->select_all($sql);
			return $request;
		}
		public function filtrofecha10productosmasvendidos(string $dato)
		{
			$this->strNombre = $dato;
			$sql = "SELECT p.descripcion,SUM(dv.cantidad) as canti,CONCAT(v.anio, '-', CONCAT('0',v.mes), '-', v.dia) fecha_compra from detalleventa dv INNER JOIN producto p on p.idproducto=dv.idproducto inner join venta v on dv.idventa=v.idventa GROUP BY p.descripcion,v.dia having fecha_compra='$this->strNombre' order by SUM(dv.cantidad) desc LIMIT 10";
		
			$request = $this->select_all($sql);
		
			return $request;
		}

		public function productomenosvendidoconsulta()
		{

			$sql = "SELECT p.descripcion,SUM(dv.cantidad) as canti from detalleventa dv INNER JOIN producto p on p.idproducto=dv.idproducto GROUP BY p.descripcion order by SUM(dv.cantidad) asc LIMIT 10";
			$request = $this->select_all($sql);
			return $request;
		}
		public function productomenosvendidoconsultafiltradafecha(string $dato)
		{
			$this->strNombre = $dato;
			$sql = "SELECT p.descripcion,SUM(dv.cantidad) as canti,CONCAT(v.anio, '-', CONCAT('0',v.mes), '-', v.dia) fecha_compra from detalleventa dv INNER JOIN producto p on p.idproducto=dv.idproducto inner join venta v on dv.idventa=v.idventa GROUP BY p.descripcion,v.dia having fecha_compra='$this->strNombre' order by SUM(dv.cantidad) asc LIMIT 10";
		
			$request = $this->select_all($sql);
		
			return $request;
		}
		public function clientemayorcomprasfiltrada(string $dato)
		{
			$this->strNombre = $dato;
			$sql = "SELECT c.nombre,c.apellido,v.idcliente,SUM(v.monto) AS monto,CONCAT(v.anio, '-', CONCAT('0',v.mes), '-', v.dia) fecha_compra from venta v inner join cliente c on c.idcliente=v.idcliente GROUP BY v.idcliente having fecha_compra='$this->strNombre' order by SUM(v.monto) desc LIMIT 10";
		
			$request = $this->select_all($sql);
		
			return $request;
		}
		public function clientemenorcomprasfiltrada(string $dato)
		{
			$this->strNombre = $dato;
			$sql = "SELECT c.nombre,c.apellido,v.idcliente,SUM(v.monto) AS monto,CONCAT(v.anio, '-', CONCAT('0',v.mes), '-', v.dia) fecha_compra from venta v inner join cliente c on c.idcliente=v.idcliente GROUP BY v.idcliente having fecha_compra='$this->strNombre' order by SUM(v.monto) asc LIMIT 10";
		
			$request = $this->select_all($sql);
		
			return $request;
		}

		public function empleadomayorventafiltradaporfecha(string $dato)
		{
			$this->strNombre = $dato;
			$sql = "SELECT u.idempleado,e.nombre,e.apellido,v.idusuario,SUM(v.monto) AS monto,CONCAT(v.anio, '-', CONCAT('0',v.mes), '-', v.dia) fecha_compra from venta v inner join usuario u on u.idusuario=v.idusuario inner join empleado e on e.idempleado=u.idempleado GROUP BY v.idcliente having fecha_compra='$this->strNombre' order by SUM(v.monto) desc LIMIT 10";
		
			$request = $this->select_all($sql);
		
			return $request;
		}
		public function empleadomenorventafiltradaporfecha(string $dato)
		{
			$this->strNombre = $dato;
			$sql = "SELECT u.idempleado,e.nombre,e.apellido,v.idusuario,SUM(v.monto) AS monto,CONCAT(v.anio, '-', CONCAT('0',v.mes), '-', v.dia) fecha_compra from venta v inner join usuario u on u.idusuario=v.idusuario inner join empleado e on e.idempleado=u.idempleado GROUP BY v.idcliente having fecha_compra='$this->strNombre' order by SUM(v.monto) asc LIMIT 10";
		
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
					p.precio,
					p.codigobarra
					FROM detalleventa dv
					INNER JOIN venta v ON dv.idventa = v.idventa
					INNER JOIN producto p ON p.idproducto= dv.idproducto
					INNER JOIN cliente c ON v.idcliente = c.idcliente
					WHERE v.idventa = $idventa";
			$request = $this->select_all($sql);
			return $request;
		}

		
			public function productomenosvendido()
		{

			$sql = "SELECT c.nombre,v.idcliente,SUM(v.monto) AS monto from venta v inner join cliente c on c.idcliente=v.idcliente GROUP BY v.idcliente order by SUM(v.monto) asc LIMIT 10";
			$request = $this->select_all($sql);
			return $request;
		}

			public function clientesmascompras()
		{

			$sql = "SELECT c.nombre,c.apellido,v.idcliente,SUM(v.monto) AS monto from venta v inner join cliente c on c.idcliente=v.idcliente GROUP BY v.idcliente order by SUM(v.monto) desc LIMIT 10";
			$request = $this->select_all($sql);
			return $request;
		}

			public function clientesmenoscompras()
		{

			$sql = "SELECT c.nombre,c.apellido,v.idcliente,SUM(v.monto) AS monto from venta v inner join cliente c on c.idcliente=v.idcliente GROUP BY v.idcliente order by SUM(v.monto) asc LIMIT 10";
			$request = $this->select_all($sql);
			return $request;
		}

			public function empleadosconmasventas()
		{

			$sql = "SELECT u.idempleado,e.nombre,e.apellido,v.idusuario,SUM(v.monto) AS monto from venta v inner join usuario u on u.idusuario=v.idusuario inner join empleado e on e.idempleado=u.idempleado GROUP BY v.idcliente order by SUM(v.monto) desc LIMIT 10";
			$request = $this->select_all($sql);
			return $request;
		}

			public function empleadosconmenosventas()
		{

			$sql = "SELECT u.idempleado,e.nombre,e.apellido,v.idusuario,SUM(v.monto) AS monto from venta v inner join usuario u on u.idusuario=v.idusuario inner join empleado e on e.idempleado=u.idempleado GROUP BY v.idcliente order by SUM(v.monto) asc LIMIT 10";
			$request = $this->select_all($sql);
			return $request;
		}		
	}
 ?>