<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function flows()
    {
        return $this->belongsToMany(Flow::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fixedcosts()
    {
        return $this->belongsToMany(FixedCost::class);
    }

}
