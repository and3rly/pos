<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sucursal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->set_content_type('application/json');
		$this->load->model('mante/Sucursal_model');
	}

	public function index()
	{
		$this->output->set_status_header('404');
	}

	public function buscar() 
	{
		$this->output->set_output(json_encode([
			'lista' => $this->Sucursal_model->buscar($_GET)
		]));
	}

	public function guardar($id='')
	{
		$datos = json_decode(file_get_contents('php://input'));
		$data = ['exito' => 0];

		$requeridos = dato_requerido($datos, 2);

		if ($requeridos) {
			$data['mensaje'] = "Por favor, complete la siguiente información: {$requeridos}";
		} else {

			$sucursal = new Sucursal_model($id);

			if ($sucursal->existe_sucursal($datos)) {
				$data['mensaje'] = "Ya existe una sucursal con los mismos datos.";
			} else {
				if ($sucursal->guardar($datos)) {
				
					$data['exito'] = 1;
					$texto = empty($id) ? 'guardado':'actualizado';
					$data['mensaje'] = "Regisstro {$texto} con éxito";

				} else {
					$data['mensaje'] = $sucursal->getMensaje();

				}
			}
		}

		$this->output->set_output(json_encode($data));
	}

}

/* End of file Sucursal.php */
/* Location: ./application/controllers/Sucursal.php */