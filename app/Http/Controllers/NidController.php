<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use TCPDF2DBarcode;

class NidController extends Controller
{
    public function generatePdf()
    {

        $pdf = Pdf::loadView('pages.nid')
            ->setPaper('a4', 'portrait')
            ->setOptions(['dpi' => 300]);

        return $pdf->download('id_card_2.pdf');
    }

    public function generateQRCode()
    {
        $data           = 'Name: Melton, NID:123456';
        $barcode        = new TCPDF2DBarcode($data, 'PDF417');
        $barcodePngData = $barcode->getBarcodePngData(10, 4, [0, 0, 0]);

        // Return the barcode image as a response
        return response($barcodePngData)
            ->header('Content-Type', 'image/png');

    }
}
