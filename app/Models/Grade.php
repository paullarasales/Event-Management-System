<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'judge_id',
        'contestant_id',
        'criteria_id',
        'event_id',
        'grade'
    ];

    public function judge() {
        return $this->belongsTo(Judge::class);
    }

    public function contestant() {
        return $this->belongsTo(Contestant::class);
    }

    public function event() {
        return $this->belongsTo(Event::class);
    }
}
