<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresa_model extends General_model {

	public $id;
	public $razon_social = null;
	public $identificacion_tributaria = null;
	public $direccion = null;
	public $telefono = null;
	public $contacto = null;
	public $activo = 1;

	public function __construct($id='')
	{
		parent::__construct();
		if (!empty($id)) {
			$this->cargar($id);
		}
	}

}

/* End of file Empresa_model.php */
/* Location: ./application/models/Empresa_model.php */