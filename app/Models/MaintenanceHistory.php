<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaintenanceHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id', 'maintenance_performed', 'maintenance_date',
    ];

    protected $casts = [

    ];

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }
}
