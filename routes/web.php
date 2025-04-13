<?php

use App\Http\Controllers\GDController;
use App\Http\Controllers\NidController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/nid', function(){
    $data = [
        'name'        => 'MD EMRAN HOSSAIN',
        'dob'         => '25 Dec 1998',
        'id_no'       => '1234567890',
        'blood_group' => 'B+',
    ];
    return view('pages.pdf2', compact('data'));
});

Route::get('/pdf', [NidController::class, 'generatePdf']);

Route::get('qr-code', [NidController::class, 'generateQRCode']);

Route::get('/generate-nid', function(){

    $width = 2480; // A4 width in pixels at 300 DPI
    $height = 3508; // A4 height in pixels at 300 DPI
    
    // Create an A4 white image
    $img = imagecreatetruecolor($width, $height);
    $bg = imagecolorallocate($img, 255, 255, 255);
    imagefill($img, 0, 0, $bg);

    // Define colors
    $black = imagecolorallocate($img, 0, 0, 0);
    $blue = imagecolorallocate($img, 0, 0, 255);

    // Add a border
    imagerectangle($img, 10, 10, $width - 10, $height - 10, $black);

    // Add text (NID Card Title)
    $fontPath = public_path('fonts/arial.ttf'); // Make sure the font exists in /public/fonts
    imagettftext($img, 100, 0, 800, 300, $blue, $fontPath, "National ID Card");

    // Add sample ID details
    imagettftext($img, 60, 0, 300, 600, $black, $fontPath, "Name: John Doe");
    imagettftext($img, 60, 0, 300, 700, $black, $fontPath, "ID No: 123456789");
    imagettftext($img, 60, 0, 300, 800, $black, $fontPath, "DOB: 01 Jan 2000");

    // Capture output buffer
    ob_start();
    imagejpeg($img, null, 100); // Set quality to 100 for best print
    $image_data = ob_get_clean();
    imagedestroy($img);

    // Return response with headers
    return response($image_data)
        ->header('Content-Type', 'image/jpeg')
        ->header('Content-Disposition', 'inline; filename="nid_card.jpg"');
});

Route::view('invoice', 'pages.invoice');

Route::get('snappy-pdf', [NidController::class, 'snappyPDF']);

Route::get('generate-id', [GDController::class, 'index']);

