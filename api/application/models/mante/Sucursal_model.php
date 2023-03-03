<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sucursal_model extends General_model {

	public $nombre;
	public $direccion = null;
	public $telefono = null;
	public $activo = 1;
	public $empresa_id;

	public function __construct($id='')
	{
		parent::__construct();
		if (!empty($id)) {
			$this->cargar($id);
		}
	}

	public function existe_sucursal($args=[])
	{
		if ($this->getPK()) {
			$this->db->where("id <> ", $this->getPK());
		}

		$tmp = $this->db
		->where('nombre', $args->nombre)
		->where('direccion', $args->direccion)
		->where('activo', 1)
		->get($this->_tabla);

		if ($tmp->num_rows() > 0) {
			return true;
		}

		return false;
	}

}

/* End of file Sucursal_model.php */
/* Location: ./application/models/Sucursal_model.php */