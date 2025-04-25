<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'voter_photo',
        'voter_signature'
    ];
}
