<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email',
    ];

    protected $casts = [

    ];

    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class);
    }
}
