<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleado_model extends General_model {

	public $codigo = null;
	public $nombre;
	public $apellido;
	public $telefono = null;
	public $direccion = null;
	public $fecha_nac;
	public $identificacion_personal = null;
	public $identificacion_tributaria = null;
	public $activo = 1;
	public $usuario_id;
	public $usuario_agr;

	public function __construct($id='')
	{
		parent::__construct();
		if (!empty($id)) {
			$this->cargar($id);
		}
	}

}

/* End of file Empleado_model.php */
/* Location: ./application/models/Empleado_model.php */