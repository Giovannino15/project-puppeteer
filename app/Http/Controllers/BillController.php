<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function store(Request $request)
    {
        $bill = Bill::create($request->all());

        return back()->with('flash', [
            'message' => 'success',
        ]);

    }

    public function download()
    {
        $bill = Bill::where('id', '!=', 'NULL')->get()->last();

        $data = [
            'title' => 'Detalles de Facturacion',
            'date' => date('m/d/Y'),
            'bill' => $bill
        ];

        //DOMPDF
        $pdf = Pdf::loadView('billPdf', $data);

        return $pdf->download('bill.pdf');
    }
}
