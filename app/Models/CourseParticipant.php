<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class CourseParticipant extends Model
{
    use HasFactory, SoftDeletes, Userstamps;

    protected $guarded = [
        'id',
    ];

    public function participant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'participant_id', 'id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
