<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Wildside\Userstamps\Userstamps;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, HasRoles, Impersonate, Notifiable, SoftDeletes, Userstamps;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nik',
        'photo',
        'phone',
        'address',
        'institution',
        'department_id',
        'cv',
        'is_verified',
        'education_level_id',
        'email',
        'google_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function courseParticipants(): HasMany
    {
        return $this->hasMany(CourseParticipant::class, 'participant_id', 'id');
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'lecturer_id', 'id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function educationLevel(): BelongsTo
    {
        return $this->belongsTo(EducationLevel::class);
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    public function isLecturer(): bool
    {
        return $this->hasRole('lecturer');
    }

    public function isParticipant(): bool
    {
        return $this->hasRole('participant');
    }

    public function isRegistrationComplete()
    {
        if ($this->hasNoRoles()) {
            return false;
        }

        return true;
    }

    public function isProfileComplete(): bool
    {
        $requiredFields = [
            'name',
            'nik',
            'email',
            'phone',
            'address',
            'institution',
            'department_id',
            'education_level_id',
        ];

        foreach ($requiredFields as $field) {
            if (empty($this->$field)) {
                return false;
            }
        }

        return true;
    }

    public function isVerified()
    {
        return $this->is_verifed;
    }

    public function hasNoRoles(): bool
    {
        return ! $this->hasRole('participant|lecturer|admin');
    }

    public function canImpersonate(): bool
    {
        return $this->isAdmin();
    }

    public function canBeImpersonated(): bool
    {
        return ! $this->isAdmin();
    }

    public function getPhotoUrl(): ?string
    {
        if (! $this->name) {
            return $this->photo ? Storage::url($this->photo) : "https://ui-avatars.com/api/?name=$this->email";
        }

        return $this->photo ? Storage::url($this->photo) : "https://ui-avatars.com/api/?name=$this->name";
    }

    public function getFormattedEmailVerifiedAtAttribute()
    {
        if ($this->email_verified_at != null) {
            return Carbon::make($this->email_verified_at)->isoFormat('dddd, D MMMM Y');
        }

        return null;
    }

    public function markVerified()
    {
        $this->is_verified = true;
        $this->save();
    }
}
