<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    // Add the fillable fields
    protected $fillable = [
        'name_bn',
        'name_en',
        'fname_bn',
        'fname_en',
        'mname_bn',
        'mname_en',
        'dob',
        'blood_id',
        'id_no',
        'address',
        'district',
        'photo_id',
    ];

    // Define relationship with Blood model
    public function blood()
    {
        return $this->belongsTo(Blood::class);
    }

    // Define relationship with Photo model
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
