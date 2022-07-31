<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fixedCost extends Model
{
    use HasFactory;

    public function flows()
    {
        return $this->hasMany(Flow::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
