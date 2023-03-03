<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marca extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->set_content_type('application/json');
		$this->load->model('mante/Marca_model');
	}

	public function index()
	{
		$this->output->set_status_header('404');
	}

	public function buscar() 
	{
		$this->output->set_output(json_encode([
			'lista' => $this->Marca_model->buscar($_GET)
		]));
	}

	public function guardar($id='') 
	{
		$datos = json_decode(file_get_contents('php://input'));
		$data = ['exito' => 0];

		if (verPropiedad($datos, 'nombre')) {

			$marca = new Marca_model($id);

			if ($marca->guardar($datos)) {

				$data['exito'] = 1;
				$texto = empty($id) ? 'guardado':'actualizado';
				$data['mensaje'] = "Registro {$texto} con éxito";

			} else {
				$data['mensaje'] = $marca->getMensaje();
			}

		} else {
			$data['mensaje'] = "Complete la siguiente información: nombre marca de producto";
		}
		
		$this->output->set_output(json_encode($data));
		
	}

}

/* End of file Marca.php */
/* Location: ./application/controllers/Marca.php */