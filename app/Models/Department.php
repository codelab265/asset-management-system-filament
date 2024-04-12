<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'building', 'floor', 'room',
    ];

    protected $casts = [

    ];

    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class);
    }
}
