<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estado_model extends General_model {

	public $nombre;
	public $danado = 0;
	public $utilizable = 0;
	public $activo = 1;

	public function __construct()
	{
		parent::__construct();
		if (!empty($id)) {
			$this->cargar($id);
		}
	}

}

/* End of file Estado_model.php */
/* Location: ./application/models/Estado_model.php */