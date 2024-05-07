<?php

namespace App\Models;

use App\Observers\DisposalObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(DisposalObserver::class)]
class Disposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id', 'reason', 'disposed_date',
    ];

    protected $casts = [];

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }
}
