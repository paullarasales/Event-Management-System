<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'judge_id',
        'criteria',
        'points'
    ];

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function judge() {
        return $this->belongsTo(Judge::class);
    }

    
}
