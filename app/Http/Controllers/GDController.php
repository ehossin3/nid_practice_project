<?php
namespace App\Http\Controllers;

use Str;
use TCPDF2DBarcode;

class GDController extends Controller
{
    public function index()
    {
        header('Content-Type: image/png');

        //nid fonts
        $sut_f       = public_path('fonts/SutonnyMJ-Bold.ttf');
        $sut_regular = public_path('fonts/SutonnyMJ-Regular.ttf');
        $solaiman_f  = public_path('fonts/SolaimanLipi.ttf');
        $arial       = public_path('fonts/ARIAL.TTF');
        $arialB      = public_path('fonts/ARIALBD.TTF');

        //nid frame
        $image = imagecreatefrompng(public_path('images/nid_frame.png'));

        //nid photo
        $photo_path = public_path('images/my_photo.png');
        $photo      = imagecreatefrompng($photo_path);
        $dst_x      = 35;
        $dst_y      = 210;
        $dst_w      = 212;
        $dst_h      = 242;
        $src_w      = imagesx($photo);
        $src_h      = imagesy($photo);
        imagecopyresampled(
            $image,
            $photo,
            $dst_x, $dst_y,
            0, 0,
            $dst_w, $dst_h,
            $src_w, $src_h
        );

        //nid signature
        $singnature_path = public_path('images/my_sing.png');
        $signature       = imagecreatefrompng($singnature_path);
        $x               = 70;
        $y               = 480;
        $w               = 150;
        $h               = 25;

        $sig_w = imagesx($signature);
        $sig_h = imagesy($signature);

        imagecopyresampled(
            $image,
            $signature,
            $x, $y,
            0, 0,
            $w, $h,
            $sig_w, $sig_h,
        );

        //nid info
        $name_bn    = '‡gvt Bgivb †nv‡mb';
        $name_en    = "MD EMRAN HOSSAIN";
        $f_name     = '‡gvt †njvj †nv‡mb';
        $m_name     = '‡gvQvt gwiqg †bQv';
        $dob        = '25 Dec 1998';
        $id_no      = '5554459734';
        $address    = 'cybNiw`Nx, WvKNi: wZjKcyi - 5942, Av‡°jcyi,';
        $dist       = 'RqcyinvU';
        $blood_g    = 'B+';
        $issue_date = now()->format("d/m/Y");
        $uuid = \Illuminate\Support\Str::random(98);

        //QR/Barcode
        $data    = "<pin>{$id_no}</pin><name>{$name_en}</name><DOB>{$dob}</DOB><FP></FP><F>Right INdex</F><TYPE>A</TYPE><V>2.0</V><ds>{$uuid}</ds>";
        $barcode = $this->generateBarcode($data);

        $qr = imagecreatefromstring($barcode);

        $qr_x = 1080;
        $qr_y = 500;
        $qr_w = 975;
        $qr_h = 122;

        imagecopyresampled(
         $image,
         $qr,
         $qr_x, $qr_y,
         0,0,
         $qr_w, $qr_h,
         imagesx($qr), imagesy($qr)
        );


        //text color
        $red_col    = imagecolorallocate($image, 255, 0, 0);
        $text_color = imagecolorallocate($image, 0, 0, 0);

        //bangla name
        imagettftext($image, 38, 0, 390, 260, $text_color, $sut_f, $name_bn);

        //English name
        imagettftext($image, 30, 0, 390, 341, $text_color, $arial, $name_en);

        //Fathers name
        imagettftext($image, 33, 0, 390, 405, $text_color, $sut_regular, $f_name);

        //Mothers name
        imagettftext($image, 32, 0, 390, 472, $text_color, $sut_regular, $m_name);

        //DOB
        imagettftext($image, 25, 0, 500, 534, $red_col, $arial, $dob);

        //ID no
        imagettftext($image, 26, 0, 397, 591, $red_col, $arialB, $id_no);

        //Address
        imagettftext($image, 28, 0, 1330, 149, $text_color, $sut_regular, $address);

        //dist
        imagettftext($image, 28, 0, 1180, 184, $text_color, $sut_regular, $dist);

        //dist
        imagettftext($image, 28, 0, 1410, 315, $text_color, $arial, $blood_g);

        //Dob Place
        imagettftext($image, 25, 0, 1570, 313, $text_color, $sut_regular, $dist);

        //Issue Date
        imagettftext($image, 28, 0, 1820, 452, $text_color, $sut_regular, $issue_date);

        //create image
        imagejpeg($image);
        imagedestroy($image);
    }

    public function generateBarcode(string $data)
    {
        $barcode = new TCPDF2DBarcode($data, 'PDF417');
        return $barcode->getBarcodePngData(10, 4);
    }
}
