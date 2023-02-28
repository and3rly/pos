<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('dato_requerido')) {
	function dato_requerido($datos=[], $tipo=0)
	{
		switch ($tipo) {
			
			default:
				return false;
				break;
		}

		return validar_requerido($datos, $obligatorios);

	}
}

if (!function_exists('validar_requerido')) {
	function validar_requerido($datos=[], $obligatorios=[])
	{
		$mensaje = '';
		if ($datos && $obligatorios) {
			foreach ($obligatorios as $key => $value) {
				if (!verPropiedad($datos, $key)) {
					$mensaje .= "<br>{$value}\n";
				}
			}
		}
		return $mensaje;
	}
}

/* End of file mante_kupper.php */
/* Location: ./application/helpers/mante_kupper.php */
