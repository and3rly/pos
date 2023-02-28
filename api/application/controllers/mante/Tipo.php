<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mante/Tipo_model');
		$this->output->set_content_type('application/json');
	}

	public function index()
	{
		$this->output->set_status_header('404');
	}


	public function buscar() 
	{
		$this->output->set_output(json_encode([
			'lista' => $this->Tipo_model->buscar($_GET)
		]));
	}

	public function guardar($id='') 
	{
		$datos = json_decode(file_get_contents('php://input'));
		$data = ['exito' => 0];

		if (verPropiedad($datos, 'nombre')) {

			$tipo_producto = new Tipo_model($id);

			if ($tipo_producto->guardar($datos)) {

				$data['exito'] = 1;
				$texto = empty($id) ? 'guardado':'actualizado';
				$data['mensaje'] = "Registro {$texto} con éxito";

			} else {
				$data['mensaje'] = $tipo_producto->getMensaje();
			}

		} else {
			$data['mensaje'] = "Complete la siguiente información: descripción del tipo de producto";
		}
		
		$this->output->set_output(json_encode($data));
		
	}
}

/* End of file Tipo.php */
/* Location: ./application/controllers/Tipo.php */