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

	}
 ?>