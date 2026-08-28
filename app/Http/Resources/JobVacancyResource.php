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
            'title' => $this->title ?? '',
            'slug' => $this->slug ?? '',
            'department' => $this->department ?? 'Game Development',
            'job_type' => $this->job_type ?? 'Full-time',
            'work_location' => $this->work_location ?? 'Remote',
            'experience_level' => $this->experience_level ?? 'Mid-Level',
            'salary_range' => $this->salary_range,
            'description' => $this->description ?? '',
            'requirements' => $this->normalizeArray($this->requirements),
            'responsibilities' => $this->normalizeArray($this->responsibilities),
            'benefits' => $this->normalizeArray($this->benefits),
            'deadline' => $this->deadline?->format('Y-m-d'),
            'is_active' => (bool) $this->is_active,
            'sort_order' => (int) ($this->sort_order ?? 0),
            'created_at' => $this->created_at,
        ];
    }

    protected function normalizeArray($val): array
    {
        if (empty($val)) {
            return [];
        }

        if (is_array($val)) {
            return array_values(array_filter(array_map('trim', $val)));
        }

        if (is_string($val)) {
            $trimmed = trim($val);
            if (str_starts_with($trimmed, '[') && str_ends_with($trimmed, ']')) {
                $decoded = json_decode($trimmed, true);
                if (is_array($decoded)) {
                    return array_values(array_filter(array_map('trim', $decoded)));
                }
            }

            $lines = preg_split('/\r\n|\r|\n/', $trimmed);
            return array_values(array_filter(array_map('trim', $lines)));
        }

        return [];
    }
}
