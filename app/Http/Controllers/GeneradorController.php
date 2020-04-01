<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneradorController extends Controller
{
    public function imprimirFactura(){
     	$pdf = \PDF::loadView('cotizacion.informePDF');
     	return $pdf->download('ejemplo.pdf');
	}
}
