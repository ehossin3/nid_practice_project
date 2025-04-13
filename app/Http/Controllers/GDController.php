<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GDController extends Controller
{
   public function index()
   {
        header('Content-Type: image/png');

        $sut_f = public_path('fonts/SutonnyMJ-Bold.ttf');
        $sut_regular = public_path('fonts/SutonnyMJ-Regular.ttf');
        $solaiman_f = public_path('fonts/SolaimanLipi.ttf');
        $arial = public_path('fonts/ARIAL.TTF');
        $arialB = public_path('fonts/ARIALBD.TTF');
        $image = imagecreatefrompng(public_path('images/nid_frame.png'));
        $name_bn = '‡gvt Bgivb †nv‡mb';
        $name_en = "MD EMRAN HOSSAIN";
        $f_name = '‡gvt †njvj †nv‡mb';
        $m_name = '‡gvQvt gwiqg †bQv';
        $dob = '25 Dec 1998';
        $id_no = '5554459734';

        $red_col = imagecolorallocate($image, 255,0,0);

        $text_color = imagecolorallocate($image, 0, 0, 0);
        imagettftext($image, 38,0, 390, 260, $text_color, $sut_f, $name_bn);


        imagettftext($image, 30, 0, 390, 341, $text_color, $arial, $name_en );

        imagettftext($image, 33, 0, 390, 405, $text_color, $sut_regular, $f_name);

        imagettftext($image, 32, 0, 390, 472, $text_color, $sut_regular, $m_name);

        imagettftext($image, 25, 0, 500, 534, $red_col, $arial, $dob);

        imagettftext($image, 26, 0, 397, 591, $red_col, $arialB, $id_no);

        imagejpeg($image);
        imagedestroy($image);
   } 
}
