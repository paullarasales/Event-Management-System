<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Judge extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'event_id',
        'username',
        'password',
    ];

    public function criteria() {
        return $this->hasMany(Criteria::class);
    }
}
