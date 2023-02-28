<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedor_model extends General_model {

	public $nombre;
	public $razon_social = null;
	public $telefono = null;
	public $identificacion_tributaria = null;
	public $direccion = null;
	public $correo = null;
	public $contacto = null;
	public $activo = 1;
	public $usuario_agr;

	public function __construct()
	{
		parent::__construct();	
		if (!empty($id)) {
			$this->cargar($id);
		}
	}

}

/* End of file Proveedor_model.php */
/* Location: ./application/models/Proveedor_model.php */