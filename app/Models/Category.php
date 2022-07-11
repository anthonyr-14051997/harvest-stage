<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function inflows()
    {
        return $this->belongsToMany(Inflow::class);
    }

    public function outflows()
    {
        return $this->belongsToMany(Outflow::class);
    }

}
