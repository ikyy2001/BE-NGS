<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobVacancyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'department' => $this->department,
            'job_type' => $this->job_type,
            'work_location' => $this->work_location,
            'experience_level' => $this->experience_level,
            'salary_range' => $this->salary_range,
            'description' => $this->description,
            'requirements' => $this->requirements ?? [],
            'responsibilities' => $this->responsibilities ?? [],
            'benefits' => $this->benefits ?? [],
            'deadline' => $this->deadline?->format('Y-m-d'),
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
            'created_at' => $this->created_at,
        ];
    }
}
