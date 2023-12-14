<?php

namespace App\Models;
use App\Models\Judge;
use App\Models\Contestant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'location'
    ];

    public function judges() {
        return $this->hasMany(Judge::class);
    }

    public function contestants() {
        return $this->hasMany(Contestant::class);
    }

    public function criteria() {
        return $this->hasMany(Criteria::class);
    }

    public function rankedContestants()
{
    return $this->contestants()
        ->selectRaw('contestants.id, contestants.fullname, COALESCE(calculated_average, 0) as average_grade, contestants.event_id')
        ->orderByDesc('average_grade')
        ->get();
}


}
