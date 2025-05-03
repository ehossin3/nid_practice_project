<?php
namespace Database\Seeders;

use App\BdGeoLocation;
use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upzila;
use Illuminate\Database\Seeder;

class BDGeoLocationSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divs  = BdGeoLocation::divisions();
        $dists = BdGeoLocation::districts();
        $upzls = BdGeoLocation::upzilas();
        $unios = BdGeoLocation::unions();

        foreach ($divs as $div) {
            Division::create([
                'name' => $div['bn_name'],
            ]);
        }

        foreach ($dists as $dis) {
            District::create([
                'name'        => $dis['bn_name'],
                'division_id' => $dis['division_id'],
            ]);
        }

        foreach ($upzls as $upz) {
            Upzila::create([
                'name'        => $upz['bn_name'],
                'district_id' => $upz['district_id'],
            ]);
        }

        foreach ($unios as $uni) {
            Union::create([
                'name'      => $uni['bn_name'],
                'upzila_id' => $uni['upazilla_id'],
            ]);
        }
    }
}
