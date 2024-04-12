<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SoftwareLicence extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id', 'edition', 'version', 'installed_on', 'os_build', 'experience',
    ];

    protected $casts = [

    ];

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }
}
