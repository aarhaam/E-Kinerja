<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadOfSubordinate extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'head_of_subordinates';
    use HasFactory;
    protected $fillable = [
        'head', 'subordinate'
    ];

    public function head()
    {
        return $this->belongsToMany(User::class, 'head_of_subordinates', 'id', 'head');
    }

    public function subordinate()
    {
        return $this->belongsToMany(User::class, 'head_of_subordinates', 'id', 'subordinate');
    }
}
