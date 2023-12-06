<?php

namespace App\Models;
use App\Models\Judge;
use App\Models\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'judge_id',
        'criterion1_score',
        'criterion2_score',
        'criterion3_score',
        // ... add more fields for additional criteria ...
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function judge()
    {
        return $this->belongsTo(Judge::class);
    }
}
