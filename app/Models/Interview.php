<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\InterviewPeriod;
use App\Models\AppliedProgramme;

class Interview extends Model
{
    use HasFactory;

    protected $with = ['interviewPeriod', 'appliedProgramme'];

    public function interviewPeriod()
    {
        return $this->belongsTo(InterviewPeriod::class);
    }

    public function appliedProgramme()
    {
        return $this->belongsTo(AppliedProgramme::class);
    }
}
