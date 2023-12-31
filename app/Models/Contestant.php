<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'fullname',
        'calculated_average'
    ];

    public function grades() {
        return $this->hasMany(Grade::class, 'contestant_id');
    }
    
}
