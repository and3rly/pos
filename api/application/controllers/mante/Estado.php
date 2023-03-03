<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estado extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->set_content_type('application/json');	
		$this->load->model('mante/Estado_model');
	}

	public function index()
	{
		$this->output->set_status_header('404');
	}

	public function buscar() 
	{
		$this->output->set_output(json_encode([
			'lista' => $this->Estado_model->buscar($_GET)
		]));
	}

	public function guardar($id='') 
	{
		$datos = json_decode(file_get_contents('php://input'));
		$data = ['exito' => 0];

		if (verPropiedad($datos, 'nombre')) {

			$estado = new Estado_model($id);

			if ($estado->guardar($datos)) {

				$data['exito'] = 1;
				$texto = empty($id) ? 'guardado':'actualizado';
				$data['mensaje'] = "Registro {$texto} con éxito";

			} else {
				$data['mensaje'] = $estado->getMensaje();
			}

		} else {
			$data['mensaje'] = "Complete la siguiente información: estado de producto";
		}
		
		$this->output->set_output(json_encode($data));
	}
}

/* End of file Estado.php */
/* Location: ./application/controllers/Estado.php */