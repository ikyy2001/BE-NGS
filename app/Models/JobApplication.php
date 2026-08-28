<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class JobApplication extends Model
{
    use HasFactory;

    protected $table = 'job_applications';

    protected $fillable = [
        'job_vacancy_id',
        'full_name',
        'email',
        'phone',
        'portfolio_url',
        'resume_path',
        'cover_letter',
        'status',
        'admin_notes',
    ];

    protected $appends = [
        'resume_url',
    ];

    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(JobVacancy::class, 'job_vacancy_id');
    }

    public function getResumeUrlAttribute(): ?string
    {
        if (! $this->resume_path) {
            return null;
        }

        if (str_starts_with($this->resume_path, 'http://') || str_starts_with($this->resume_path, 'https://')) {
            return $this->resume_path;
        }

        return Storage::disk('public')->url($this->resume_path);
    }
}
