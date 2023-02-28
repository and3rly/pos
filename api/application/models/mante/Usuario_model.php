<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends General_model {

	public $nombre;
	public $apellido;
	public $clave;
	public $correo = null;
	public $telefono = null;
	public $activo = 1;
	public $tipo_usuario_id;
	public $empresa_id;

	public function __construct()
	{
		parent::__construct();
		if (!empty($id)) {
			$this->cargar($id);
		}
	}

}

/* End of file Usuario_model.php */
/* Location: ./application/models/Usuario_model.php */