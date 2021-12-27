<?php 

	class InventarioModel extends Mysql
	{

		public function __construct()
		{
			parent::__construct();
		}

		public function selectInventario(){
			
			$sql = "SELECT p.idproducto,p.codigobarra,c.nombre as `categoria`, 
			p.descripcion, p.stock,
			d.precioventa, d.preciocompra,
			u.nombre as `unidad`
			FROM producto p 
			INNER JOIN unidadmedida u on u.idunidad=p.idunidadmedida
			INNER JOIN categoria c on c.idcategoria= p.idcategoria
			INNER JOIN detallecompra d on d.idproducto = p.idproducto
			WHERE p.estado!=0";
			$request = $this->select_all($sql);
			return $request;
		}
        
	}
 ?>