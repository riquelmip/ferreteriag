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

			$sql = "SELECT * FROM rol where idrol>3 and idrol<10 order by idrol";
			$request = $this->select_all($sql);
			return $request;
		}

	}
 ?>