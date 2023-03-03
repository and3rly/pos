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

	public function __construct($id='')
	{
		parent::__construct();	
		if (!empty($id)) {
			$this->cargar($id);
		}
	}


	public function existe_proveedor($args=[])
	{
		if ($this->getPK()) {
			$this->db->where("id <> ", $this->getPK());
		}

		$tmp = $this->db
		->where('identificacion_tributaria', $args->identificacion_tributaria)
		->where('nombre', $args->nombre)
		->where('activo', 1)
		->get($this->_tabla);

		if ($tmp->num_rows() > 0) {
			return true;
		}

		return false;
	}

}

/* End of file Proveedor_model.php */
/* Location: ./application/models/Proveedor_model.php */