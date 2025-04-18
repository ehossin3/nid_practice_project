<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;
use TCPDF2DBarcode;

class NidController extends Controller
{

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
