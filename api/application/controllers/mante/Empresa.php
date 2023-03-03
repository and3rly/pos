<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->set_content_type('application/json');
		$this->load->model('mante/Empresa_model');
	}

	public function index()
	{
		$this->output->set_status_header('404');
	}

	public function buscar() 
	{
		$this->output->set_output(json_encode([
			'lista' => $this->Empresa_model->buscar($_GET)
		]));
	}
}

/* End of file Empresa.php */
/* Location: ./application/controllers/Empresa.php */