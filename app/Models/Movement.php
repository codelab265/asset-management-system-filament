<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movement extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id', 'previous_department_id', 'previous_personnel_id', 'current_department_id', 'current_personnel_id', 'moved_date',
    ];

    protected $casts = [

    ];

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function previousDepartment(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'previousdepartment_id');
    }

    public function previousPersonnel(): BelongsTo
    {
        return $this->belongsTo(Personnel::class, 'previouspersonnel_id');
    }

    public function currentDepartment(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'currentdepartment_id');
    }

    public function currentPersonnel(): BelongsTo
    {
        return $this->belongsTo(Personnel::class, 'currentpersonnel_id');
    }
}
