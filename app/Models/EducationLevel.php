<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class EducationLevel extends Model
{
    use HasFactory, SoftDeletes, Userstamps;

    protected $guarded = [
        'id',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function courseEducationLevels(): HasMany
    {
        return $this->hasMany(CourseEducationLevel::class);
    }
}
