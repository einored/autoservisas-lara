<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service as S;
use App\Models\Fixer as F;

class Company extends Model
{
    use HasFactory;

    public function services()
    {
        return $this->hasMany(S::class, 'id', 'id');
    }

    public function fixers()
    {
        return $this->hasMany(F::class, 'id', 'id');
    }
    
}
