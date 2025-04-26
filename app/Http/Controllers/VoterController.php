<?php
namespace App\Http\Controllers;

use App\Models\Voter;
use App\UnicodeToBijoyConverter;

class VoterController extends Controller
{
    public function show($id)
    {
        $voter = Voter::with(['photo', 'blood'])->where('id', $id)->first();
        return view('admin.pages.single', compact('voter'));
    }

    public function converter()
    {
        $name = 'মোঃ ইমরান হোসেন';
        $converter = new UnicodeToBijoyConverter();
        return $converter->convert($name);
        
    }
}
