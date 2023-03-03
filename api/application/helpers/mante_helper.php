<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('dato_requerido')) {
	function dato_requerido($datos=[], $tipo=0)
	{
		switch ($tipo) {
			case 1:
				$obligatorios =  [
					'nombre' => 'Nombre proveedor'
				];
			break;
			case 2:
				$obligatorios = [
					'nombre' => "Nombre sucursal",
					'direccion' => "Dirección sucursal",
					'empresa_id' => "Empresa"
				];
			break;

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
