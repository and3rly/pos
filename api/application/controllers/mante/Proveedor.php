<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->set_content_type('application/json');
		$this->load->model('mante/Proveedor_model');
	}

	public function index()
	{
		$this->output->set_status_header('404');
	}

	public function buscar() 
	{
		$this->output->set_output(json_encode([
			'lista' => $this->Proveedor_model->buscar($_GET)
		]));
	}

	public function guardar($id='')
	{
		$datos = json_decode(file_get_contents('php://input'));
		$data = ['exito' => 0];

		$requeridos = dato_requerido($datos, 1);

		if ($requeridos) {
			$data['mensaje'] = "Por favor, complete la siguiente información: {$requeridos}";
		} else {

			$proveedor = new Proveedor_model($id);

			if ($proveedor->existe_proveedor($datos)) {
				$data['mensaje'] = "Ya existe un proveedor con los mismos datos.";
			} else {
				if ($proveedor->guardar($datos)) {
				
					$data['exito'] = 1;
					$texto = empty($id) ? 'guardado':'actualizado';
					$data['mensaje'] = "Regisstro {$texto} con éxito";

				} else {
					$data['mensaje'] = $proveedor->getMensaje();

				}
			}
		}

		$this->output->set_output(json_encode($data));
	}
}

/* End of file Proveedor.php */
/* Location: ./application/controllers/Proveedor.php */