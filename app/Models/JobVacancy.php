<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobVacancy extends Model
{
    use HasFactory;

    protected $table = 'job_vacancies';

    protected $fillable = [
        'title',
        'slug',
        'department',
        'job_type',
        'work_location',
        'experience_level',
        'salary_range',
        'description',
        'requirements',
        'responsibilities',
        'benefits',
        'deadline',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'requirements' => 'array',
        'responsibilities' => 'array',
        'benefits' => 'array',
        'deadline' => 'date',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class, 'job_vacancy_id');
    }
}
