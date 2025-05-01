<?php
namespace App\Http\Controllers;

use App\Models\Blood;
use App\Models\Photo;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NidController extends Controller
{

    public function index()
    {
        $voters = Voter::with(['blood', 'photo'])->latest()->paginate(10);
        return view('admin.pages.idinfo', compact('voters'));
    }

    public function createNidForm()
    {
        $bloodsgroup = Blood::all();
        return view('admin.pages.createnid', compact('bloodsgroup'));
    }

    public function nidStore(Request $request)
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
            'nid_photo'       => 'required|string',
            'signature'       => 'required|string',
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
            'uuid'     => Str::random(98),
        ]);

        return back()->with('success', 'ID Information saved successfully.');
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
