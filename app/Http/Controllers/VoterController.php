<?php
namespace App\Http\Controllers;

use App\Models\Voter;

class VoterController extends Controller
{
    public function show($id)
    {
        $voter = Voter::with(['photo', 'blood'])->where('id', $id)->first();
        return view('admin.pages.single', compact('voter'));
    }
}
