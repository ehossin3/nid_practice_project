<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'upzila_id'];
}
