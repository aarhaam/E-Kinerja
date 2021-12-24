<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressWork extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id', 'indicator_id', 'description', 'date'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'employee_id', 'employee_id');
    }

    public function indicatorWork(){
        return $this->belongsTo(IndicatorWork::class, 'indicator_id', 'id');
    }
}
