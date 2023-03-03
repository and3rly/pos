<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unidad_medida extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->set_content_type('application/json');
		$this->load->model('mante/Unidad_medida_model');
	}

	public function index()
	{
		$this->output->set_status_header('404');
	}

	public function buscar() 
	{
		$this->output->set_output(json_encode([
			'lista' => $this->Unidad_medida_model->buscar($_GET)
		]));
	}

	public function guardar($id='') 
	{
		$datos = json_decode(file_get_contents('php://input'));
		$data = ['exito' => 0];

		if (verPropiedad($datos, 'nombre')) {

			$Unidad_medida = new Unidad_medida_model($id);

			if ($Unidad_medida->guardar($datos)) {

				$data['exito'] = 1;
				$texto = empty($id) ? 'guardado':'actualizado';
				$data['mensaje'] = "Registro {$texto} con éxito";

			} else {
				$data['mensaje'] = $Unidad_medida->getMensaje();
			}

		} else {
			$data['mensaje'] = "Complete la siguiente información: nombre de la unidad de medida";
		}
		
		$this->output->set_output(json_encode($data));
		
	}

}

/* End of file Unidad_medida.php */
/* Location: ./application/controllers/Unidad_medida.php */