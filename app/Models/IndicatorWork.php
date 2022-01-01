<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicatorWork extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id', 'name_indicator'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'employee_id', 'employee_id');
    }

    public function progressWork(){
        return $this->hasMany(ProgressWork::class, 'indicator_id', 'id');
    }
}
