<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order as O;

class Service extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->hasMany(O::class, 'id', 'id');
    }
}
