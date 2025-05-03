<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upzila extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'district_id'];
}
