<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadOfSubordinate extends Model
{
    use HasFactory;
    protected $fillable = [
        'head', 'subordinate'
    ];
}
