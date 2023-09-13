<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = [
            'title' => 'pierwszy pdf',
            'date' => date('m/d/Y'),
            'random' => 'jakis losowy tekst',
        ];

        $pdf = Pdf::loadView('pdfFile', $data);
        return $pdf->download('invoice.pdf');
    }
}
