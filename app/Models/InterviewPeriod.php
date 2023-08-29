<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Interview;

class InterviewPeriod extends Model
{
    use HasFactory;

    protected $with = ['programme'];

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function interview()
    {
        return $this->hasMany(Interview::class);
    }
}
