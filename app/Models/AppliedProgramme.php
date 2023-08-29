<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Programme;
use App\Models\Interview;

class AppliedProgramme extends Model
{
    use HasFactory;

    protected $with = ['user', 'programme'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function interview()
    {
        return $this->hasOne(Interview::class);
    }
}
