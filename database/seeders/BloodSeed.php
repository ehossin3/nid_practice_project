<?php

namespace Database\Seeders;

use App\Models\Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bloodGroups = [
            'A+',
            'A-',
            'B+',
            'B-',
            'AB+',
            'AB-',
            'O+',
            'O-',
        ];
        foreach( $bloodGroups as $b){
            Blood::create([
                'name'  => $b
            ]);
        }
    }
}
