<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class FacturaController extends Controller
{
    /**
     * Create the controller instance.
     */
    public function __construct()
    {
        $this->authorizeResource(Factura::class, 'factura');
    }

    public function index()
    {
        if (Auth::user()->es_admin()) {
            $facturas = Factura::with('user');
        } else {
            $facturas = Auth::user()->facturas()->with('user');
        }
        $facturas = $facturas
            ->selectRaw('facturas.id, facturas.user_id, facturas.created_at, sum(cantidad * precio) as total')
            ->join('articulo_factura', 'facturas.id', '=', 'articulo_factura.factura_id')
            ->join('articulos', 'articulos.id', '=', 'articulo_factura.articulo_id')
            ->groupBy('facturas.id')
            ->get();
        return view('facturas.index', [
            'facturas' => $facturas,
        ]);
    }

    public function show(Factura $factura)
    {
        return view('facturas.show', [
            'factura' => $factura,
        ]);
    }

    public function print($factura)
    {
        $factura = Factura::find($factura);

        $pdf = FacadePdf::loadView('facturas.pdf', compact('factura'));
        return $pdf->download('factura.pdf'); // O usa ->stream() para mostrar en el navegador
    }

    public function getPdfData($factura) {
        $pdf = FacadePdf::loadView('facturas.pdf', compact('factura'));
        return $pdf->output();
    }
}
