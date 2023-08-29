<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\AppliedProgramme;

class Programme extends Model
{
    use HasFactory;

    public function appliedProgramme()
    {
        return $this->hasMany(AppliedProgramme::class);
    }
}
