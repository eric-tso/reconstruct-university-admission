<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Application extends Model
{
    use HasFactory;

    protected $with = ['user'];

    public function scopeFilter($query, array $filters)
    {
        
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
