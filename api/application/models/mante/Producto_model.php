<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto_model extends General_model {

	public $codigo = null;
	public $codigo_barra = null;
	public $nombre;
	public $imagen = null;
	public $maneja_vencimiento = 0;
	public $maneja_lote = 0;
	public $precio = null;
	public $costo = null;
	public $activo = 1;
	public $estado_id;
	public $marca_id;
	public $tipo_id;
	public $unidad_medida_id;
	public $usuario_agr;

	public function __construct()
	{
		parent::__construct();
		if (!empty($id)) {
			$this->cargar($id);
		}
	}

}

/* End of file Producto_model.php */
/* Location: ./application/models/Producto_model.php */