<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Judge extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'event_id',
        'username',
        'password',
    ];

    protected $casts = [
        'password' => 'hashed'
    ];

    public function criteria() {
        return $this->hasMany(Criteria::class);
    }

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function contestants() {
        return $this->hasMany(Contestant::class);
    }
}
