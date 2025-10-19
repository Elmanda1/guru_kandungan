<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Wildside\Userstamps\Userstamps;

class Course extends Model
{
    use HasFactory, SoftDeletes, Userstamps;

    const STATUS_AVAILABLE = 1;

    const STATUS_DONE = 2;

    const STATUS_CANCELLED = 3;

    protected $guarded = [
        'id',
    ];

    protected $appends = [
        'remainingQuota',
        'formattedDate',
        'embeddedYoutubeLink',
    ];

    protected $casts = [
        'zoom_opened_at' => 'datetime',
    ];


    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function lecturer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

    public function courseParticipants(): HasMany
    {
        return $this->hasMany(CourseParticipant::class);
    }

    public function courseEducationLevels(): HasMany
    {
        return $this->hasMany(CourseEducationLevel::class);
    }

    public function educationLevelIds()
    {
        return $this->courseEducationLevels()
            ->pluck('education_level_id')
            ->toArray();
    }

    public function getRemainingQuotaAttribute()
    {
        $remainingQuota = $this->quota - $this->courseParticipants()->count();

        return max($remainingQuota, 0);
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::make($this->date)->isoFormat('dddd, D MMMM Y');
    }

    public function getStartTimeAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('H:i');
    }

    public function getEmbeddedYoutubeLinkAttribute()
    {
        if (str_contains($this->youtube_link, 'embed')) {
            return $this->youtube_link;
        } else {
            $videoId = explode('?v=', $this->youtube_link);

            if (isset($videoId[1])) {
                return 'https://www.youtube.com/embed/'.$videoId[1];
            }

            return 'https://www.youtube.com/embed/'.$videoId[0];
        }
    }

    public function isRegistered()
    {
        if (!auth()->check()) {
            return false; // belum login, maka dianggap belum terdaftar
        }
    
        return CourseParticipant::query()
            ->where('participant_id', auth()->id()) // aman, auth()->id() auto-null kalau belum login
            ->where('course_id', $this->id)
            ->exists();
    }


    public function isAvailable()
    {
        return $this->status == self::STATUS_AVAILABLE;
    }

    public function isDone()
    {
        return $this->status == self::STATUS_DONE;
    }

    public function isCancelled()
    {
        return $this->status == self::STATUS_CANCELLED;
    }

    public function isFull()
    {
        return $this->getRemainingQuotaAttribute() <= 0;
    }

    public function isStarting()
    {
        $currentDate = Carbon::now();
    
        $courseDate = Carbon::parse($this->date);
        $courseStartTime = Carbon::parse($this->date.' '.$this->start_time);
        
        // Kurangi 15 menit dari waktu mulai course
        $showButtonTime = $courseStartTime->copy()->subMinutes(15);
    
        return $courseDate->isToday() && $currentDate->greaterThanOrEqualTo($showButtonTime);
    }

    public function hasEmailBeenSent()
    {
        return !is_null($this->zoom_opened_at);
    }

}
