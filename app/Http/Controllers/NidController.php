<?php
namespace App\Http\Controllers;

use App\Models\Blood;
use App\Models\Photo;
use App\Models\Voter;
use Illuminate\Http\Request;
use TCPDF2DBarcode;

class NidController extends Controller
{

    public function createNidForm()
    {
        $bloodsgropu = Blood::all();
        return view('admin.pages.createnid', compact('bloodsgropu'));
    }

    public function createNID(Request $request)
    {
        $request->validate([
            'name_bangla'     => 'required|string|max:255',
            'name_english'    => 'required|string|max:255',
            'fathers_name_bn' => 'required|string|max:255',
            'fathers_name_en' => 'required|string|max:255',
            'mothers_name_bn' => 'required|string|max:255',
            'mothers_name_en' => 'required|string|max:255',
            'date_of_birth'   => 'required|date',
            'blood_group'     => 'required|exists:bloods,id',
            'id_no'           => 'required|numeric|unique:voters,id_no',
            'address'         => 'required|string',
            'district'        => 'required|string|max:255',
            'nid_photo'       => 'required|string', // base64 image
            'signature'       => 'required|string', // base64 image
        ]);

        // Store images
        $photoPath     = $this->saveBase64Image($request->nid_photo, 'voter_photos');
        $signaturePath = $this->saveBase64Image($request->signature, 'voter_signatures');

        $photo = Photo::create([
            'voter_photo'     => $photoPath,
            'voter_signature' => $signaturePath,
        ]);

        // Store voter info
        Voter::create([
            'name_bn'  => $request->name_bangla,
            'name_en'  => $request->name_english,
            'fname_bn' => $request->fathers_name_bn,
            'fname_en' => $request->fathers_name_en,
            'mname_bn' => $request->mothers_name_bn,
            'mname_en' => $request->mothers_name_en,
            'dob'      => $request->date_of_birth,
            'blood_id' => $request->blood_group,
            'id_no'    => $request->id_no,
            'address'  => $request->address,
            'district' => $request->district,
            'photo_id' => $photo->id,
        ]);

        return back()->with('success', 'ID Information saved successfully.');
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

    private function saveBase64Image($base64, $folder)
    {
        $image     = str_replace('data:image/png;base64,', '', $base64);
        $image     = str_replace(' ', '+', $image);
        $imageName = uniqid() . '.png';
        $imagePath = "uploads/$folder/$imageName";
        \File::put(public_path($imagePath), base64_decode($image));
        return $imagePath;
    }

}
